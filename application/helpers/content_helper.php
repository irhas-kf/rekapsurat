<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('dd')){
	function dd($value)
	{
		echo "<pre>"; print_r($value); exit();
	}
}

if(!function_exists('setting_paggination')){
	function setting_paggination($base_url, $per_page, $query)
	{
		$ci =& get_instance();
		$ci->load->library('pagination');

		$config['base_url'] = $base_url;
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = $per_page;

		$ci->pagination->initialize($config);

		return $ci->pagination->create_links();
	}
}

if (!function_exists('url_posting')) {
	function url_posting($url_depan, $data)
	{
		$tanggal = explode("-", $data['tanggal']);
		$set_url_tanggal = implode("/", $tanggal);
		$set_url_judul = "$data[id]/".preg_replace("/[^0-9A-Za-z]/", "-", $data['judul']);
		
		$url = base_url($url_depan."/".strtolower($data['kategori']).'/'.$set_url_tanggal."/$data[id_kategori]/".$set_url_judul);

		return $url;
	}
}

if (!function_exists('url_galeri')) {
	function url_galeri($url_depan, $data)
	{
		$tanggal = explode("-", $data['tanggal']);
		$set_url_tanggal = implode("/", $tanggal);
		$set_url_judul = "$data[id]/".preg_replace("/[^0-9A-Za-z]/", "-", $data['judul']);
		/*web/galeri/(:num)/(:num)/(:num)/(:num)/(:any)*/
		$url = base_url($url_depan."/".$set_url_tanggal."/".$set_url_judul);

		return $url;
	}
}

if (!function_exists('shorten_string')) {
	function shorten_string($string, $wordsreturned)
	{
		$retval = $string;
		$string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
		$string = str_replace("\n", " ", $string);
		$array = explode(" ", $string);
		if (count($array)<=$wordsreturned)
		{
			$retval = $string;
		}
		else
		{
			array_splice($array, $wordsreturned);
			$retval = implode(" ", $array)." ...";
		}

		return $retval;
	}
}

if (!function_exists('remove_img_tag')) {
	function remove_img_tag($content)
	{
		return preg_replace("/<img[^>]+\>/i", "[image]", $content); 
	}
}