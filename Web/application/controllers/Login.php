<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
		$this->load->helper('form');
		
		if($_POST)
			$this->cek_login();
		
			$this->load->view('login/form_login');
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	
	public function permit(){
		$data['page']='no_permission';
		$this->load->view('main',$data);
	}
	
	private function cek_login(){
		$this->load->model('Users_model');
		$user = $this->input->post();
		
		$res = $this->Users_model->get($user);

			
		if(count($res)>0){
			if($res[0]->Status != 1){
				$this->session->set_flashdata('message', 'Username '.$user['Email'].' tidak aktif');
			}else{
				$res_out = current(json_decode(json_encode($res),true));
				$this->session->set_userdata($res_out);
				redirect('dashboard');
			}
		}else
			$this->session->set_flashdata('message', 'Username '.$user['Email'].' tidak ditemukan');
		
	}
}