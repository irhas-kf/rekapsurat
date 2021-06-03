<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_userlevel extends CI_Model 
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
                ->where(['ID<>'=>0])
                ->get('user_level');
    
        return $query->num_rows();  

    }
    
    function allposts($limit,$start,$col,$dir)
    {
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->where(['ID<>'=>0])
                ->get('user_level');
        
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
                ->or_like('LEVEL',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->where(['ID<>'=>0])
                ->get('user_level');
        
       
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
                ->or_like('LEVEL',$search)
                ->where(['ID<>'=>0])
                ->get('user_level');
    
        return $query->num_rows();
    }

    function simpan_data_level($data)
    {
        $maxId = $this->db->select_max('ID')->get('user_level')->row()->ID;
        $data['ID'] = $maxId+1;

        $this->db->trans_begin();
        if($this->db->insert('user_level', $data)){
        
            // data user_role
            $modul = $this->_get_data_modul();
            if($modul->num_rows()>0){
                $userRoles = [];
                $userRoles = array_map(function ($item) use ($data){
                    $carry = [
                            "LEVEL_ID"  => $data['ID'],
                            "MODUL_ID"  => $item['ID'],
                            "_CREATE"   => '0',
                            "_READ"     => '0',
                            "_UPDATE"   => '0',
                            "_DELETE"   => '0'
                        ];
                    return $carry;
                }, $modul->result_array());
                // end : data user_role
                $this->db->insert_batch("user_role", $userRoles);
            }
        }

        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return "true";
        }else{
            $this->db->trans_rollback();
            return "false";
        }
    }

    function edit_data_level($data)
    {
        $where = [
                "ID"=>$data['ID']
            ];
        unset($data['ID']);
        return $this->db->update('user_level', $data, $where);
    }

    function hapus_data_level($data)
    {
        $this->db->trans_begin();
        $userRoles = $this->db->get_where("user_role", ['LEVEL_ID'=>$data['ID']]);
        if($userRoles->num_rows()>0){
            if($this->db->delete("user_role", ['LEVEL_ID'=>$data['ID']])){
                $this->db->delete('user_level', $data);
            }   

        }else{
            $this->db->delete('user_level', $data);
            
        }

        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return "true";
        }else{
            $this->db->trans_rollback();
            return "false";
        }
    }

    private function _get_data_modul()
    {
        $query = $this
                ->db
                ->get('user_modul');

        return $query;
    }
   
}