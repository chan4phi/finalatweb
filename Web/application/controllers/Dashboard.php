<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct (){
		parent::__construct();
		if($this->session->userdata('Email')==''){
			redirect('login/logout');
		}		
	}
	
	public function index()
	{
		$data['page']='dashboard/welcome';
		$this->load->view('main',$data);
		
	}
}