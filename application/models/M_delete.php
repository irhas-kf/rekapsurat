<?php
class M_delete extends CI_Model{
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	/*function deletegambaredit($where){
		$query = $this->db->query("DELETE * FROM tbl_fotopaket WHERE idpaket = '$where'");
		return $query;
	}*/
}