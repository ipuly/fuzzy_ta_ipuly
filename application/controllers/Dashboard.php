<?php

session_start();

class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_dashboard');
	}
	function index(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$currentTime = time();
		    if($currentTime > $_SESSION['expire']) {
		        session_unset();
		        session_destroy();
		        header('location:index.php');
		    }else{
		    	$this->load->view('admin/v_dashboard');
		    }			
		}
	}

	function jumlah_barang(){				
		if (!isset($_SESSION['id'])){				
			$this->load->view('404');		
		}else{
			$data=$this->m_dashboard->m_jumlah_barang();
			echo json_encode($data);
		}
	}

	// function jumlah_jasa(){		
	// 	if (!isset($_SESSION['id'])){				
	// 		$this->load->view('404');		
	// 	}else{
	// 		$data=$this->m_dashboard->m_jumlah_jasa();
	// 		echo json_encode($data);
	// 	}
	// }

	function jumlah_brand(){
		if (!isset($_SESSION['id'])){				
			$this->load->view('404');		
		}else{
			$data=$this->m_dashboard->m_jumlah_brand();
			echo json_encode($data);
		}		
	}

	function jumlah_kategori(){
		if (!isset($_SESSION['id'])){				
			$this->load->view('404');		
		}else{
			$data=$this->m_dashboard->m_jumlah_kategori();
			echo json_encode($data);
		}		
	}

	function unsetSession(){
		session_unset();
		session_destroy();
	}

}