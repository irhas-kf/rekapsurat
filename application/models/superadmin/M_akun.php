<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akun extends CI_Model 
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
                ->select("a.*, l.LEVEL")
                ->join('user_level l', 'l.ID=a.LEVEL_ID')
                ->where($where)
                ->get('user_data a');
    
        return $query->num_rows();  

    }
    
    function allposts($where,$limit,$start,$col,$dir)
    {
       $query = $this
                ->db
                ->select("a.*, l.LEVEL")
                ->join('user_level l', 'l.ID=a.LEVEL_ID')
                ->where($where)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('user_data a');
        
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
                ->select("a.*, l.LEVEL")
                ->join('user_level l', 'l.ID=a.LEVEL_ID')
                ->where($where)
                ->like('a.ID',$search)
                ->or_like('m.MODUL',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('user_data a');
        
       
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
                ->select("a.*, l.LEVEL")
                ->join('user_level l', 'l.ID=a.LEVEL_ID')
                ->where($where)
                ->like('a.ID',$search)
                ->or_like('m.MODUL',$search)
                ->get('user_data a');
    
        return $query->num_rows();
    }

    function get_data_akun($where)
    {   
        $query = $this
                ->db
                ->select("a.*, l.ID AS ID_LEVEL, l.LEVEL")
                ->join('user_level l', 'l.ID=a.LEVEL_ID')
                ->where($where)
                ->get('user_data a');
    
        return $query;

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

    function simpan_data_akun($data) 
    {
        return $this->db->insert('user_data', $data);
    }

    function edit_data_akun($data)
    {
        $id_akun  = $data['ID'];
        $where = [
                "ID"=>$id_akun,
            ];
        unset($data['ID']);
        
        $this->db->trans_begin();
        $this->db->update('user_data', $data, $where);

        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return "true";
        }else{
            $this->db->trans_rollback();
            return "false";
        }
    }

    function hapus_data_akun($data)
    {
        return $this->db->delete('user_data', ['ID'=>$data['ID']]);
    }
   
}