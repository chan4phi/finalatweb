<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;



class Laporani extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('Email')=='')
			redirect('login/logout');		

		if($this->session->userdata('userType')==PERMIT_PEMESANAN){
		}
	}
    
    public function income(){
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');
		
		$this->load->model('Asisten_model');
		$this->load->model('Driver_model');
		$this->load->model('Laporan_model');

	
		$data['customer'] = $this->Customer_model->get();
		$data['bis'] = $this->Bis_model->get();
        $data['antar'] = $this->Laporan_model->getBayar();
        $data['driver'] = $this->Driver_model->get();
        $data['asisten'] = $this->Asisten_model->get();
		$data['page'] ='laporan/list_income';
		$this->load->view('main',$data);
	}

   
    public function getdata(){
	
    $this->load->model('Laporan_model');
    $filter=array();
    $dateStart = $this->input->post('TgglStart');
    $dateEnd = $this->input->post('TgglBayar');
            
        if($this->input->post('TgglBayar')!='0')
       
        $filter['h.TgglStart >="'.$dateStart.'" and e.TgglBayar <="'.$dateEnd.'"'] = NULL;
                
        $data['lapor'] = $this->Laporan_model->getBayar($filter);
            
            
        if ($this->input->is_ajax_request())
            $this->load->view('laporan/list_income_rpt',$data);
        else{
			$datai = $this->Laporan_model->getBayar();

			$spreadsheet = new Spreadsheet;
			
			$spreadsheet->getDefaultStyle()
				->getFont()
				->setName('Arial')
				->setSize(12);
//heading

			$spreadsheet->getActiveSheet()->setCellValue('A1',"Laporan Pendapatan");
			$spreadsheet->getActiveSheet()->mergeCells("A1:F1");
			$spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->getStyle("A1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

			$spreadsheet->getActiveSheet()->setCellValue('A2', 'PT. Putra Tidar');
			$spreadsheet->getActiveSheet()->mergeCells("A2:F2");
			$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(15);
			$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

			$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('5');
			$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('20');
			$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('20');
			$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('15');
			$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('20');
			$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth('15');

			$spreadsheet->setActiveSheetIndex(0)
						->setCellValue('A3', 'No')
						->setCellValue('B3', 'Booking Receipt')
						->setCellValue('C3', 'Booking Order')
						->setCellValue('D3', 'Tanggal Bayar')
						->setCellValue('E3', 'Customer ID')
						->setCellValue('F3', 'Terbayar');
			$spreadsheet->getActiveSheet()->getStyle('A3:F3')->getFont()->setSize(13);
			$spreadsheet->getActiveSheet()->getStyle('A3:F3')->getFont()->setBold(true);

			$i = 4;
			$nomor = 1;
			foreach($datai as $row) {
  
				 $spreadsheet->setActiveSheetIndex(0)
							 ->setCellValue('A' . $i, $nomor)
							 ->setCellValue('B' . $i, $row->KdBR)
							 ->setCellValue('C' . $i, $row->KdBO)
							 ->setCellValue('D' . $i, $row->TgglBayar)
							 ->setCellValue('E' . $i, $row->CustomerID)
							 ->setCellValue('F' . $i, $row->Terbayar);
  
				 $i++;
				 $nomor++;
  
			}
			// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Report Income '.date('d-m-Y H'));

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Report Income'. gmdate('D, dmy').'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;

	
    	}
    }
}