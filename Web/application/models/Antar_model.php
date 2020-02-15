<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antar_model extends CI_Model {
	var $table ="penyewaan_header";//a
    var $tblItem = "penyewaan_detil";//h
    var $tblByr = "pembayaran_header";//d
    var $tblByrI = "pembayaran_detil";//e
	var $tblBis = "bis";//b
    var $tblCustomer ="customer";//c
    var $tblA = "antar_header";//f
	var $tblAI = "antar_detil";//g
	var $tblD = "driver";//i
	var $tblAs = "asisten";//j

	public function add($data)
	{
		$this->db->insert($this->tblA,$data);
	}

    
	public function edit($data,$where){
		$this->db->where($where);
		$this->db->update($this->table, $data);
	}
	public function getSewa(){
		$this->db->select('a.*, i.Jenis, c.NamaCustomer, i.Jenis, 
            i.BisID, i.TgglFinish ,i.TgglStart, i.HargaSewa, i.Overtime,
            i.Standby, i.JamStart, i.JamFinish, c.NoTelp, a.AlmtJemput, d.KdBR')
			->from($this->table." a")
			->join($this->tblCustomer.' c','c.CustomerID=a.CustomerID')
			->join($this->tblByr.' d','d.KdBO=a.KdBO')
			
			->join($this->tblItem.' i','i.KdBO=a.KdBO')
			->where(" a.Status = 3");

		$res = $this->db->get();
		return $res->result();
    }
    
    public function getAntar($filter=array()){
		$this->db->select('f.*, g.Solar, g.Tol, g.PremiDriver, g.PremiAsisten, g.Kasbon, g.Overtime, 
		g.KdBO, g.JamStart, g.JamFinish, g.TgglStart, g.TgglFinish, g.BisID, g.NoPol, g.Jenis, g.KmStart, 
		g.KmFinish, c.NamaCustomer, a.AlmtJemput, a.Tujuan, h.HargaSewa, j.NamaAsisten, i.NamaDriver')
		->from($this->tblA." f")
		->join($this->tblAI." g", 'g.KdSJ2=f.KdSJ')
		->join($this->tblItem." h", 'h.KdBO=g.KdBO')
		->join($this->table." a", 'a.KdBO=g.KdBO')	
        ->join($this->tblCustomer.' c','c.CustomerID=f.CustomerID')
		->join($this->tblBis." b",'b.BisID=g.BisID')
		->join($this->tblAs." j",'j.AsistenID=f.AsistenID')
		->join($this->tblD." i",'i.DriverID=f.DriverID');
        
       	
		if(count($filter)>0)
            $this->db->where($filter);
    
        $res = $this->db->get();
        return $res->result(); 
    }
    public function getAntarE($filter=array()){
		$this->db->select('f.*, g.Solar, g.Tol, g.BiayaOvertime ,g.PremiDriver, g.PremiAsisten, g.Kasbon, g.Overtime, 
		g.KdBO, g.JamStart, g.JamFinish, g.TgglStart, g.TgglFinish, g.BisID, g.NoPol, g.Jenis, h.Standby, g.KmStart, 
		g.KmFinish, c.NamaCustomer, a.AlmtJemput, a.Tujuan, h.HargaSewa, j.NamaAsisten, c.NoTelp, i.NamaDriver')
		->from($this->tblA." f")
		->join($this->tblAI." g", 'g.KdSJ2=f.KdSJ')
		->join($this->tblItem." h", 'h.KdBO=g.KdBO')
		->join($this->table." a", 'a.KdBO=g.KdBO')	
        ->join($this->tblCustomer.' c','c.CustomerID=f.CustomerID')
		->join($this->tblBis." b",'b.BisID=g.BisID')
		->join($this->tblAs." j",'j.AsistenID=f.AsistenID')
		->join($this->tblD." i",'i.DriverID=f.DriverID');
        
       	
		if(count($filter)>0)
            $this->db->where($filter);
    
        $res = $this->db->get();
        return $res->result(); 
    }
    
}