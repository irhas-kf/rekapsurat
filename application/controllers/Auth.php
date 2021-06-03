<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['M_auth']);
	}

	function index()
	{
		redirect(base_url());
	}

	function filter_input($text) {
		return preg_replace("/[^a-zA-Z0-9 ]+/", "", $text);
	}

	function do_login()
	{
		$inputs = $this->input->post();
		$input = array_reduce(array_keys($inputs), function ($carry, $item) use ($inputs){
			$carry[$item] = $this->filter_input($inputs[$item]);
			return $carry;
		});
		$queryData = $this->M_auth->get_data_user($input['username'], sha1($input['password']));
		$userData = '';
		if($queryData->num_rows()>0){
			$userData = $queryData->row_array();
			unset($userData['PASSWORD']);
			// $userData['TAHUN'] = $input['tahun'];
			$this->_set_session_user($userData);
			$this->_set_session_roles($userData);
			$this->_set_session_menus();
		}else{
			session_destroy('admin');
			redirect(base_url()."?act=failed&username=$inputs[username]");
		}

		// if($userData!='' && $userData['LEVEL_ID']==0){
		// 	redirect(base_url("superadmin/user_level"));
		// }else{
		// 	redirect(base_url("pegawai/absensi"));	
		// }

		// echo "<pre>";
		// print_r($this->session->userdata());
		// exit();
		
		redirect(base_url("dashboard"));
	}

	private function _set_session_user($data)
	{
		$this->session->set_userdata('admin', $data);
	}

	private function _set_session_roles($data)
	{
		$get_modul = $this->M_auth->get_data_roles(['LEVEL_ID'=>$data['LEVEL_ID']])->result_array();
		$modul = [];
		foreach ($get_modul as $key => $value) {
			# code...
			$modul[$value['MODUL']] = $value['_READ'].$value['_CREATE'].$value['_UPDATE'].$value['_DELETE'];
		}
		$this->session->set_userdata('modul', $modul);
	}

	private function _set_session_menus()
	{
		$menu = menu_item();
		$this->session->set_userdata('menu', $menu);
	}

	function logout()
	{
		session_destroy();
		redirect(base_url());
	}

	function forbidden()
	{
		$data['content']='forbidden_page';
		$this->load->view('templates/index',$data);
	}

}