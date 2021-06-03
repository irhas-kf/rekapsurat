<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_modul extends CI_Model 
{
    private $sessions;
    function __construct() {
        parent::__construct();
        $this->sessions = $this->session->userdata('admin');
    }

    function allposts_count()
    {   
        $query = $this
                ->db
                ->get('user_modul');
    
        return $query->num_rows();  

    }
    
    function allposts($limit,$start,$col,$dir)
    {
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('user_modul');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return [];
        }
        
    }
   
    function posts_search($limit,$start,$search,$col,$dir)
    {
        $query = $this
                ->db
                ->like('ID',$search)
                ->or_like('MODUL',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('user_modul');
        
       
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
        $query = $this
                ->db
                ->like('ID',$search)
                ->or_like('MODUL',$search)
                ->get('user_modul');
    
        return $query->num_rows();
    }

    function simpan_data_modul($data)
    {
        $maxId = $this->db->select_max('ID')->get('user_modul')->row()->ID;
        $level = $this->_get_data_level()->result_array();
        $data['ID'] = $maxId+1;

        // data user_role
        $userRoles = [];
        $userRoles = array_map(function ($item) use ($data){
            $carry = [
                    "LEVEL_ID"  => $item['ID'],
                    "MODUL_ID"  => $data['ID'],
                    "_CREATE"   => '0',
                    "_READ"     => '0',
                    "_UPDATE"   => '0',
                    "_DELETE"   => '0'
                ];
            return $carry;
        }, $level);
        // end : data user_role

        $this->db->trans_begin();
        if($this->db->insert('user_modul', $data)){
            $this->db->insert_batch("user_role", $userRoles);
        }

        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return "true";
        }else{
            $this->db->trans_rollback();
            return "false";
        }
    }

    function edit_data_modul($data)
    {
        $id_modul = $data['ID'];
        $where = [
                "ID"=>$id_modul,
            ];
        unset($data['ID']);
        
        $this->db->trans_begin();
        if($this->db->update('user_modul', $data, $where)){
            $this->db->update('user_role', ["_CREATE"=>'0', "_READ"=>'0', "_UPDATE"=>'0', "_DELETE"=>'0'], ['MODUL_ID'=>$id_modul]);
        }

        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return "true";
        }else{
            $this->db->trans_rollback();
            return "false";
        }
    }

    function hapus_data_modul($data)
    {
        $this->db->trans_begin();
        if($this->db->delete("user_role", ['MODUL_ID'=>$data['ID']])){
            $this->db->delete('user_modul', $data);
        }

        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return "true";
        }else{
            $this->db->trans_rollback();
            return "false";
        }
    }

    private function _get_data_level()
    {
        $query = $this
                ->db
                ->get("user_level");

        return $query;
    }
   
}