<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;


class Laporane extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('Email')=='')
			redirect('login/logout');		

		if($this->session->userdata('userType')==PERMIT_PEMESANAN){
		}
	}
    
    public function expense(){
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');
		
		$this->load->model('Asisten_model');
		$this->load->model('Driver_model');
		$this->load->model('Laporan_model');

	
		$data['customer'] = $this->Customer_model->get();
		$data['bis'] = $this->Bis_model->get();
        $data['antar'] = $this->Laporan_model->getAntar();
        $data['driver'] = $this->Driver_model->get();
        $data['asisten'] = $this->Asisten_model->get();
		$data['page'] ='laporan/list_expense';
		$this->load->view('main',$data);
	}

   
    public function getdata(){
       
    ob_start();
    
    $this->load->model('Laporan_model');
    $filter=array();
    $dateStart = $this->input->post('TgglStart');
    $dateEnd = $this->input->post('TgglFinish');
            
        if($this->input->post('TgglStart')!='0')
       
        $filter['g.TgglStart >="'.$dateStart.'" and g.TgglFinish <="'.$dateEnd.'"'] = NULL;
                
        $data['antar'] = $this->Laporan_model->getAntar($filter);
            
            
        if ($this->input->is_ajax_request())
            $this->load->view('laporan/list_expense_rpt',$data);
        else{ 
			$datai = $this->Laporan_model->getAntar();

			$spreadsheet = new Spreadsheet;
			
			$spreadsheet->getDefaultStyle()
				->getFont()
				->setName('Arial')
				->setSize(12);
//heading

			$spreadsheet->getActiveSheet()->setCellValue('A1',"Laporan Pengeluaran");
			$spreadsheet->getActiveSheet()->mergeCells("A1:J1");
			$spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->getStyle("A1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

			$spreadsheet->getActiveSheet()->setCellValue('A2', 'PT. Putra Tidar');
			$spreadsheet->getActiveSheet()->mergeCells("A2:J2");
			$spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(15);
			$spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

			$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('5');
			$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('16');
			$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('16');
			$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('16');
			$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('10');
			$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth('7');
			$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth('7');
			$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth('12');
			$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth('12');
			$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth('12');

			$spreadsheet->setActiveSheetIndex(0)
						->setCellValue('A3', 'No')
						->setCellValue('B3', 'Kode SJ')
						->setCellValue('C3', 'Booking Order')
						->setCellValue('D3', 'Booking Receipt')
						->setCellValue('E3', 'Tggl Sewa')
						->setCellValue('F3', 'Solar')
						->setCellValue('G3', 'Tol')
						->setCellValue('H3', 'Premi Driver')
						->setCellValue('I3', 'Premi Asisten')
						->setCellValue('J3', 'Kasbon');
						
			$spreadsheet->getActiveSheet()->getStyle('A3:J3')->getFont()->setSize(13);
			$spreadsheet->getActiveSheet()->getStyle('A3:J3')->getFont()->setBold(true);

			$i = 4;
			$nomor = 1;
			foreach($datai as $row) {
  
				 $spreadsheet->setActiveSheetIndex(0)
							 ->setCellValue('A' . $i, $nomor)
							 ->setCellValue('B' . $i, $row->KdSJ)
							 ->setCellValue('C' . $i, $row->KdBO)
							 ->setCellValue('D' . $i, $row->KdBR)
							 ->setCellValue('E' . $i, $row->TgglStart)
							 ->setCellValue('F' . $i, $row->Solar)
							 ->setCellValue('G' . $i, $row->Tol)
							 ->setCellValue('H' . $i, $row->PremiDriver)
							 ->setCellValue('I' . $i, $row->PremiAsisten)
							 ->setCellValue('J' . $i, $row->Kasbon);
  
				 $i++;
				 $nomor++;
  
			}
			// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Report Income '.date('d-m-Y H'));

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Report Expense'. gmdate('D, dmy').'.xlsx"');
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