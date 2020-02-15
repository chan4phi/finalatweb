<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan_model extends CI_Model {
	var $table ="penyewaan_header";//a
	var $tblItem = "penyewaan_detil";//i
	var $tblBis = "bis";//
	var $tblCustomer ="customer";//

	public function add($data)
	{
		$this->db->insert($this->table,$data);
	}

	public function get($filter=array()){
		$this->db->select('a.*, i.Jenis, c.NamaCustomer, i.Jenis, 
			i.BisID, i.TgglStart, i.HargaSewa, i.Overtime, 
			i.TgglFinish')
			->from($this->table." a")
			->join($this->tblCustomer.' c','c.CustomerID=a.CustomerID')
			
			->join($this->tblItem.' i','i.KdBO=a.KdBO');
			
		if(count($filter)>0)
			$this->db->where($filter);
		
		$this->db->group_by('i.KdBO');
		$res = $this->db->get();
		return $res->result();
	}

}