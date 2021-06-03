<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	function get_data_user($username, $password)
	{
		return $this->db->query('SELECT * FROM user_data WHERE USERNAME = ? AND PASSWORD = ?', [$username, $password]);
	}

	function get_data_roles($where)
	{
		$query = $this
			->db
			->join("user_modul", "user_modul.ID=user_role.MODUL_ID")
			->where($where)
			->get("user_role");

		return $query;
	}
}