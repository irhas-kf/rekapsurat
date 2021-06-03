<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	function tgl($tgl){
		return date('Y-m-d', strtotime($tgl));
	}

	function tgl_full($tgl, $jenis){
		$hari_h = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
		$tg = date("d", strtotime($tgl));
		$bln = date("m", strtotime($tgl));
		$bln2 = date("m", strtotime($tgl));
		$thn = date("Y", strtotime($tgl));
		$bln_h = array('01' => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "Nopember", "12" => "Desember");
		$bln = $bln_h[$bln];
		$hari = $hari_h[date("w", strtotime($tgl))];

		if($jenis == '0'){
			$print = $tg.' '.$bln.' '.$thn;
		}else if($jenis == '1'){
			$print = $hari.', '.$tg.' '.$bln.' '.$thn;
		}else{
			$print = $tg.'-'.$bln2.'-'.$thn;
		}
		return $print;
	}

	function tgl_edit($tgl){
		return date('m/d/Y', strtotime($tgl));
	}

	function bulan_idn($month){
		$bln_h = array("-", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
		return $bln_h[$month];
	}

	function get_nama_bulan($bulanke='')
	{
		$bulan = array("-", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");

		if($bulanke!="" && $bulanke<(sizeof($bulan)-1) ){
			return $bulan[$bulanke];
		}else{
			return $bulan;
		}
	}

	function get_sesi($param='')
	{
		$ci =& get_instance();
		$admin = $ci->session->userdata("admin");
		$result = "";
		if(isset($admin[$param])){
			$result = $admin[$param];
		}else{
			$result = "hmmm...";
		}
		return $result;
	}
