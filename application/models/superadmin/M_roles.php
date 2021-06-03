<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_roles extends CI_Model 
{
    private $sessions;
    function __construct() {
        parent::__construct();
        $this->sessions = $this->session->userdata('admin');
    }

    function allposts_count($where)
    {   
        $query = $this
                ->db
                ->select("r.*, m.MODUL, m.SUPERADMIN_ONLY, l.LEVEL")
                ->join('user_modul m', 'm.ID=r.MODUL_ID')
                ->join('user_level l', 'l.ID=r.LEVEL_ID')
                ->where($where)
                ->get('user_role r');
    
        return $query->num_rows();  

    }
    
    function allposts($where,$limit,$start,$col,$dir)
    {
       $query = $this
                ->db
                ->select("r.*, m.MODUL, m.SUPERADMIN_ONLY, l.LEVEL")
                ->join('user_modul m', 'm.ID=r.MODUL_ID')
                ->join('user_level l', 'l.ID=r.LEVEL_ID')
                ->where($where)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('user_role r');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return [];
        }
        
    }
   
    function posts_search($where,$limit,$start,$search,$col,$dir)
    {
        $query = $this
                ->db
                ->select("r.*, m.MODUL, m.SUPERADMIN_ONLY, l.LEVEL")
                ->join('user_modul m', 'm.ID=r.MODUL_ID')
                ->join('user_level l', 'l.ID=r.LEVEL_ID')
                ->where($where)
                ->group_start()
                ->like('r.ID',$search)
                ->or_like('m.MODUL',$search)
                ->group_end()
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('user_role r');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return [];
        }
    }

    function posts_search_count($where,$search)
    {
        $query = $this
                ->db
                ->select("r.*, m.MODUL, m.SUPERADMIN_ONLY, l.LEVEL")
                ->join('user_modul m', 'm.ID=r.MODUL_ID')
                ->join('user_level l', 'l.ID=r.LEVEL_ID')
                ->where($where)
                ->group_start()
                ->like('r.ID',$search)
                ->or_like('m.MODUL',$search)
                ->group_end()
                ->get('user_role r');
    
        return $query->num_rows();
    }

    function get_data_level($where='')
    {
        if($where!=''){
            $this->db->where($where);
        }
        $query = $this
                ->db
                ->get('user_level');

        return $query;
    }
   
}