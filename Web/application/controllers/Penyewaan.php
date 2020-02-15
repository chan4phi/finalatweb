<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('Email')=='')
			redirect('login/logout');

		if($this->session->userdata('UserType')==PERMIT_OPERASI){
			redirect('login/permit');
		}
	}


	public function daftar(){
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');
		$this->load->model('Penyewaan_model');
		$data['customer'] = $this->Customer_model->get();
		$data['bis'] = $this->Bis_model->get();
		
		$data['page'] ='sewa/list_sewa';
	
		$this->load->view('main',$data);
	}
	
	public function submit(){
		$this->load->helper('form');
		$this->load->model('Penyewaan_model');
		$this->load->model('PenyewaanItem_model');
		$this->load->helper('autoid');
		$this->load->model('Pembayaran_model');
		$this->load->model('PembayaranItem_model');
		
		$status = '1';
		$idSewa = getid('KdBO', 'penyewaan_header', 'BO-');
		$idBR = getid('KdBR','pembayaran_header','BR-');		
				
		$sewaData = array(
			'KdBO'=>$idSewa,
			'Tujuan'=>$this->input->post('Tujuan'),
			'AlmtJemput'=>$this->input->post('AlmtJemput'),
			'Status'=>$status,
			'CustomerID'=>$this->input->post('CustomerID'),
			'Petugas'=>$this->session->userdata('NamaPengguna')
		);
	
		$item = array(
			'KdBO'=>$idSewa,
			'TgglStart'=>$this->input->post('TgglStart'),
			'TgglFinish'=>$this->input->post('TgglFinish'),
			'Standby'=>$this->input->post('Standby'),
			'JamStart'=>$this->input->post('JamStart'),
			'JamFinish'=>$this->input->post('JamFinish'),
			'BisID'=>$this->input->post('BisID'),
			'Jenis'=>$this->input->post('Jenis'),
			'HargaSewa'=>$this->input->post('HargaSewa'),
			'Overtime'=>$this->input->post('Overtime')
		);

		$byrData = array(
			'KdBR'=>$idBR,
			'Penerima'=>$this->session->userdata('NamaPengguna'),
			'CustomerID'=>$this->input->post('CustomerID'),
			'Status'=>$status,
			'KdBO'=>$idSewa,
			'HargaSewa'=>$this->input->post('HargaSewa'),
		);

		$itmData = array (
			'KdBR'=>$idBR,
			
			'BisID'=>$this->input->post('BisID'),
			'Jenis'=>$this->input->post('Jenis'),
			'TgglStart'=>$this->input->post('TgglStart'),
			'TgglBayar'=>'now'

		);
		
		$this->Penyewaan_model->add($sewaData);
		$this->PenyewaanItem_model->add($item);
		
		echo json_encode(array('messages'=>'data berhasil disimpan, id '.$idSewa));
		
	}
	
	public function form(){
		
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');

		$data['page'] ='sewa/form_sewa';
		$data['customer'] = $this->Customer_model->get();
		$data['bis'] = $this->Bis_model->get();
		$this->load->view('main',$data);
	}
	
	public function getdata(){
		
		ob_start();

		$this->load->model('Penyewaan_model');
		$this->load->model('PenyewaanItem_model');
		$filter=array();
		$dateStart = $this->input->post('TgglStart');
		$dateEnd = $this->input->post('TgglFinish');
		
		if($this->input->post('CustomerID')!='0')
			$filter['c.CustomerID'] = $this->input->post('CustomerID');
	
		
		$filter['i.TgglStart >="'.$dateStart.'" and i.TgglFinish <="'.$dateEnd.'"'] = NULL;
			
		$data['sewa'] = $this->Penyewaan_model->get($filter);
		
	
		if ($this->input->is_ajax_request())
			$this->load->view('sewa/list_sewa_rpt',$data);
		else{
			$html = ob_get_contents();
        ob_end_clean();
		

        require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('L','A4','en');
		$pdf->WriteHTML($html);
		$tggl = date('d/m/y');
		
			$html = $this->load->view('sewa/list_sewa_pdf',$data,true);
			
			$pdf->WriteHTML($html);
			$nmfile = 'Booking Order'.$tggl.'.pdf';
			$pdf->Output($nmfile);
		}
	}
	
}