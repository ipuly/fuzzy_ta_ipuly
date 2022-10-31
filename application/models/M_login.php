<?php
class M_login extends CI_Model{

	function m_auth($email,$password){
		$hasil = $this->db->query("SELECT id_user, privilage FROM user WHERE email='$email' AND password=sha1('$password')");
		if($hasil->num_rows() > 0){
			
			foreach ($hasil->result() as $data) {
				$hasil = array('result' => 1, 'id_user' => $data->id_user, 'privilage' => $data->privilage);
			}

		}else{
			$hasil = array('result' => 0);
		}
		return $hasil;
	}
	
	
}