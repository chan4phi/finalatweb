<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
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
    var $tblAdI = "antar_item";//k

    public function getBayar($filter=array()){
        $this->db->select('d.*, e.Terbayar, a.AlmtJemput,
		a.Tujuan, e.SisaBayar, e.Jenis, e.TgglBayar, e.TgglStart, c.NamaCustomer')
        ->from($this->tblByr." d")
        ->join($this->tblCustomer.' c','c.CustomerID=d.CustomerID')
		->join($this->table." a",'a.KdBO=d.KdBO')
		->join($this->tblItem." h",'h.KdBO=d.KdBO')
		->join($this->tblByrI." e", 'e.KdBR2=d.KdBR');
   	
		if(count($filter)>0)
            $this->db->where($filter);
        
        $res = $this->db->get();
        return $res->result(); 
    }

    public function getAntar($filter=array()){
		$this->db->select('f.*, g.Solar, g.Tol, g.PremiAsisten, g.Kasbon, g.Overtime,
		g.KdBO, g.JamStart, g.JamFinish, g.TgglStart, g.TgglFinish, g.BisID, g.NoPol, g.Jenis, g.KmStart, g.PremiDriver,
		g.KmFinish, c.NamaCustomer, a.AlmtJemput, a.Tujuan, j.NamaAsisten, i.NamaDriver')
		->from($this->tblA." f")
		->join($this->tblAI." g", 'g.KdSJ2=f.KdSJ')
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