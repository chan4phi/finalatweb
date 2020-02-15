<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function getid($fields, $table, $inisial)
{
	$CI =& get_instance();
	
	$leng_inisial = strlen($inisial);
	$query      = $CI->db->select('MAX('.$fields.') as max')
					->from($table)->get();
	$result     = $query->row();
	
	$number     = 0;
	$imax       = 15;
	$tmp        = "";

	if ($result->max !='') {
		$number = substr($result->max,strlen($inisial));
	}

	$number ++;
	$number = strval($number);
	for ($i=1; $i<=($imax-strlen($inisial)-strlen($number)); $i++) {
				
		$tmp=$tmp."0";
	}

	return $inisial.$tmp.$number;

}