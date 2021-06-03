<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Model
{
	function get($groupId) {
		
		$acl= $this->db->query(
			'select MODUL_ID, MODUL, _READ, _CREATE, _UPDATE, _DELETE ' . 
			'from user_role ' .
			'join user_modul on user_modul.ID=user_role.MODUL_ID '.
			'where LEVEL_ID = ? order by MODUL_ID asc',
			array($groupId))
		->result_array();

		return array_reduce($acl, function($carry,$item){
			$carry[$item['MODUL_ID']-1]=$item;
			return $carry;
		},[]);
	}
}