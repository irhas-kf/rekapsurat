<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MyBasecontroller {

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

		// for ($x = 0; $x <= 11; $x++) {
		//  $data['report'] = $this->m_read->report($x);
		// //  echo json_encode($data);
		// }
		$data['load_grafik'] = $this->loadDataGrafik();

		$data['content']='dashboard_v';
		$this->load->view('templates/index',$data);
	}

	public function loadDataGrafik()
	{
		$dataGrafik = $this->m_read->loadDataGrafik()->result();
		$jenis_surat = $this->m_read->tampil_datasurat();
		$countDefault = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

		// menata ulang array sesuai kebutuhan untuk data grafik
		$result_jenissurat = [];
		foreach($jenis_surat as $keyJ => $valueJ) {
			$result_jenissurat[$valueJ->id_jenis_surat] = [
				'id'	=> $valueJ->id_jenis_surat,
				'name'	=> $valueJ->nama_jenis_surat,
				'data'	=> $countDefault
			];
		}

		// mengambil 'jumlah' dari masing-masing jenis surat berdasarkan bulan utk diperbarui pada data
		foreach($dataGrafik as $keyG => $valueG) {
			$result_jenissurat[$valueG->id_jenis_surat]['data'][$valueG->bulan-1] = $valueG->jumlah;
		}

		return $result_jenissurat;
	}
}
