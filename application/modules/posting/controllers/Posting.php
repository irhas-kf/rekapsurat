<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends MyBasecontroller {

	public function index()
	{
		$data['content'] = 'posting_page';
		$this->load->view('templates/index', $data);
	}
}
