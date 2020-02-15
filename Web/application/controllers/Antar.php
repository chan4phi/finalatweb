<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('Email')=='')
			redirect('login/logout');

		if($this->session->userdata('UserType')==PERMIT_PEMESANAN){
			redirect('login/permit');
		}
	}

	public function form(){
		
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');
		$this->load->model('Penyewaan_model');
		$this->load->model('Pembayaran_model');
		$this->load->model('Antar_model');
		$this->load->model('Asisten_model');
		$this->load->model('Driver_model');

		$data['page'] ='antar/form_antar';
		$data['customer'] = $this->Customer_model->get();
		$data['bis'] = $this->Bis_model->get();
        $data['sewa'] = $this->Antar_model->getSewa();
        $data['driver'] = $this->Driver_model->get();
        $data['asisten'] = $this->Asisten_model->get();
        
		$this->load->view('main',$data);
	}
	
    public function daftar(){
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');
		$this->load->model('Pembayaran_model');

		$data['customer'] = $this->Customer_model->get();
        $data['bis'] = $this->Bis_model->get();
        
        
        $data['page'] ='antar/list_antar';
		$this->load->view('main',$data);
	}
	
	public function submit(){
		$this->load->helper('form');
		$this->load->model('Pembayaran_model');
		$this->load->model('PembayaranItem_model');
		$this->load->model('Penyewaan_model');
		$this->load->model('PenyewaanItem_model');
		$this->load->model('Antar_model');
		$this->load->model('AntarItem_model');

		$this->load->helper('autoid');
        
        
		$tggl = date('y/m/d');
   		$idSJ = getid('KdSJ', 'antar_header', 'SJ-');
		$byr = '4';
		$id = $this->input->post('KdBO');
		
		
		$antarData = array(
			'KdSJ'=>$idSJ,
			'KdBR'=>$this->input->post('KdBR'),
			'CustomerID'=>$this->input->post('CustomerID'),
			'DriverID'=>$this->input->post('DriverID'),
			'AsistenID'=>$this->input->post('AsistenID'),
			'Petugas'=>$this->session->userdata('NamaPengguna'),
		);
	
		$item = array(
			'KdSJ2'=>$idSJ,
			'Solar'=>$this->input->post('Solar'),
			'Tol'=>$this->input->post('Tol'),
			'PremiDriver'=>$this->input->post('PremiDriver'),
			'PremiAsisten'=>$this->input->post('PremiAsisten'),
			'Kasbon'=>$this->input->post('Kasbon'),
			'Overtime'=>$this->input->post('Overtime'),
			'BiayaOvertime'=>$this->input->post('BiayaOvertime'),
			'KdBO'=>$this->input->post('KdBO'),
			'JamStart'=>$this->input->post('JamStart'),
			'JamFinish'=>$this->input->post('JamFinish'),
			'TgglStart'=>$this->input->post('TgglStart'),
			'TgglFinish'=>$this->input->post('TgglFinish'),
			'BisID'=>$this->input->post('BisID'),
			'Jenis'=>$this->input->post('Jenis1'),
			'NoPol'=>$this->input->post('NoPol'),
			'KmStart'=>$this->input->post('KmStart'),
			'KmFinish'=>$this->input->post('KmFinish'),
			
		);
		
		$this->Pembayaran_model->upstatus(array('Status'=>$byr),array('KdBO'=>$id));
		$this->Antar_model->add($antarData);
		$this->AntarItem_model->add($item);

		
		echo json_encode(array('messages'=>'data berhasil disimpan, id '.$idSJ));
		
	}
	

	
	public function getdata(){
		
		ob_start();

		$this->load->model('Antar_model');
		$this->load->model('AntarItem_model');
		$filter=array();
		$dateStart = $this->input->post('TgglStart');
		$dateEnd = $this->input->post('TgglFinish');
		
		if($this->input->post('CustomerID')!='0')
			$filter['c.CustomerID'] = $this->input->post('CustomerID');
		$filter['g.TgglStart >="'.$dateStart.'" and g.TgglFinish <="'.$dateEnd.'"'] = NULL;
			
		$data['antar'] = $this->Antar_model->getAntar($filter);
		
		
		if ($this->input->is_ajax_request())
			$this->load->view('antar/list_antar_rpt',$data);
		else{
			$html = ob_get_contents();
        ob_end_clean();
		

        require_once('./assets/html2pdf/html2pdf.class.php');
		
		$pdf = new HTML2PDF('L','A4','en');
		$pdf->WriteHTML($html);
		$tggl = date('d/m/y');
		
			$html = $this->load->view('antar/list_antar_pdf',$data,true);
			
			$pdf->WriteHTML($html);
			$nmfile = 'Surat Jalan'.$tggl.'.pdf';
			$pdf->Output($nmfile);
	}
	}
	public function edit(){
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');
		$this->load->model('Penyewaan_model');
		$this->load->model('Pembayaran_model');
		$this->load->model('Antar_model');
		$this->load->model('AntarItem_model');
		$this->load->model('Driver_model');
		$this->load->model('Asisten_model');
		
		$data['page'] ='antar/form_antarE';
		$data['customer'] = $this->Customer_model->get();
		$data['bis'] = $this->Bis_model->get();
		$data['asisten'] = $this->Asisten_model->get();
		$data['driver'] = $this->Driver_model->get();
		$data['sewa'] = $this->Penyewaan_model->get();
		$data['antar'] = $this->Antar_model->getAntarE(
			array("KdSJ"=>$this->uri->segment(3))
		);
		$this->load->view('main',$data);
	}
	public function update(){
		$this->load->model('AntarItem_model');
		$this->load->model('Pembayaran_model');
		
		$this->load->model('PembayaranItem_model');

		$kmf = $this->input->post('KmFinish');
		$id = $this->input->post('KdBO');
		$idAntr = $this->input->post('KdSJ');
        $stat = '';
        
		if ($kmf==''){
            $stat = '4';
        }else{
            $stat = '5';
		}
		
		$item = array(
			'Solar'=>$this->input->post('Solar'), 
			'Tol'=>$this->input->post('Tol'),
			'PremiDriver'=>$this->input->post('PremiDriver'), 
			'PremiAsisten'=>$this->input->post('PremiAsisten'),
			'Kasbon'=>$this->input->post('Kasbon'),
			'OverTime'=>$this->input->post('Overtime'),
			'BiayaOvertime'=>$this->input->post('BiayaOvertime'), 
			'JamStart'=>$this->input->post('JamStart'),
			'JamFinish'=>$this->input->post('JamFinish'),
			'TgglStart'=>$this->input->post('TgglStart'),
			'TgglFinish'=>$this->input->post('TgglFinish'),
			'BisID'=>$this->input->post('BisID'),
			'Jenis'=>$this->input->post('Jenis'),
			'NoPol'=>$this->input->post('NoPol'),
			'KmStart'=>$this->input->post('KmStart'),
			'KmFinish'=>$this->input->post('KmFinish'),
			 
			'BiayaOvertime'=>$this->input->post('BiayaOvertime'));
			
			$this->Pembayaran_model->upstatus(array('Status'=>$stat),array('KdBO'=>$id));
			$this->AntarItem_model->edit($item,array('KdSJ2'=>$idAntr));

		echo json_encode(array('messages'=>'data berhasil diupdate, id '.$idAntr));

	}

		
}