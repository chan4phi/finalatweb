<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembayaranItem_model extends CI_Model {
	var $table ="pembayaran_detil";

	public function add($data)
	{
		$this->db->insert($this->table,$data);
	}
	
	public function edit($data,$where){
		$this->db->where($where);
		$this->db->update($this->table, $data);
		
	}
	
}