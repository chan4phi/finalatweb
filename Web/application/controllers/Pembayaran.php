<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('Email')=='')
			redirect('login/logout');		

		if($this->session->userdata('UserType')==PERMIT_OPERASI){
				redirect('login/permit');
		}
	}

	public function form(){
		
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');
		$this->load->model('Penyewaan_model');
		$this->load->model('Pembayaran_model');
		
		$data['page'] ='bayar/form_bayar';
		$data['customer'] = $this->Customer_model->get();
		$data['bis'] = $this->Bis_model->get();
		$data['sewa'] = $this->Pembayaran_model->getSewa();
		$this->load->view('main',$data);
	}
	
    public function daftar(){
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');
		$this->load->model('Pembayaran_model');

		$data['customer'] = $this->Customer_model->get();
        $data['bis'] = $this->Bis_model->get();
        
        
        $data['page'] ='bayar/list_bayar';
		$this->load->view('main',$data);
	}
	
	public function submit(){
		$this->load->helper('form');
		$this->load->model('Pembayaran_model');
		$this->load->model('PembayaranItem_model');
		$this->load->model('Penyewaan_model');
		$this->load->model('PenyewaanItem_model');

		$this->load->helper('autoid');
        
        
		$tggl = date('y/m/d');
   		$idByr = getid('KdBR', 'pembayaran_header', 'BR-');
		$terbyr = $this->input->post('Terbayar');
		$hrg = $this->input->post('HargaSewa');
		$id = $this->input->post('KdBO');
        $byr = array('');
        
		if ($terbyr==0){
            $byr = '1';
        }elseif ($terbyr<$hrg){
            $byr = '2';
        }elseif ($terbyr=$hrg){
            $byr = '3';
        }
        
		$sewaData = array(
			'KdBR'=>$idByr,
			'Penerima'=>$this->session->userdata('NamaPengguna'),
			'CustomerID'=>$this->input->post('CustomerID'),
			'KdBO'=>$id,
			'HargaSewa'=>$this->input->post('HargaSewa')
		);
	
		$item = array(
			'KdBR2'=>$idByr,
			'Terbayar'=>$this->input->post('Terbayar'),
			'SisaBayar'=>$this->input->post('SisaBayar'),
			'BisID'=>$this->input->post('BisID'),
			'Jenis'=>$this->input->post('Jenis'),
			'TgglStart'=>$this->input->post('TgglStart'),
			'TgglBayar'=>$tggl
			
		);
		
		$this->Pembayaran_model->upstatus(array('Status'=>$byr),array('KdBO'=>$id));
		$this->Pembayaran_model->add($sewaData);
		$this->PembayaranItem_model->add($item);

		
		echo json_encode(array('messages'=>'data berhasil disimpan, id '.$idByr));
		
	}
	

	
	public function getdata(){
		
		ob_start();

		$this->load->model('Pembayaran_model');
		$this->load->model('PembayaranItem_model');
		$filter=array();
		$dateStart = $this->input->post('TgglStart');
		$dateEnd = $this->input->post('TgglBayar');
		
		if($this->input->post('CustomerID')!='0')
			$filter['d.CustomerID'] = $this->input->post('CustomerID');
		$filter['e.TgglStart >="'.$dateStart.'" and e.TgglBayar <="'.$dateEnd.'"'] = NULL;
			
		$data['bayar'] = $this->Pembayaran_model->getByr($filter);
		
		
		if ($this->input->is_ajax_request())
			$this->load->view('bayar/list_bayar_rpt',$data);
		else{
			$html = ob_get_contents();
        ob_end_clean();
		

        require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('L','A4','en');
		$pdf->WriteHTML($html);
		$tggl = date('d/m/y');
		
			$html = $this->load->view('bayar/list_bayar_pdf',$data,true);
			
			$pdf->WriteHTML($html);
			$nmfile = 'Booking Receipt'.$tggl.'.pdf';
			$pdf->Output($nmfile);
		}
	}
		
	public function edit(){
		$this->load->helper('form');
		$this->load->model('Customer_model');
		$this->load->model('Bis_model');
		$this->load->model('Penyewaan_model');
		$this->load->model('Pembayaran_model');
		
		$data['page'] ='bayar/form_bayarE';
		$data['customer'] = $this->Customer_model->get();
		$data['bis'] = $this->Bis_model->get();
		$data['sewa'] = $this->Penyewaan_model->get();

		$data['bayar'] = $this->Pembayaran_model->getByrE(
			array("KdBR"=>$this->uri->segment(3))
		);
		$this->load->view('main',$data);
	}
	public function update(){
		$this->load->helper('form');
		$this->load->model('Pembayaran_model');
		$this->load->model('PembayaranItem_model');

		$terbyr = $this->input->post('Terbayar');
		$hrg = $this->input->post('HargaSewa');
		$id = $this->input->post('KdBO');
		$idByr = $this->input->post('KdBR');
        $byr = '';
        $tggl = date('y/m/d');
		if ($terbyr==0){
            $byr = '1';
        }elseif ($terbyr<$hrg){
            $byr = '2';
        }elseif ($terbyr=$hrg){
            $byr = '3';
        }
		
		$item = array(
			
			'Terbayar'=>$this->input->post('Terbayar'),
			'SisaBayar'=>$this->input->post('SisaBayar'),
			'BisID'=>$this->input->post('BisID'),
			'Jenis'=>$this->input->post('Jenis'),
			'TgglStart'=>$this->input->post('TgglStart'),
			'TgglBayar'=>$tggl);
		
		$this->Pembayaran_model->upstatus(array('Status'=>$byr),array('KdBO'=>$id));
		$this->PembayaranItem_model->edit($item,array('KdBR2'=>$idByr));

		echo json_encode(array('messages'=>'data pembayaran berhasil diupdate, id '.$idByr));

	}
}