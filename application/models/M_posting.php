<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posting extends CI_Model {

	public function data_posting($where=[])
	{
		if(sizeof($where) > 0){
			$this->db->where($where);
		}

		$data = $this->db
			->join("user_data d", "d.id = p.id_user")
			->select("p.*, d.username")
			->get("posting p");

		return $data;
	}

	function data_author($where=[])
	{
		if(sizeof($where) > 0){
			$this->db->where($where);
		}

		$query = $this->db->get('user_data');
		return $query;
	}

	function allposts_query($limit='all',$start='',$col='',$dir='')
	{
       $this->db->join("user_data d", "d.id = p.id_user", "left");

		if($limit!='all'){
            $this->db->limit($limit,$start)->order_by($col,$dir);
		}

		$this->db->select("p.*, d.username");
		$query = $this->db->get("posting p");

		return $query;
	}

	function allposts_count()
    {   
        $query = $this->allposts_query();

        return $query->num_rows();  

    }
    
    function allposts($limit,$start,$col,$dir)
    {
       $query = $this->allposts_query($limit,$start,$col,$dir);
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return [];
        }
        
    }

    function posts_search_query($search,$limit='all',$start='',$col='',$dir='')
    {
        $query = $this->db
			->join("user_data d", "d.id = p.id_user", "left")
			->select("p.*, d.username")
	        ->like('p.id',$search)
	        ->or_like('p.judul',$search)
	        ->or_like('d.username',$search);

		if($limit!='all'){
            $this->db->limit($limit,$start)->order_by($col,$dir);
		}

		$query = $this->db->get("posting p");

		return $query;
    }
   
    function posts_search($limit,$start,$search,$col,$dir)
    {
        $query = $this->posts_search_query($search);
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return [];
        }
    }

    function posts_search_count($search)
    {
        $query = $this->posts_search_query($search);
    
        return $query->num_rows();
    }
}