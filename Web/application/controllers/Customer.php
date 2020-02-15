<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('Email')=='')
			redirect('login/logout');

		if($this->session->userdata('UserType')==PERMIT_OPERASI){
			redirect('login/permit');
		}
	}
	public function daftar() {

    $this->load->model('customer_model','customer');
		
		$data['list_customer'] = $this->customer->get();
		$data['page']='customer/list';
		
		$this->load->view('main',$data);
		
	}

	public function form()
	{	     
    $data['page']='customer/form';
    $data['customer'] = array(
                        (object)array(
                            'CustomerID'=>'',
                            'NamaCustomer'=>'',
                            'Alamat'=>'',
                            'NoTelp'=>'',
                            
                        )
                    );
    
    if($this->uri->segment(3) !=''){
        $this->load->model('customer_model','customer');
        $data['customer'] = $this->customer->get(
                array('CustomerID'=>$this->uri->segment(3))
            );
    }
    
    $this->load->view('main',$data);
	}

	public function submit()
	{
		$this->load->model('customer_model','customer');
		$customer = $this->input->post();
		$id = $this->input->post('CustomerID');
		
		if($id==''){
			$this->load->helper('autoid');
			$customer['CustomerID']=getid('CustomerID', 'customer', 'CSPT-');
			$this->customer->add($customer);			
		}else
			$this->customer->edit($customer,
				array('CustomerID'=>$id)
			);			
							
		redirect('customer/daftar');
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('customer_model','customer');
		$this->customer->hapus(
			array('CustomerID'=>$id)
		);
		redirect('customer/daftar');
	}

}

