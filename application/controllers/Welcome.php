<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	private $adminData;

	function __construct()
	{
		parent::__construct();
		$this->adminData = ($this->session->userdata('admin')=='')?"":$this->session->userdata('admin');
	}

	public function index()
	{
		// $data['tahun'] = [];
		// $data['tahun']['0'] = '---Tahun---';
		// for($i=(int)date('Y'); $i>=2010; $i--)
		// {
		// 	$data['tahun'][$i] = $i;
		// }
		$data['admindata'] = $this->adminData;
		$this->load->view('portal/login', $data);
	}
}
