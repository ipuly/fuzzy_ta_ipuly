<?php
class M_admin extends CI_Model{

	// ===================== DASHBOARD ==========================
	function m_jumlah_barang(){
		$hasil=$this->db->query("SELECT COUNT(id_barang) AS jml_barang FROM barang");
		return $hasil->result();
	}

	function m_jumlah_rules(){
		$hasil=$this->db->query("SELECT COUNT(id_rules) AS jmlRules FROM rules");
		return $hasil->result();
	}

	function m_jumlah_brand(){
		$hasil=$this->db->query("SELECT COUNT(id_brand) AS jml_brand FROM brand");
		return $hasil->result();
	}

	function m_jumlah_kategori(){
		$hasil=$this->db->query("SELECT COUNT(id_kategori) AS jml_kategori FROM kategori");
		return $hasil->result();
	}
	// ===================== END DASHBOARD ============================


	// ===================== BARANG ===================================
	
	function m_tambah_barang($tmp, $nama_barang, $kategori_dropdown, $brand_dropdown, $harga, $ukuran, $tahun, $stok, $deskripsi){
		$hasil=$this->db->query("INSERT INTO barang(gambar1,nama_barang,id_kategori,id_brand,harga,ukuran,tahun_produksi,stok,keterangan) VALUES ('$tmp', '$nama_barang', '$kategori_dropdown', '$brand_dropdown', '$harga', 
			'$ukuran', '$tahun','$stok', '$deskripsi')");

		return $hasil;
	}

