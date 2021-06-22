
<?php

class M_read extends CI_Model{

	function tampil_datasurat(){
		$query = $this->db->get('tb_rekap_surat');
		return $query->result();
	}

	function rekap_tampil($bulan,$tahun){
		$query = $this->db->query("SELECT * FROM tb_rekap_surat
		WHERE YEAR(tanggal_surat)='$tahun' AND MONTH(tanggal_surat)='$bulan'
		ORDER BY id_rekap_surat DESC");
		return $query->result();
	}

	function rekap_tampil_jenis_surat($bulan,$tahun,$jenis_surat){
		$query = $this->db->query("SELECT * FROM tb_rekap_surat
		WHERE YEAR(tanggal_surat)='$tahun' AND MONTH(tanggal_surat)='$bulan' AND jenis_surat='$jenis_surat'
		ORDER BY id_rekap_surat DESC");
		return $query->result();
	}
	function rekap_tampil_jenis_surat_array($jenis_surat){
		$query = $this->db->query("SELECT jenis_surat FROM tb_rekap_surat WHERE jenis_surat = '$jenis_surat' LIMIT 1");
		return $query->result_array();
	}

	function tahun_saatini(){
		$query = $this->db->query("SELECT YEAR(tanggal_surat) AS tahun
		FROM tb_rekap_surat
		GROUP BY tanggal_surat
		ORDER BY tanggal_surat DESC");
		return $query->result();
	}

	function bulan_saatini(){
		$query = $this->db->query("SELECT MONTH(tanggal_surat) AS bulan
		FROM tb_rekap_surat");
		return $query->result();
	}

	function grafikatm(){
		$query = $this->db->query("SELECT YEAR(tanggal_surat) AS tahun, MONTH(tanggal_surat) AS bulan, COUNT(id_rekap_surat) AS jumlah, jenis_surat FROM tb_rekap_surat
		WHERE YEAR(tanggal_surat)='2021'");
		return $query->result();
    }

	// public function loadDataGrafik()
	// {
	// 	// query load data dari grafik
	// 	return $this->db->select('YEAR(rekap.tanggal_pengajuan) AS tahun,
	// 						rekap.id_jenis_surat,
	// 						jenis.nama_jenis_surat,
	// 						MONTH(rekap.tanggal_pengajuan) AS bulan,
	// 						COUNT(rekap.id_rekap_surat) AS jumlah')
	// 					->where(['YEAR(rekap.tanggal_pengajuan)'=>date('Y')])
	// 					->join('jenis_surat jenis', 'jenis.id_jenis_surat = rekap.id_jenis_surat', 'left')
	// 					->group_by('rekap.id_jenis_surat, YEAR(rekap.tanggal_pengajuan), MONTH(rekap.tanggal_pengajuan)')
	// 					->order_by('rekap.id_jenis_surat, YEAR(rekap.tanggal_pengajuan), MONTH(rekap.tanggal_pengajuan)')
	// 					->get('rekap_surat rekap');
	// }

	// function tampil_dataprofil(){
	// 	$query = $this->db->get('sejarah');
	// 	return $query->result();
	// }
	//
	// function edit_data($where,$table){
	// 	return $this->db->get_where($table,$where);
	// }
	//
	// function tampil_datapaket(){
	// 	$this->db->order_by('id', 'DESC');
	// 	$query = $this->db->get('tbl_paket');
	// 	return $query->result();
	// }
	// function tampil_databerita(){
	// 	$this->db->order_by('id', 'DESC');
	// 	$query = $this->db->get('tbl_berita');
	// 	return $query->result();
	// }
	//
	// function tampil_datagaleri(){
	// 	$query = $this->db->get('tbl_galeri');
	// 	return $query->result();
	// }
	//
	// function tampil_datagalerivideo(){
	// 	$query = $this->db->get('tbl_video');
	// 	return $query->result();
	// }
	//
	// function tampil_datacontact(){
	// 	$query = $this->db->get('tbl_contact');
	// 	return $query->result();
	// }
	//
	// function tampil_datahajiplus(){
	// 	$query = $this->db->get('tbl_hajiplus');
	// 	return $query->result();
	// }
	// function tampil_datalayanan(){
	// 	//$this->db->join('layanan', 'layanan.id = detil_layanan.id_layanan');
	// 	$query = $this->db->get('layanan');
	// 	return $query->result();
	// }
	//
	// function tampil_datakategorilayanan(){
	// 	$query = $this->db->get('layanan');
	// 	return $query->result();
	// }
	//
	// function tampil_datapesancontact(){
	// 	$query = $this->db->get('tbl_pesan');
	// 	return $query->result();
	// }
	//
	// function tampil_datapesan($where,$table){
	// 	return $this->db->get_where($table,$where);
	// }
	//
	// function tampil_datapesanan(){
	// 	$this->db->join('tbl_paket', 'tbl_paket.id = pesanan.id_paket');
	// 	$query = $this->db->get('pesanan');
	// 	return $query->result();
	// }
	//
	// function tampil_datakategorilayananwhere($where){
	// 	$query = $this->db->query("SELECT detil_layanan.*, layanan.* FROM detil_layanan JOIN layanan ON layanan.id = detil_layanan.id_layanan WHERE detil_layanan.id_detillayanan='$where'");
	// 	return $query;
	// }
	//
	// function lihatgambarpaket($where){
	// 	$query = $this->db->query("SELECT * FROM tbl_fotopaket WHERE idpaket = '$where'");
	// 	return $query;
	// }
	//
	// function editgambarpaket($where){
	// 	$query = $this->db->query("SELECT tbl_fotopaket.*, tbl_paket.*, tbl_fotopaket.`id` AS idgambarpaket
	// 	FROM tbl_paket
	// 	JOIN tbl_fotopaket ON tbl_fotopaket.`idpaket` = tbl_paket.`id`
	// 	WHERE tbl_paket.id='$where'");
	// 	return $query;
	// }
	//
	// function tampilpaket(){
	// 	$query = $this->db->query("SELECT foto FROM tbl_fotopaket");
	// 	return $query;
	// }
	//
	// function tampil_datapaket_id(){
	// 	$query = $this->db->query("SELECT MAX(id) AS idtambah FROM tbl_paket LIMIT 1");
	// 	return $query;
	// }
	//
	// function layananbackend(){
	// 	$query = $this->db->query("SELECT layanan.*, detil_layanan.*
	// 	FROM layanan
	// 	JOIN detil_layanan ON detil_layanan.`id_layanan` = layanan.`id`");
	// 	return $query;
	// }
	//
	// function tampil_datakategorigaleri(){
	// 	$query = $this->db->get('tbl_kategorifoto');
	// 	return $query->result();
	// }
	//
	// function kategorifoto(){
	// 	$query = $this->db->query("SELECT tbl_galeri.*, tbl_kategorifoto.*, tbl_galeri.`id` AS idfolder
	// 	FROM tbl_galeri
	// 	JOIN tbl_kategorifoto ON tbl_kategorifoto.`id` = tbl_galeri.`id_kategorifoto`
	// 	ORDER BY tbl_galeri.`id` DESC");
	// 	return $query;
	// }
	//
	// function kategorieditfoto($id){
	// 	$query = $this->db->query("SELECT tbl_galeri.*, tbl_kategorifoto.*, tbl_galeri.`id` AS idfolder
	// 	FROM tbl_galeri
	// 	JOIN tbl_kategorifoto ON tbl_kategorifoto.`id` = tbl_galeri.`id_kategorifoto`
	// 	WHERE tbl_galeri.`id` = '$id'");
	// 	return $query;
	// }
	//
	// function folderdetail($id){
	// 	$query = $this->db->query("SELECT tbl_galeri.*, tbl_kategorifoto.*, tbl_galeri.`id` AS idfolder
	// 	FROM tbl_galeri
	// 	JOIN tbl_kategorifoto ON tbl_kategorifoto.`id` = tbl_galeri.`id_kategorifoto`
	// 	WHERE tbl_galeri.`id_kategorifoto` = '$id'
	// 	ORDER BY tbl_galeri.`id` DESC");
	// 	return $query;
	// }

}
