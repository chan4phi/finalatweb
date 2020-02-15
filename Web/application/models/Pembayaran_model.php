<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {
	var $table ="penyewaan_header";
    var $tblItem = "penyewaan_detil";
    var $tblByr = "pembayaran_header";
    var $tblByrI = "pembayaran_detil";
	var $tblBis = "bis";
	var $tblCustomer ="customer";

	public function add($data)
	{
		$this->db->insert($this->tblByr,$data);
	}

	public function upstatus($data,$where)
	{
		$this->db->where($where);
		$this->db->update($this->table, $data);
		
	}
    
	public function edit($data,$where){
		$this->db->where($where);
		$this->db->update($this->tblByr, $data);
	
	}
	public function getSewa(){
		$this->db->select('a.*, i.Jenis, c.NamaCustomer, i.Jenis, 
            i.BisID, i.TgglFinish ,i.TgglStart, i.HargaSewa, i.Overtime,
            i.Standby, i.JamStart, i.JamFinish, i.Overtime')
			->from($this->table." a")
			->join($this->tblCustomer.' c','c.CustomerID=a.CustomerID')
			
			->join($this->tblItem.' i','i.KdBO=a.KdBO')
			->where(" a.Status = '1'");

		$res = $this->db->get();
		return $res->result();
    }
    
    public function getByr($filter=array()){
        $this->db->select('d.*, e.Terbayar, e.BisID, h.AlmtJemput,
		h.Tujuan, i.Overtime, e.SisaBayar, e.Jenis, e.TgglStart, c.NamaCustomer')
        ->from($this->tblByr." d")
        ->join($this->tblCustomer.' c','c.CustomerID=d.CustomerID')
		->join($this->table." h",'h.KdBO=d.KdBO')
		->join($this->tblItem." i",'i.KdBO=d.KdBO')
		->join($this->tblByrI." e", 'e.KdBR2=d.KdBR');

        	
		if(count($filter)>0)
            $this->db->where($filter);
    
        $this->db->group_by('d.KdBR');
        $res = $this->db->get();
        return $res->result(); 
    }
    public function getByrE($filter=array()){
        $this->db->select('d.*, e.Terbayar, e.BisID, 
		e.SisaBayar, e.Jenis, e.TgglBayar, e.TgglStart')
		->from($this->tblByr." d")
		->join($this->table." h",'h.KdBO=d.KdBO')
		->join($this->tblByrI." e", 'e.KdBR2=d.KdBR');
        	
		
        $this->db->where($filter);
    
        $res = $this->db->get();
        return $res->result(); 
    }
    
}