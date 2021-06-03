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

		$datafaskes = $this->m_read->tampil_datafaskes();
		$datasurat = $this->m_read->tampil_datasurat();

		$data['content']='surat_v';
		$data['datafaskes']=$datafaskes;
		$data['datasurat']=$datasurat;

		$this->load->view('templates/index',$data);
	}

	public function input_rekap_aksi()
	{
		//Load session library
    $this->load->library('session');
    $this->load->helper('url');

		$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
		$nama = $this->input->post('nama');
		$nkk = $this->input->post('nkk');
		$nik = $this->input->post('nik');
		$no_kis = $this->input->post('no_kis');
		$alamat = $this->input->post('alamat');
		$faskes = $this->input->post('faskes');
		$jenis_surat = $this->input->post('jenis_surat');
		$keterangan = $this->input->post('keterangan');

		$datainsert = array(
			'id_faskes' => $faskes,
			'id_jenis_surat' => $jenis_surat,
			'nik' => $nik,
			'no_kartu_keluarga' => $nkk,
			'nama' => $nama,
			'nomor_kis' => $no_kis,
			'alamat' => $alamat,
			'keterangan' => $keterangan,
			'tanggal_pengajuan' => $tanggal_pengajuan,
			);

		$this->m_insert->input_data($datainsert,'rekap_surat');
		//add flash data
		$this->session->set_flashdata('data','data berhasil di input.');
		redirect('/Surat');
	}
}
