<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenyewaanItem_model extends CI_Model {
	var $table ="penyewaan_detil";
	public function add($data)
	{
		$this->db->insert($this->table,$data);
	}
	
	
}