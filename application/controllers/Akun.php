<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends MyBasecontroller {

	function __construct()
	{
		parent::__construct();
	}

	private $modulId = 6;
	public $acl = array(
		'index' => '6|_READ',
		'ubah_akun' => '6|_UPDATE',
		'perbarui_akun' => '6|_UPDATE',
		);

    protected function middleware()
    {
        return array('user_management');
    }

	public function index()
	{
		// $sess = $this->session->userdata();
		// echo "<pre>"; print_r($sess); exit();
		redirect(base_url('akun/ubah_akun'));
	}

	public function ubah_akun()
	{
		$akun = $this
			->db
			->where([ 'ID'=>$this->group['ID'] ])
			->get('user_data')->row_array();
		$data['akun'] = ['username'=>$akun['USERNAME']];

		$data['content'] = 'akun/akun_v';
		$this->load->view('templates/index', $data);
	}

	public function perbarui_akun()
	{
		$input = $this->input->post();
		$id_akun = $this->group['ID'];

		$check = $this
			->db
			->where(['ID'=>$id_akun, 'password'=>SHA1($input['password']) ])
			->get('user_data');
		if($check->num_rows()>0){
			$data = [];
			if($input['new_password']!=""){
				$data['username'] = $input['username'];
				$data['password'] = SHA1($input['new_password']);
			}else{
				$data['username'] = $input['username'];
			}
			$this->db->update('user_data', $data, ['ID'=>$id_akun]);
			redirect(base_url('akun/ubah_akun?act=1'));
		}else{
			redirect(base_url('akun/ubah_akun?act=0'));
		}
	}
}