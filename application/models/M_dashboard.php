<?php
class M_dashboard extends CI_Model{

	function m_jumlah_barang(){
		$hasil=$this->db->query("SELECT COUNT(id_barang) AS jml_barang FROM barang");
		return $hasil->result();
	}

	// function m_jumlah_jasa(){
	// 	$hasil=$this->db->query("SELECT COUNT(id_jasa) AS jml_jasa FROM jasa");
	// 	return $hasil->result();
	// }

	function m_jumlah_brand(){
		$hasil=$this->db->query("SELECT COUNT(id_brand) AS jml_brand FROM brand");
		return $hasil->result();
	}

	function m_jumlah_kategori(){
		$hasil=$this->db->query("SELECT COUNT(id_kategori) AS jml_kategori FROM kategori");
		return $hasil->result();
	}
	
}