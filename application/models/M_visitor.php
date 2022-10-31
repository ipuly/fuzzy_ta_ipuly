<?php
class M_visitor extends CI_Model{

	function m_show_barang(){
		$hasil = $this->db->query("SELECT b.id_barang, b.nama_barang, b.harga, 
		b.gambar1, br.nama_brand FROM barang b JOIN brand br ON b.id_brand=br.id_brand");
		return $hasil->result();
	}

	function m_barang_fuzzy($idFinal,$id_kategori){
		$baseQuery = "SELECT id_barang, nama_barang, harga, gambar1 FROM barang WHERE id_kategori=".$id_kategori." ORDER BY ";
		$addQuery = "";
		for ($i=0; $i < count($idFinal); $i++) { 
			if ($i==0) {
				$addQuery .= "FIELD(id_barang,".$idFinal[$i];
			}else if($i == (count($idFinal)-1)){
				$addQuery .= ",".$idFinal[$i].")";
			}else{
				$addQuery .= ",".$idFinal[$i];
			}
		}
		$baseQuery .= $addQuery;
		// return $baseQuery;
		$hasil = $this->db->query($baseQuery);
		return $hasil->result();
	}

	function m_fetch_derajat(){
		$hasil = $this->db->query("SELECT d.*, p.nama_parameter
									FROM derajat d
									JOIN parameter p 
									ON d.id_parameter=p.id_parameter
									ORDER BY p.keterangan,d.id_parameter ASC");
		return $hasil->result();
	}

	function m_fetch_nilai_barang($id_kategori){
		$hasil = $this->db->query("SELECT b.id_barang, b.nama_barang, k.nama_kategori, br.nama_brand, br.bobot, b.harga, b.tahun_produksi, b.stok, b.keterangan, b.gambar1, b.ukuran
								FROM barang b
								JOIN kategori k
								ON b.id_kategori=k.id_kategori
								JOIN brand br
								ON b.id_brand=br.id_brand
								WHERE b.id_kategori='$id_kategori'");

		return $hasil->result();
	}

	function m_fetch_rules(){
		$hasil = $this->db->query("SELECT r.*, d.id_fuzzy, drj.nama_dk, 
									(SELECT nama_dk FROM derajat WHERE id_dk=r.id_defuzzy) AS defuzzy 
									FROM rules r
									JOIN detail_rules d 
									ON r.id_rules=d.id_rules
									JOIN derajat drj
									ON d.id_fuzzy=drj.id_dk
									ORDER BY d.id_detail_rules ASC");
		return $hasil->result();
	}
	
}