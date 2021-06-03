<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_where_query'))
{
	function set_where_query($where)
	{
        $q_where = "";
        foreach ($where as $key => $value) {
            # code...
            if(!in_array($value, ['', '0'])){
                // if(!stristr($key, 'tahun'))
                if($key!=0 || stristr(strtolower($key), "tahun")==false)
                {
                    $q_where .= " AND ";
                }
                $q_where .= "$key = ?"; 
            }
        }

        return $q_where;
	}
}

if ( ! function_exists('set_where_query2'))
{
    function set_where_query2($where)
    {
        $q_where = "";
        foreach ($where as $key => $value) {
            # code...
            if(!in_array($value, ['', '0'])){
                // if(!stristr($key, 'tahun'))
                if($key!=0)
                {
                    $q_where .= " AND ";
                }
                $q_where .= "$value = ?"; 
            }
        }

        return $q_where;
    }
}

if ( ! function_exists('set_param_query'))
{
	function set_param_query($where)
	{
        $param = [];
        if(sizeof($where)>0){
            foreach ($where as $key => $value) {
                # code...
                if(!in_array($value, ['', '0']))
                {
                    $param[] = $value;
                }
            }
        }

        return $param;
	}
}