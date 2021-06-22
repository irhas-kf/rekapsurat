<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends MyBasecontroller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_insert');
		$this->load->model('m_read');
		$this->load->model('m_update');
		$this->load->model('m_delete');
		$this->load->helper(array('form', 'url'));
		$this->load->database();
	}

	private $modulId = 5;
	public $acl = array(
		'index' => '5|_READ',
		);

    protected function middleware()
    {
        return array('user_management');
    }

	public function index()
	{
		//Load session library
  	$this->load->library('session');

		$data['content']='surat_v';

		$this->load->view('templates/index',$data);
	}

	public function input_rekap_aksi()
	{
		//Load session library
    $this->load->library('session');
    $this->load->helper('url');

		$kd_klasifikasi = $this->input->post('kd_klasifikasi');
		$jenis_surat = $this->input->post('jenis_surat');
		$tanggal_surat = $this->input->post('tanggal_surat');
		$nama_surat = $this->input->post('nama_surat');
		$jumlah_surat = $this->input->post('jumlah_surat');
		$keterangan_surat = $this->input->post('keterangan_surat');

		$datainsert = array(
			'kd_klasifikasi' => $kd_klasifikasi,
			'jenis_surat' => $jenis_surat,
			'tanggal_surat' => $tanggal_surat,
			'nama_surat' => $nama_surat,
			'jumlah_surat' => $jumlah_surat,
			'keterangan_surat' => $keterangan_surat,
			);

		$this->m_insert->input_data($datainsert,'tb_rekap_surat');
		//add flash data
		$this->session->set_flashdata('data','data berhasil di input.');
		redirect('/Surat');
	}
}