	function m_show_barang(){
		$hasil = $this->db->query("SELECT b.id_barang, b.nama_barang, k.nama_kategori, br.nama_brand, b.harga, b.tahun_produksi, b.stok, b.keterangan, b.gambar1, b.ukuran
								FROM barang b
								JOIN kategori k
								ON b.id_kategori=k.id_kategori
								JOIN brand br
								ON b.id_brand=br.id_brand");

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

	function m_get_barang_id($id_barang){
		$hasil = $this->db->query("SELECT id_barang, nama_barang, id_kategori, id_brand, harga, 
								tahun_produksi, stok, keterangan, gambar1, ukuran
								FROM barang
								WHERE id_barang = '$id_barang' ");

		return $hasil->result();
	}

	function m_ubah_barang($id_barang, $nama_barang, $id_kategori, $id_brand, $harga, $ukuran, $tahun_produksi, $stok, $keterangan){
		$hasil = $this->db->query("UPDATE barang SET nama_barang='$nama_barang', id_kategori='$id_kategori', id_brand='$id_brand',harga='$harga', ukuran='$ukuran', tahun_produksi='$tahun_produksi', stok='$stok', keterangan='$keterangan' 
			WHERE id_barang='$id_barang'");
		return $hasil;
	}

	function m_hapus_barang($id_barang){
		$hasil = $this->db->query("DELETE FROM barang WHERE id_barang='$id_barang'");
		return $hasil;
	}

	// ===================== END BARANG ===============================


	// ===================== KATEGORI =================================
	function m_fetch_kategori(){
		$hasil = $this->db->query("SELECT * FROM kategori");
		return $hasil->result();
	}

	function m_tambah_kategori($nama_kategori){
		$hasil=$this->db->query("INSERT INTO kategori(nama_kategori) VALUES ('$nama_kategori')");

		return $hasil;
	}

	function m_get_kategori_id($id_kategori){
		$hasil = $this->db->query("SELECT id_kategori, nama_kategori FROM kategori
								   WHERE id_kategori = '$id_kategori' ");

		return $hasil->result();
	}

	function m_ubah_kategori($id_kategori, $nama_kategori){
		$hasil = $this->db->query("UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");
		return $hasil;
	}

	// ===================== END KATEGORI =============================


	// ===================== BRAND ====================================
	function m_fetch_brand(){
		$hasil = $this->db->query("SELECT * FROM brand");
		return $hasil->result();
	}

	function m_tambah_brand($nama_brand,$bobot){
		$hasil=$this->db->query("INSERT INTO brand(nama_brand,bobot) VALUES ('$nama_brand','$bobot')");

		return $hasil;
	}

	function m_get_brand_id($id_brand){
		$hasil = $this->db->query("SELECT id_brand, nama_brand, bobot FROM brand
								   WHERE id_brand = '$id_brand' ");

		return $hasil->result();
	}

	function m_ubah_brand($id_brand, $nama_brand, $bobot){
		$hasil = $this->db->query("UPDATE brand SET nama_brand='$nama_brand', bobot='$bobot' WHERE id_brand='$id_brand'");
		return $hasil;
	}		
	// ===================== END BRAND ================================


	// ===================== DERAJAT ==================================
	function m_fetch_derajat(){
		$hasil = $this->db->query("SELECT d.*, p.nama_parameter
									FROM derajat d
									JOIN parameter p 
									ON d.id_parameter=p.id_parameter
									ORDER BY p.keterangan,d.id_parameter ASC");
		return $hasil->result();
	}

	function m_tambah_derajat($id_dk, $nama_dk,$batas_atas,$batas_bawah,$id_parameter){
		$hasil=$this->db->query("INSERT INTO derajat(id_dk, nama_dk,batas_atas,batas_bawah,id_parameter) VALUES ('$id_dk','$nama_dk','$batas_atas','$batas_bawah','$id_parameter')");
		return $hasil;
	}

	function m_get_derajat_id($id_dk){
		$hasil = $this->db->query("SELECT id_dk,nama_dk,batas_atas,batas_bawah,id_parameter FROM derajat
								   WHERE id_dk = '$id_dk' ");

		return $hasil->result();
	}

	function m_ubah_derajat($id_dk, $nama_dk,$batas_atas,$batas_bawah,$id_parameter){
		$hasil = $this->db->query("UPDATE derajat SET nama_dk='$nama_dk', batas_atas='$batas_atas', 
			                       batas_bawah='$batas_bawah', id_parameter='$id_parameter' WHERE id_dk='$id_dk'");
		return $hasil;
	}
	// ===================== END DERAJAT ==============================


	// ===================== PARAMETER ====================================
	function m_fetch_parameter(){
		$hasil = $this->db->query("SELECT * FROM parameter");
		return $hasil->result();
	}
	// ===================== END PARAMETER ================================


	// ===================== RULES ====================================	
	function m_fetch_linguistik1(){
		$hasil = $this->db->query("SELECT id_dk, nama_dk
									FROM derajat 
									WHERE id_parameter = (SELECT id_parameter FROM parameter WHERE nama_parameter='harga')");
		return $hasil->result();
	}

	function m_fetch_linguistik2(){
		$hasil = $this->db->query("SELECT id_dk, nama_dk
									FROM derajat 
									WHERE id_parameter = (SELECT id_parameter FROM parameter WHERE nama_parameter='brand')");
		return $hasil->result();
	}

	function m_fetch_linguistik3(){
		$hasil = $this->db->query("SELECT id_dk, nama_dk
									FROM derajat 
									WHERE id_parameter = (SELECT id_parameter FROM parameter WHERE nama_parameter='tahun')");
		return $hasil->result();
	}

	function m_fetch_linguistik4(){
		$hasil = $this->db->query("SELECT id_dk, nama_dk
									FROM derajat 
									WHERE id_parameter = (SELECT id_parameter FROM parameter WHERE nama_parameter='ukuran')");
		return $hasil->result();
	}

	function m_fetch_linguistik5(){
		$hasil = $this->db->query("SELECT id_dk, nama_dk
									FROM derajat 
									WHERE id_parameter IN (SELECT id_parameter FROM parameter WHERE keterangan='2')");
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

	function m_tambah_rules($id_defuzzy){
		$hasil = $this->db->query("INSERT INTO rules(id_defuzzy) VALUES ('$id_defuzzy')");		
		$hasil = array('hasil' => $hasil, 'last_id' => $this->db->insert_id());
		return $hasil;
	}


	function m_tambah_detail_rules($id_rules, $id_fuzzy){
		$hasil = $this->db->query("INSERT INTO detail_rules(id_rules, id_fuzzy) VALUES ('$id_rules','$id_fuzzy')");
		return $hasil;
	}

	function m_hapus_rules($id_rules){
		$hasil = $this->db->query("DELETE FROM rules WHERE id_rules = '$id_rules' ");				
		return $hasil;
	}

	function m_hapus_detail_rules($id_rules){
		$hasil = $this->db->query("DELETE FROM detail_rules WHERE id_rules = '$id_rules'");				
		return $hasil;
	}

	// ===================== END RULES ================================


	// ===================== REKOMENDASI ==============================	

	// ===================== END REKOMENDASI ==========================
	
}