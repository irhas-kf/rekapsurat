<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_modul_access'))
{
	function get_modul_access($acl)
	{
		return array_reduce($acl, function ($result, $item) {
		    $result[$item['MODUL_ID']] = array(
	    		'_READ' => $item['_READ'],
		    	'_CREATE' => $item['_CREATE'],
	    		'_UPDATE' => $item['_UPDATE'],
	    		'_DELETE' => $item['_DELETE'],
	    		);
		    return $result;
		}, array());
	}
}