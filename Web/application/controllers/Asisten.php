<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asisten extends CI_Controller {

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

    $this->load->model('asisten_model','asisten');
		
		$data['list_asisten'] = $this->asisten->get();
		$data['page']='asisten/list';
		
		$this->load->view('main',$data);
		
	}

	public function form()
	{	     
    $data['page']='asisten/form';
    $data['asisten'] = array(
                        (object)array(
                            'AsistenID'=>'',
                            'NamaAsisten'=>'',
                            'NoTelp'=>'',                          
                        )
                    );
    
    if($this->uri->segment(3) !=''){
        $this->load->model('asisten_model','asisten');
        $data['asisten'] = $this->asisten->get(
                array('AsistenID'=>$this->uri->segment(3))
            );
    }
    
    $this->load->view('main',$data);
	}

	public function submit()
	{
		$this->load->model('asisten_model','asisten');
		$asisten = $this->input->post();
		$id = $this->input->post('AsistenID');
		
		if($id==''){
			$this->load->helper('autoid');
			$asisten['AsistenID']=getid('AsistenID', 'asisten', 'APT-');
			$this->asisten->add($asisten);			
		}else
			$this->asisten->edit($asisten,
				array('AsistenID'=>$id)
			);			
							
		redirect('asisten/daftar');
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('asisten_model','asisten');
		$this->asisten->hapus(
			array('AsistenID'=>$id)
		);
		redirect('asisten/daftar');
	}

}

