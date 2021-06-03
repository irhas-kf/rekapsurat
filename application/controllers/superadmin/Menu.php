<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MyBasecontroller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['superadmin/M_menu']);
	}

	private $modulId = 11;
	public $acl = array(
		'index' => "11|_READ",
		'tabelmenu' => "11|_READ",
		'parent_menu' => "11|_READ",
		'simpan_menu' => "11|_CREATE",
		'edit_menu' => "11|_UPDATE",
		'hapus_menu' => "11|_DELETE",
		);

    protected function middleware()
    {
        return array('user_management');
    }

	public function index()
	{
		$data['url_tabel_data'] 	= base_url("superadmin/menu/tabelmenu");
		$data['url_edit_menu'] 		= base_url('superadmin/menu/edit_menu');
		$data['url_simpan_menu'] 	= base_url('superadmin/menu/simpan_menu');
		$data['url_hapus_menu'] 	= base_url('superadmin/menu/hapus_menu');
		$data['url_parent_menu'] 	= base_url('superadmin/menu/parent_menu');

		$data['content']='superadmin/menu_v';
		$this->load->view('templates/index',$data);	
	}

	function tabelmenu()
	{
		$this->datatables->select("m.ID, m.MODUL_ID, m.MENU, m.LINK, m.ICON, m.MAIN_MENU, mo.MODUL, mo.SUPERADMIN_ONLY, m2.MENU as MENU2");

    	// set action button
    	$button = "<div class='btn-group'>";
    	$button .= "<button type='button' class='btn btn-sm btn-success' onclick='btnEditModul($(this))'>Edit</button>";
    	$button .= "<button type='button' class='btn btn-sm btn-danger' onclick='btnHapusModul($(this))'>Hapus</button>";
    	$button .="</div>";
    	// end : set action button

		$this->datatables->add_column("AKSI", $button);
		$this->datatables->join("user_menu AS m2", "m2.ID=m.MAIN_MENU", "LEFT");
		$this->datatables->join("user_modul AS mo", "mo.ID=m.MODUL_ID");
		$this->datatables->from("user_menu AS m");

		echo $this->datatables->generate();
	}

	function parent_menu()
	{
		$data = $this->M_menu->data_menu()->result_array();

		echo json_encode($data);
	}

	function simpan_menu()
	{
		$input = $this->input->post();

		$dataModul = [
				'ID'		=> $input['id_modul'],
				'MODUL'		=> strtoupper($input['modul']),
				'SUPERADMIN_ONLY' => $input['superadmin'],
			];
		$dataMenu = [
    			'MENU'		=> $input['menu'],
    			'LINK'		=> $input['link'],
    			'ICON'		=> $input['icon'],
    			'MAIN_MENU'	=> $input['main_menu'],
			];

		$query = $this->M_menu->simpan_data_menu($dataModul, $dataMenu);
		if($query){
			$result = [
				"type"=>"success",
				"text"=>"Data berhasil disimpan"
			];
		}else{
			$result = [
				"type"=>"error",
				"text"=>"Terjadi kesalahan!"
			];
		}

		echo json_encode($result);
	}

	function edit_menu()
	{
		$input = $this->input->post();
		$dataModul = [
				'ID'=>$input['id_modul'],
				'MODUL'=>strtoupper($input['modul']),
				'SUPERADMIN_ONLY'=>$input['superadmin']
			];
		$dataMenu = [
    			'ID'		=> $input['id_menu'],
    			'MENU'		=> $input['menu'],
    			'LINK'		=> $input['link'],
    			'ICON'		=> $input['icon'],
    			'MAIN_MENU'	=> $input['main_menu'],
			];

		$query = $this->M_menu->edit_data_menu($dataModul, $dataMenu);
		if($query){
			$result = [
				"type"=>"info",
				"text"=>"Data berhasil diperbarui"
			];
		}else{
			$result = [
				"type"=>"error",
				"text"=>"Terjadi kesalahan!"
			];
		}

		echo json_encode($result);
	}

	function hapus_menu()
	{
		$input = $this->input->post();
		$data = [
				'ID'=>$input['id_modul'],
			];

		$query = $this->M_menu->hapus_data_menu($data);
		if($query){
			$result = [
				"type"=>"success",
				"text"=>"Data berhasil dihapus"
			];
		}else{
			$result = [
				"type"=>"error",
				"text"=>"Terjadi kesalahan!"
			];
		}

		echo json_encode($result);
	}
}