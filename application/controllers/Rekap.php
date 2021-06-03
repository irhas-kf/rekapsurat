<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends MyBasecontroller {

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
		$bulansaatini = $this->m_read->bulan_saatini();
		$tahunsaatini = $this->m_read->tahun_saatini();
		$datasurat = $this->m_read->tampil_datasurat();
		$data['content']='rekap_v';
		$data['tahunsaatini']=$tahunsaatini;
		$data['bulansaatini']=$bulansaatini;
		$data['datasurat']=$datasurat;
		$this->load->view('templates/index',$data);

	}

	public function aksi_tampil()
	{
		$jenis_surat = $this->input->post('jenis_surat');
		$multipelfiled = $this->input->post('subject');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		if ($this->input->post('tampil')) {

			if ($jenis_surat == 0) {
				$rekaptampil = $this->m_read->rekap_tampil($bulan,$tahun);
				$bulansaatini = $this->m_read->bulan_saatini();
				$tahunsaatini = $this->m_read->tahun_saatini();
				$datasurat = $this->m_read->tampil_datasurat();

				$data['tahunsaatini']=$tahunsaatini;
				$data['bulansaatini']=$bulansaatini;
				$data['rekaptampil']=$rekaptampil;
				$data['rekaptampilarray']=$jenis_surat;
				$data['datasurat']=$datasurat;
				$data['datafiledrekapsurat']=$multipelfiled;
				$data['content']='rekap_tampil_v';

				$this->load->view('templates/index',$data);
			}
			else {
				$rekaptampil = $this->m_read->rekap_tampil_jenis_surat($bulan,$tahun,$jenis_surat);
				$rekaptampilarray = $this->m_read->rekap_tampil_jenis_surat_array($jenis_surat);
				$bulansaatini = $this->m_read->bulan_saatini();
				$tahunsaatini = $this->m_read->tahun_saatini();
				$datasurat = $this->m_read->tampil_datasurat();

				foreach ($rekaptampilarray as $value) {
					$datavalue = $value['nama_jenis_surat'];
				}

				$data['tahunsaatini']=$tahunsaatini;
				$data['bulansaatini']=$bulansaatini;
				$data['rekaptampil']=$rekaptampil;
				$data['rekaptampilarray']=$datavalue;
				$data['datasurat']=$datasurat;
				$data['datafiledrekapsurat']=$multipelfiled;
				$data['content']='rekap_tampil_v';

				$this->load->view('templates/index',$data);
			}
		}

		if ($this->input->post('cetakpdf')) {
			if ($jenis_surat == 0) {
				$rekaptampil = $this->m_read->rekap_tampil($bulan,$tahun);
				$bulansaatini = $this->m_read->bulan_saatini();
				$tahunsaatini = $this->m_read->tahun_saatini();
				$datasurat = $this->m_read->tampil_datasurat();

				$data['tahunsaatini']=$tahunsaatini;
				$data['bulansaatini']=$bulansaatini;
				$data['rekaptampil']=$rekaptampil;
				$data['rekaptampilarray']=$jenis_surat;
				$data['datasurat']=$datasurat;
				$data['datafiledrekapsurat']=$multipelfiled;
				$data['content']='rekap_tampil_v';

				$this->load->view('templates/rekap_cetakpdf_v',$data);
			}
			else {
				$rekaptampil = $this->m_read->rekap_tampil_jenis_surat($bulan,$tahun,$jenis_surat);
				$rekaptampilarray = $this->m_read->rekap_tampil_jenis_surat_array($jenis_surat);
				$bulansaatini = $this->m_read->bulan_saatini();
				$tahunsaatini = $this->m_read->tahun_saatini();
				$datasurat = $this->m_read->tampil_datasurat();

				foreach ($rekaptampilarray as $value) {
					$datavalue = $value['nama_jenis_surat'];
				}

				$data['tahunsaatini']=$tahunsaatini;
				$data['bulansaatini']=$bulansaatini;
				$data['rekaptampil']=$rekaptampil;
				$data['rekaptampilarray']=$datavalue;
				$data['datasurat']=$datasurat;
				$data['datafiledrekapsurat']=$multipelfiled;
				$data['content']='rekap_tampil_v';

				$this->load->view('templates/rekap_cetakpdf_v',$data);
			}
		}
	}
}
