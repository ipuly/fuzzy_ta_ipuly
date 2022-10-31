<?php

session_start();

class Admin extends CI_Controller{	

	function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
	}

	// ===================== DASHBOARD ==========================
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
			$data=$this->m_admin->m_jumlah_barang();
			echo json_encode($data);
		}
	}

	function jumlah_rules(){		
		if (!isset($_SESSION['id'])){				
			$this->load->view('404');		
		}else{
			$data=$this->m_admin->m_jumlah_rules();
			echo json_encode($data);
		}
	}

	function jumlah_brand(){
		if (!isset($_SESSION['id'])){				
			$this->load->view('404');		
		}else{
			$data=$this->m_admin->m_jumlah_brand();
			echo json_encode($data);
		}		
	}

	function jumlah_kategori(){
		if (!isset($_SESSION['id'])){				
			$this->load->view('404');		
		}else{
			$data=$this->m_admin->m_jumlah_kategori();
			echo json_encode($data);
		}		
	}
	// ===================== END DASHBOARD ==========================

	// ===================== BARANG =================================
	function index_barang(){
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
		    	$this->load->view('admin/v_data_barang');
		    }			
		}
	}

	function tambah_barang(){
		$target_path = "assets/uploads/";        
		$server_ip = gethostbyname(gethostname());
		$file_upload_url = 'http://' . $server_ip . '/'. $target_path;
        // $file_upload_url2 = 'http://' . $server_ip . '/'. $target_path;
        // $file_upload_url3 = 'http://' . $server_ip . '/'. $target_path;
        date_default_timezone_set('Asia/Jakarta');
    	$now = date("ymdHis");
		
		
		$target_path = $target_path . $now. "1".".jpg";
	    // $target_path2 = $target_path . basename(@$_FILES['foto2']['name']);
	    // $target_path3 = $target_path . basename(@$_FILES['foto3']['name']);

	    $tmp = $_FILES['foto1']['size'] == 0 ? '' : $now."1".".jpg";
	    // $tmp2 = $_FILES['foto2']['size'] == 0 ? '' : $now."2".".jpg";
	    // $tmp3 = $_FILES['foto3']['size'] == 0 ? '' : $now."3".".jpg";

	    try {
	        // Throws exception incase file is not being moved
	        if (!move_uploaded_file(@$_FILES['foto1']['tmp_name'], $target_path)) {
	            echo 'Foto 1 not uploaded!';
	        }

	        // if (!move_uploaded_file(@$_FILES['foto2']['tmp_name'], $target_path)) {		            
	        //     echo 'Foto 2 not uploaded!';
	        // }

	        // if (!move_uploaded_file(@$_FILES['foto3']['tmp_name'], $target_path)) {		           
	        //     echo 'Foto 3 not uploaded!';
	        // }
	        
	    } catch (Exception $e) {        
	        echo $e->getMessage();
	    }

	     $nama_barang=$this->input->post('nama_barang');
		 $kategori_dropdown=$this->input->post('kategori_dropdown');
		 $brand_dropdown=$this->input->post('brand_dropdown');
		 $harga=$this->input->post('harga');
		 $ukuran=$this->input->post('ukuran');
		 $tahun=$this->input->post('tahun');
		 $stok=$this->input->post('stok');
		 $deskripsi=$this->input->post('deskripsi');

		 $data = $this->m_admin->m_tambah_barang($tmp, $nama_barang, $kategori_dropdown, $brand_dropdown, $harga, $ukuran, $tahun, $stok, $deskripsi);
		 echo json_encode($data);		
	}

	function show_barang(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_show_barang();
			echo json_encode($data);		
		}
	}	

	function get_barang_id(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$id_edit=$this->input->post('id_edit');
			$data=$this->m_admin->m_get_barang_id($id_edit);
			echo json_encode($data);		
		}
	}

	function ubah_barang(){
		$id_barang=$this->input->post('id_barang');
		$nama_barang=$this->input->post('nama_barang_ubah');
		$kategori_dropdown=$this->input->post('kategori_dropdown_ubah');
		$brand_dropdown=$this->input->post('brand_dropdown_ubah');
		$harga=$this->input->post('harga_ubah');
		$ukuran=$this->input->post('ukuran_ubah');
		$tahun=$this->input->post('tahun_ubah');
		$stok=$this->input->post('stok_ubah');
		$keterangan=$this->input->post('keterangan_ubah');
		$data = $this->m_admin->m_ubah_barang($id_barang, $nama_barang, $kategori_dropdown, $brand_dropdown, $harga,$ukuran, $tahun, 
			  $stok, $keterangan);
		 echo json_encode($data);
	}

	function hapus_barang(){
		$id_edit=$this->input->post('id_edit');
		$data = $this->m_admin->m_hapus_barang($id_edit); 			  
		echo json_encode($data);
	}
	// ===================== END BARANG ============================

	// ===================== KATEGORI =================================
	function index_kategori(){
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
		    	$this->load->view('admin/v_data_kategori');
		    }			
		}
	}

	function fetch_kategori(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_kategori();
			echo json_encode($data);		
		}
	}

	function tambah_kategori(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$nama_kategori=$this->input->post('nama_kategori');
			$data=$this->m_admin->m_tambah_kategori($nama_kategori);
			echo json_encode($data);		
		}
	}

	function get_kategori_id(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$id_edit=$this->input->post('id_edit');
			$data=$this->m_admin->m_get_kategori_id($id_edit);
			echo json_encode($data);		
		}
	}

	function ubah_kategori(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$id_kategori=$this->input->post('id_kategori');
			$nama_kategori=$this->input->post('nama_kategori_ubah');
			$data=$this->m_admin->m_ubah_kategori($id_kategori,$nama_kategori);
			echo json_encode($data);		
		}
	}

	// ===================== END KATEGORI ============================

	// ===================== BRAND =================================
	function index_brand(){
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
		    	$this->load->view('admin/v_data_brand');
		    }			
		}
	}

	function fetch_brand(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_brand();
			echo json_encode($data);		
		}
	}

	function tambah_brand(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$nama_brand=$this->input->post('nama_brand');
			$bobot=$this->input->post('bobot');
			$data=$this->m_admin->m_tambah_brand($nama_brand,$bobot);
			echo json_encode($data);		
		}
	}

	function get_brand_id(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$id_edit=$this->input->post('id_edit');
			$data=$this->m_admin->m_get_brand_id($id_edit);
			echo json_encode($data);		
		}
	}

	function ubah_brand(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$id_brand=$this->input->post('id_brand');
			$nama_brand=$this->input->post('nama_brand_ubah');
			$bobot=$this->input->post('bobot_ubah');
			$data=$this->m_admin->m_ubah_brand($id_brand,$nama_brand,$bobot);
			echo json_encode($data);		
		}
	}

	// ===================== END BRAND ============================

	// ===================== DERAJAT =================================
	function index_derajat(){
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
		    	$this->load->view('admin/v_data_derajat');
		    }			
		}
	}

	function fetch_parameter(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_parameter();
			echo json_encode($data);		
		}
	}

	function fetch_derajat(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_derajat();
			echo json_encode($data);		
		}
	}

	function tambah_derajat(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$id_derajat=$this->input->post('id_derajat');
			$nama_derajat=$this->input->post('nama_derajat');
			$batas_atas=$this->input->post('batas_atas');
			$batas_bawah=$this->input->post('batas_bawah');
			$id_parameter=$this->input->post('parameter_dropdown');			
			$data=$this->m_admin->m_tambah_derajat($id_derajat,$nama_derajat,$batas_atas,$batas_bawah,$id_parameter);
			echo json_encode($data);		
		}
	}

	function get_derajat_id(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$id_edit=$this->input->post('id_edit');
			$data=$this->m_admin->m_get_derajat_id($id_edit);
			echo json_encode($data);		
		}
	}

	function ubah_derajat(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$id_derajat=$this->input->post('id_derajat');
			$nama_derajat=$this->input->post('nama_derajat_ubah');
			$batas_atas=$this->input->post('batas_atas_ubah');
			$batas_bawah=$this->input->post('batas_bawah_ubah');
			$id_parameter=$this->input->post('parameter_dropdown_ubah');
			$data=$this->m_admin->m_ubah_derajat($id_derajat,$nama_derajat,$batas_atas,$batas_bawah,$id_parameter);
			echo json_encode($data);		
		}
	}
	// ===================== END DERAJAT ============================

	// ===================== RULES =================================
	function index_rules(){
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
		    	$this->load->view('admin/v_data_rules');
		    }			
		}
	}

	function fetch_linguistik1(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_linguistik1();
			echo json_encode($data);		
		}
	}

	function fetch_linguistik2(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_linguistik2();
			echo json_encode($data);		
		}
	}

	function fetch_linguistik3(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_linguistik3();
			echo json_encode($data);		
		}
	}

	function fetch_linguistik4(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_linguistik4();
			echo json_encode($data);		
		}
	}

	function fetch_linguistik5(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_linguistik5();
			echo json_encode($data);		
		}
	}

	function tambah_rules(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$r1=$this->input->post('linguistik1_dropdown');
			$r2=$this->input->post('linguistik2_dropdown');
			$r3=$this->input->post('linguistik3_dropdown');
			$r4=$this->input->post('linguistik4_dropdown');

			$rules[] = $r1;
			$rules[] = $r2;
			$rules[] = $r3;	
			$rules[] = $r4;			

			$id_defuzzy=$this->input->post('linguistik5_dropdown');
			$data = $this->m_admin->m_tambah_rules($id_defuzzy);	
			$encode = json_decode(json_encode($data));	

			for ($i=0;$i<count($rules);$i++) {			    			    
				$data = $this->m_admin->m_tambah_detail_rules($encode->last_id,$rules[$i]);
			}

			echo json_encode($data);		
		}
	}

	function fetch_rules(){
		$this->load->helper('url');
		if (!isset($_SESSION['id'])){	
			redirect('login', 'refresh');				
		}else{
			$data=$this->m_admin->m_fetch_rules();
			echo json_encode($data);		
		}
	}

	function hapus_rules(){
		$id_edit=$this->input->post('id_edit');
		$data = $this->m_admin->m_hapus_detail_rules($id_edit); 			  
		$data = $this->m_admin->m_hapus_rules($id_edit); 
		echo json_encode($data);
	}



	// ===================== END RULES ============================

	// ===================== REKOMENDASI =================================
	function index_rekomendasi(){
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
		    	$this->load->view('admin/v_data_rekomendasi');
		    }			
		}
	}

	public function findCenter($nilai){
		$c = array();
	    $count = 0;
	    $center = 0;
	    $idx = 1;	    
	    while ($idx <= count($nilai)-1){
	        if ($count == 2){      
	            $center = $center / 2;	            
	            array_push($c, $center);
	            $count = 0;
	            $center = 0;  
	        }else{
	        	$center += $nilai[$idx] ;                        
	            $count += 1;
	            $idx += 1; 
	        }
		}
    	return $c;
	}

	public function fuzzification($center, $dk, $input, $param, $nama){
    	$idx = 0;
    	$dic = array();
    	for ($i=0;$i<count($center);$i++) {     	    	    	      	    
	        $batas_kiri = 0;
	        $batas_kanan = 0;    
	        $fuzzi_1 = 0;
	        $fuzzi_2 = 0;
	        for ($j=0; $j<2; $j++) { 
	        	$idx+=1;	            	
	        }    	        	                           
	        $batas_kiri = (int) $dk[$idx-1];
	        $batas_kanan = (int) $dk[$idx];

	        if ($input < $batas_kiri){  
	            $kiri = ($idx/2)-1; 
	            $dic = array($nama => $param[$kiri].",1,".$param[$kiri].",1");
	            return $dic;
	            break;
	        }

	        if (($input >= $batas_kanan) && ($input <= (int) $dk[$idx+1])){                                            	
	            $kiri = ($idx/2);                            
	            $dic = array($nama => $param[$kiri].",1,".$param[$kiri].",1");
	            return $dic;
	            break;  
	        }   
	        
	        if (($input > $batas_kiri) && ($input > $batas_kanan)){
	            continue;
	        }else{	        	
	            $fuzzi_1 = ($batas_kanan - $input) / ($batas_kanan - $batas_kiri);        
	            $fuzzi_2 = ($input - $batas_kiri) / ($batas_kanan - $batas_kiri);                  	            
	            $kanan = $idx/2;
	            $kiri = ($idx/2)-1;            

	            if ($input > $center[$i]){
	            	$dic = array($nama => $param[$kanan].",".$fuzzi_2.",".$param[$kiri].",".$fuzzi_1);
	            }else{
	            	$dic = array($nama => $param[$kanan].",".$fuzzi_1.",".$param[$kiri].",".$fuzzi_2);
	        	}
	        	return $dic;
		        break; 
	        }
	    } 
    }

    public function find_paths($array) {
	    if (count($array) == 1) return $array[0];
	    $output = array();
	    foreach (array_shift($array) as $v1) {
	        foreach ($this->find_paths($array) as $v2) {
	            $output[] = array_merge($v1, is_array($v2) ? $v2 : array($v2));
	        }
	    }
	    return $output;
	}

    public function getDefuzzy($fuzzy_1, $fuzzy_2, $fuzzy_3, $fuzzy_4){    	
    	$data = $this->m_admin->m_fetch_rules();     	
    	$array = array(array());
    	
    	$k=0;
    	$b=0;
    	for ($i=0; $i<count($data); $i++) {     		
    		$temp = json_decode(json_encode($data[$i]));
    		if (($i+1)%3 != 0) {    			
    			$array[$b][$k] = $temp->nama_dk;
    			$k+=1;
    		}else{
    			$array[$b][$k] = $temp->nama_dk;    			
    			$array[$b][$k+1] = $temp->defuzzy;			
    			$b+=1;
    			$k=0;
    		}    		    	
    	}

    	$getArray = array(array());
    	$getArray[0][0] = array($fuzzy_1[0] => $fuzzy_1[1]);
    	$getArray[0][1] = array($fuzzy_1[2] => $fuzzy_1[3]);
    	$getArray[1][0] = array($fuzzy_2[0] => $fuzzy_2[1]);
    	$getArray[1][1] = array($fuzzy_2[2] => $fuzzy_2[3]);
    	$getArray[2][0] = array($fuzzy_3[0] => $fuzzy_3[1]);
    	$getArray[2][1] = array($fuzzy_3[2] => $fuzzy_3[3]);
    	$getArray[3][0] = array($fuzzy_4[0] => $fuzzy_4[1]);
    	$getArray[3][1] = array($fuzzy_4[2] => $fuzzy_4[3]);

    	$array_comb = $this->find_paths($getArray);      	
    	$a=0;$b=0;$c=0;
    	$temp_rules = array(array());
    	for ($x=0; $x < count($array_comb); $x++) {  
    		$string = "";   	    	   	    		
	    	foreach($array_comb[$x] as $key => $value) {
			   $string .= $key.",".$value.",";
			   $data_min = explode(",", $string);		   
			   for ($i=0; $i < count($array); $i++) { 
		    		if (($data_min[0] == $array[$i][0]) && ($data_min[2] == $array[$i][1]) && ($data_min[4] == $array[$i][2])){
		    			$min = min($data_min[1],$data_min[3],$data_min[5]);
		    			$defuz = $array[$i][3];
		    			$temp_min = (string) $array[$i][3].",".$min;
		    			break;		    			
		    		}
	    		}
			}
			if ($defuz == "tidak rekomendasi") {			
				$temp_rules[0][$a] = $min;
				$a++;
			}else if($defuz == "rekomendasi"){
				$temp_rules[1][$b] = $min;
				$b++;
			}else if ($defuz == "sangat rekomendasi") {
				$temp_rules[2][$c] = $min;
				$c++;				
			}
			
		}	

		$max_1=0;$max_2=0;$max_3=0;
		for ($i=0; $i < count($temp_rules) ; $i++) { 
			$getMax = array();
		  	for ($j=0; $j < count($temp_rules[$i]); $j++) { 
		  		$getMax[$j] = $temp_rules[$i][$j];
		  	}
		  	if ($i==0) {
		  		count($getMax) == 0 ? $max_1 = 0 : $max_1 = max($getMax);		  		
		  	}else if ($i==1) {
		  		count($getMax) == 0 ? $max_1 = 0 : $max_2 = max($getMax);
		  	}else if ($i==2) {
		  		count($getMax) == 0 ? $max_1 = 0 : $max_3 = max($getMax);
		  	}
		}

		if($max_3 != 0){
			$max = "C,".$max_3;
		}else if($max_2 != 0){
			$max = "B,".$max_2;
		}else{
			$max = "A,".$max_3;
		}	    	

    	return $max;
    }

	function fuzzy_method(){
		$data = $this->m_admin->m_fetch_derajat();
		$var_ling = array();
		$nilai_var_1 = array();
		$nilai_var_2 = array();
		$idx_row = 0;
		$idx_col = 0;
		$temp_clus = array(array());
		$temp_clus_var = array(array());

		for ($i=0; $i < count($data) ; $i++) { 
			$encode = json_decode(json_encode($data[$i]));
			$var_ling[$i] = $encode->nama_dk;
			$nilai_var_1[$i] = $encode->batas_atas;
			$nilai_var_2[$i] = $encode->batas_bawah;
		}

		for ($i=0; $i < count($nilai_var_1) ; $i++) { 
			if($nilai_var_2[$i] != "100"){
				$temp_clus[$idx_row][$idx_col] = $nilai_var_1[$i];
				$temp_clus[$idx_row][$idx_col+1] = $nilai_var_2[$i];				
				$idx_col+=2;
			}else{
				$temp_clus[$idx_row][$idx_col] = $nilai_var_1[$i];
				$temp_clus[$idx_row][$idx_col+1] = $nilai_var_2[$i];
				$idx_col+=2;
				$idx_row+=1;
			}									
		}

		$idx = 0;
		for ($i=0;$i<count($temp_clus);$i++) { 
			for ($j=0; $j<(count($temp_clus[$i])/2); $j++) { 
				$temp_clus_var[$i][$j] = $var_ling[$idx];
				$idx+=1;
			}
		}

		$data_clus_1 = [];
		$data_clus_2 = [];
		$data_clus_3 = [];
		$data_clus_4 = [];
		$data_clus_5 = [];

		$idx = 0;
		for ($i=0;$i<count($temp_clus);$i++) { 
			for ($j=0;$j<count($temp_clus[$i]); $j++) {
				if($i == 0){
					$data_clus_1[$j] = $temp_clus[$i][$idx];
				}elseif ($i==1) {
					$data_clus_2[$j] = $temp_clus[$i][$idx];
				}elseif ($i==2) {
					$data_clus_3[$j] = $temp_clus[$i][$idx];
				}elseif ($i==3) {
					$data_clus_4[$j] = $temp_clus[$i][$idx];
				}elseif ($i==4) {
					$data_clus_5[$j] = $temp_clus[$i][$idx];
				}
				$idx+=1;
			}
		}

		$var_clus_1 = [];
		$var_clus_2 = [];
		$var_clus_3 = [];
		$var_clus_4 = [];
		$var_clus_5 = [];

		for ($i=0;$i<count($temp_clus_var);$i++) { 
			for ($j=0;$j<count($temp_clus_var[$i]); $j++) {
				if($i == 0){
					$var_clus_1[$j] = $temp_clus_var[$i][$j];
				}elseif ($i==1) {
					$var_clus_2[$j] = $temp_clus_var[$i][$j];
				}elseif ($i==2) {
					$var_clus_3[$j] = $temp_clus_var[$i][$j];
				}elseif ($i==3) {
					$var_clus_4[$j] = $temp_clus_var[$i][$j];
				}elseif ($i==4) {
					$var_clus_5[$j] = $temp_clus_var[$i][$j];
				}				
			}
		}

		sort($data_clus_1);
		sort($data_clus_2);
		sort($data_clus_3);
		sort($data_clus_4);

		$center_1 = $this->findCenter($data_clus_1);
		$center_2 = $this->findCenter($data_clus_2);
		$center_3 = $this->findCenter($data_clus_3);
		$center_4 = $this->findCenter($data_clus_4);

		$kategori_dropdown=$this->input->post('kategori_dropdown');
		$nilai=$this->m_admin->m_fetch_nilai_barang($kategori_dropdown);

		$bobot = [];
		$harga = [];
		$tahun = [];
		$ukuran = [];

		for ($i=0; $i < count($nilai) ; $i++) { 
			$encode = json_decode(json_encode($nilai[$i]));
			$bobot[$i] = (int) $encode->bobot;
			$harga[$i] = (int) $encode->harga;
			$tahun[$i] = $encode->tahun_produksi;
			$ukuran[$i] = (int) $encode->ukuran;
		}
		
		$min = min($harga);
		$max = max($harga);
		for($i=0;$i<count($harga);$i++) { 
			$harga[$i] = round(($max - $harga[$i]));
			if ($harga[$i] == 0) {
				$harga[$i] = 10;
			}
		}

		$min = min($harga);
		$max = max($harga);
		for($i=0;$i<count($harga);$i++) { 
			$harga[$i] = round(($harga[$i] - $min)/($max-$min)*85);
			if ($harga[$i] == 0) {
				$harga[$i] = 10;
			}
		}

		$dic_tahun = array(
		    "2021" => 10,
		    "2020" => 9,
		    "2019" => 8,
		    "2018" => 7,
		    "2017" => 6,
		    "2016" => 5,
		    "2015" => 4,
		    "2014" => 3,		    
		    "2013" => 2,
		    "2012" => 1,
		    "2011" => 1,
		    "2010" => 1,
		    "2009" => 1,
		    "2008" => 1,
		    "2007" => 1		    
		);

		for ($i=0;$i<count($tahun);$i++) { 			
			foreach($dic_tahun as $key => $value){
				if ($tahun[$i] == $key) {
					$tahun[$i] = round((($value*85)/10));
				}
			}
		}	

		for ($i=0;$i<count($bobot);$i++) { 						
			$bobot[$i] = round((($bobot[$i] *85)/100));				
		}

		for ($i=0;$i<count($ukuran);$i++) { 						
			$ukuran[$i] = round((($ukuran[$i] *85)/100));				
		}

		$fuzzy_harga = array();
		$fuzzy_brand = array();
		$fuzzy_tahun = array();
		$fuzzy_ukuran = array();
		for ($i=0;$i<count($harga);$i++) { 
			$cek_harga = $this->fuzzification($center_1, $data_clus_1, $harga[$i], $var_clus_1, "harga");			
			$fuzzy_harga[$i] = json_decode(json_encode($cek_harga));
			$fuzzy_harga[$i] = $fuzzy_harga[$i]->harga;

			$cek_brand = $this->fuzzification($center_2, $data_clus_2, $bobot[$i], $var_clus_2, "brand");			
			$fuzzy_brand[$i] = json_decode(json_encode($cek_brand));
			$fuzzy_brand[$i] = $fuzzy_brand[$i]->brand;

			$cek_tahun = $this->fuzzification($center_3, $data_clus_3, $tahun[$i], $var_clus_3, "tahun");			
			$fuzzy_tahun[$i] = json_decode(json_encode($cek_tahun));
			$fuzzy_tahun[$i] = $fuzzy_tahun[$i]->tahun;	

			$cek_ukuran = $this->fuzzification($center_4, $data_clus_4, $ukuran[$i], $var_clus_4, "ukuran");			
			$fuzzy_ukuran[$i] = json_decode(json_encode($cek_ukuran));
			$fuzzy_ukuran[$i] = $fuzzy_ukuran[$i]->ukuran;					
		}		

		$hasil_akhir = array();
		for ($i=0; $i < count($fuzzy_harga); $i++) { 
			$temp_harga = explode(",", $fuzzy_harga[$i]); 
			$temp_brand = explode(",", $fuzzy_brand[$i]); 
			$temp_tahun = explode(",", $fuzzy_tahun[$i]); 
			$temp_ukuran = explode(",", $fuzzy_ukuran[$i]); 
			$hasil = $this->getDefuzzy($temp_harga,$temp_brand,$temp_tahun,$temp_ukuran);
			$hasil_akhir[$i] = $hasil;
		}			

		$barang_fuzzy = array();
		for ($i=0; $i < count($hasil_akhir) ; $i++) { 
			$encode = json_decode(json_encode($nilai[$i]));
			$temp = explode(",", $hasil_akhir[$i]);
			$barang_fuzzy[$i] = array(
				"bobot" => $encode->bobot,
				"gambar1" => $encode->gambar1,
				"harga" => $encode->harga,
				"id_barang" => $encode->id_barang,
				"keterangan" => $encode->keterangan,
				"nama_barang" => $encode->nama_barang,
				"nama_brand" => $encode->nama_brand,
				"nama_kategori" => $encode->nama_kategori,
				"stok" => $encode->stok,
				"tahun_produksi" => $encode->tahun_produksi,
				"hasil_akhir" => $temp[1],
				"linguistik" => $temp[0]			
			);	
		}

		// usort($barang_fuzzy, function($a, $b) {
		//     return $a['linguistik'] <=> $b['linguistik'];
		// });

		usort($barang_fuzzy, function($a, $b) {
		    if([$a['linguistik'], $a['hasil_akhir']]==[$b['linguistik'], $b['hasil_akhir']]) return 0;
		    return $a['hasil_akhir'] < $b['hasil_akhir']?1:-1;
		});

		// usort($barang_fuzzy, function($a, $b) {
		//     return [$a['linguistik'], $a['hasil_akhir']]
		//            <=>
		//            [$b['linguistik'], $b['hasil_akhir']];
		// });



		echo json_encode($barang_fuzzy);
	}

	// ===================== END REKOMENDASI ============================

	function unsetSession(){
		session_unset();
		session_destroy();
	}

}