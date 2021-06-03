<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model 
{
    private $sessions;
    function __construct() {
        parent::__construct();
        $this->sessions = $this->session->userdata('admin');
    }

    function data_menu($where='')
    {
        if($where!=''){
            $this->db->where($where);
        }
        return $this->db->get("user_menu");
    }

    function simpan_data_menu($dataModul, $dataMenu)
    {
        $maxId = $this->db->select_max('ID')->get('user_modul')->row()->ID;
        $level = $this->_get_data_level()->result_array();
        $dataModul['ID'] = $maxId+1;

        // data user_role
        $userRoles = [];
        $userRoles = array_map(function ($item) use ($dataModul){
            $carry = [
                    "LEVEL_ID"  => $item['ID'],
                    "MODUL_ID"  => $dataModul['ID'],
                    "_CREATE"   => '0',
                    "_READ"     => '0',
                    "_UPDATE"   => '0',
                    "_DELETE"   => '0'
                ];
            return $carry;
        }, $level);
        // end : data user_role

        $this->db->trans_begin();
        if($this->db->insert('user_modul', $dataModul)){
            $this->db->insert_batch("user_role", $userRoles);

            $dataMenu['MODUL_ID'] = $dataModul['ID'];
            $this->db->insert("user_menu", $dataMenu);
        }

        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return "true";
        }else{
            $this->db->trans_rollback();
            return "false";
        }
    }

    function edit_data_menu($dataModul, $dataMenu)
    {
        $id_modul = $dataModul['ID'];
        $where = [
                "ID"=>$id_modul,
            ];
        unset($dataModul['ID']);
        
        $this->db->trans_begin();
        if($this->db->update('user_modul', $dataModul, $where)){
            // $this->db->update('user_role', ["_CREATE"=>'0', "_READ"=>'0', "_UPDATE"=>'0', "_DELETE"=>'0'], ['MODUL_ID'=>$id_modul]);

            $id_menu = $dataMenu['ID'];
            $whereMenu = [
                    "ID"=>$id_menu,
                    "MODUL_ID"=>$id_modul,
                ];
            unset($dataMenu['ID']);
            $this->db->update('user_menu', $dataMenu, $whereMenu);
        }

        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return "true";
        }else{
            $this->db->trans_rollback();
            return "false";
        }
    }

    function hapus_data_menu($data)
    {
        $this->db->trans_begin();
        if($this->db->delete("user_role", ['MODUL_ID'=>$data['ID']])){
            $this->db->delete('user_menu', ['MODUL_ID'=>$data['ID']]);
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