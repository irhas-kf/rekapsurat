<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('filterhref'))
{
	function filterhref($action='', $acl=[])
	{
		$this_ =& get_instance();

		$action = strtolower($action);
		$arr_index = "_".strtoupper($action);
		$modul = $this_->session->userdata('modul');
		$arr_roles = str_split($modul[$acl['MODUL']], 1);
		$roles = [
				"_READ"=>$arr_roles[0],
				"_CREATE"=>$arr_roles[1],
				"_UPDATE"=>$arr_roles[2],
				"_DELETE"=>$arr_roles[3],
			];

		if($acl[$arr_index]=='1'){
			return true;
		}else{
			return false;
		}
	}

	function allowAction($action, $acl, $html)
	{
		if(filterhref($action, $acl)){
			return $html;
		}else{
			return "";
		}
	}
}