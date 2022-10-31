<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	function index(){
		$this->load->view('admin/v_login');		
	}

	function auth(){
		$email = $this->input->post('txtEmail');
		$password = $this->input->post('txtPassword');
		$hasil = $this->m_login->m_auth($email,$password);
		$encode = json_decode(json_encode($hasil));				
		if($encode->result != 0){
			session_start();
			$_SESSION['id'] = $encode->id_user;
			$_SESSION['start'] = time();
        	$_SESSION['expire'] = $_SESSION['start'] + (300 * 60);
		}
		echo json_encode($hasil);
	}

}