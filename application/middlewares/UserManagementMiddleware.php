<?php
// src: application/middlewares/UserManagementMiddleware.php

class UserManagementMiddleware
{	
    protected $controller;
    protected $ci;

    public $acl = array();

    public function __construct($controller, $ci) {
        $this->controller = $controller;
        $this->ci = $ci;
    }

    public function run(){
	    $session = $this->ci->session->userdata('admin');
	    
	    if (!$session) {
	    	redirect(base_url('auth/logout'));
	    }

    	$controllerAcl = $this->controller->acl;

    	if (!empty($controllerAcl) && isset($controllerAcl[$this->controller->router->method])) {
	    	$this->ci->load->model('Crud', 'crud');

	    	$masterAcl = $this->ci->crud->get($session['LEVEL_ID']);

	    	$expectedAcl = $controllerAcl[$this->controller->router->method];	// resulting <modul id>|<create or update or delete column name on master acl>
	    	$expectedAclArr = explode('|', $expectedAcl);
			
	    	$resultAcl = array_filter($masterAcl, function($acl) use ($expectedAclArr) {
	    		return $acl['MODUL_ID'] == $expectedAclArr[0] && $acl[$expectedAclArr[1]] == 1;
	    	});

	    	if (empty($resultAcl)) {
	    		if (!$this->ci->input->is_ajax_request()) {
					// var_dump($this->controller->acl);
					// die('You are not allowed to access this file.');
					header('HTTP/1.0 403 Forbidden');
					redirect(base_url('auth/forbidden'));
				} else {
					echo json_encode([
							"type"=>"error",
							"text"=>"Anda tidak memiliki hak akses."
						]);
					exit();
				}
	    	}
	    	$this->acl = $masterAcl;
	    }
    }
}