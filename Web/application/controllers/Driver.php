<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

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

    $this->load->model('driver_model','driver');
		
		$data['list_driver'] = $this->driver->get();
		$data['page']='driver/list';
		
		$this->load->view('main',$data);
		
	}

	public function form()
	{	     
    $data['page']='driver/form';
    $data['driver'] = array(
                        (object)array(
                            'DriverID'=>'',
                            'NamaDriver'=>'',
                            'NoTelp'=>'',                          
                        )
                    );
    
    if($this->uri->segment(3) !=''){
        $this->load->model('driver_model','driver');
        $data['driver'] = $this->driver->get(
                array('DriverID'=>$this->uri->segment(3))
            );
    }
    
    $this->load->view('main',$data);
	}

	public function submit()
	{
		$this->load->model('driver_model','driver');
		$driver = $this->input->post();
		$id = $this->input->post('DriverID');
		
		if($id==''){
			$this->load->helper('autoid');
			$driver['DriverID']=getid('DriverID', 'driver', 'DPT-');
			$this->driver->add($driver);			
		}else
			$this->driver->edit($driver,
				array('DriverID'=>$id)
			);			
							
		redirect('driver/daftar');
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('driver_model','driver');
		$this->driver->hapus(
			array('DriverID'=>$id)
		);
		redirect('driver/daftar');
	}

}

