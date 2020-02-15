<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('Email')=='')
			redirect('login/logout');

		if($this->session->userdata('UserType')==PERMIT_PEMESANAN){
			redirect('login/permit');
		}
	}
	public function daftar() {

    $this->load->model('bis_model','bis');
		
		$data['list_bis'] = $this->bis->get();
		$data['page']='bis/list';
		
		$this->load->view('main',$data);
		
	}

	public function form()
	{	     
    $data['page']='bis/form';
    $data['bis'] = array(
                        (object)array(
                            'BisID'=>'',
                            'NoPol'=>'',
                            'Jenis'=>'',
                            'Karoseri'=>'',
                            
                        )
                    );
    
    if($this->uri->segment(3) !=''){
        $this->load->model('bis_model','bis');
        $data['bis'] = $this->bis->get(
                array('BisID'=>$this->uri->segment(3))
            );
    }
    
    $this->load->view('main',$data);
	}

	public function submit()
	{
		$this->load->model('bis_model','bis');
		$bis = $this->input->post();
		$id = $this->input->post('BisID');
		
		if($id==''){
			$this->load->helper('autoid');
			$bis['BisID']=getid('BisID', 'bis', 'BPT-');
			$this->bis->add($bis);			
		}else
			$this->bis->edit($bis,
				array('BisID'=>$id)
			);			
							
		redirect('bis/daftar');
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('bis_model','bis');
		$this->bis->hapus(
			array('BisID'=>$id)
		);
		redirect('bis/daftar');
	}

}

