<?php

class M_update extends CI_Model{
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	/*function update_datafoto($where,$data,$table){
		$this->db->where('idpaket',$where);
		$this->db->update($table,$data);
	}*/
}
?>