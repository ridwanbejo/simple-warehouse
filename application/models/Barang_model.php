<?php

class Barang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_barang()
	{
		$query = $this->db->query(' SELECT mb.*, mj.Nama_Jenis FROM master_barang mb LEFT JOIN master_jenis mj on mb.master_jenis_Kode_Jenis = mj.Kode_Jenis ORDER BY mb.Created_Date');
		return $query->result();	
	}

	public function get_barang_at_gudang($kode_gudang)
	{
		$query = $this->db->query("SELECT 
									    mb2.*, mj.Nama_Jenis, (SELECT 
									    IF(sum(mt.jumlah_barang) IS NULL, 0, sum(mt.jumlah_barang))
									FROM
									    mutasi_barang mt
											LEFT JOIN
										master_gudang mg on mg.Kode_Gudang = mt.master_gudang_Kode_Gudang
									WHERE mg.Kode_Gudang = '".$kode_gudang."' and mt.jenis_mutasi = 'debit' and mt.master_barang_Kode_Barang = mb2.Kode_Barang) - (SELECT 
									    IF(sum(mt.jumlah_barang) IS NULL, 0, sum(mt.jumlah_barang))
									FROM
									    mutasi_barang mt
											LEFT JOIN
										master_gudang mg on mg.Kode_Gudang = mt.master_gudang_Kode_Gudang
									WHERE mg.Kode_Gudang = '".$kode_gudang."' and mt.jenis_mutasi = 'kredit' and mt.master_barang_Kode_Barang = mb2.Kode_Barang)  as stok
									FROM
										master_barang mb2
										LEFT JOIN master_jenis mj on mj.Kode_Jenis = mb2.master_jenis_Kode_Jenis
										LEFT JOIN mutasi_barang mt on mt.master_barang_Kode_Barang = mb2.Kode_Barang
										LEFT JOIN master_gudang mg on mg.Kode_Gudang = mt.master_gudang_Kode_Gudang
									WHERE mt.master_gudang_Kode_Gudang = '".$kode_gudang."' 
									GROUP BY mb2.Kode_Barang 
									ORDER BY mb2.Created_Date");
		return $query->result();	
	}
	
	public function set_barang($data)
	{
		$id = $this->db->insert('master_barang', $data);
		return $id;
	}

	public function update_barang($data, $kode)
	{
		$this->db->where("Kode_Barang", $kode);
		$this->db->update('master_barang', $data);
		return TRUE;
	}

	public function get_jenis_barang()
	{
		$query = $this->db->query(' SELECT * FROM master_jenis mj ');
		return $query->result();	
	}

	public function get_barang_by_id($kode_barang)
	{
		$query = $this->db->query(' SELECT mb.* FROM master_barang mb WHERE Kode_Barang = "'.$kode_barang.'" ');
		return $query->row();	
	
	}
}

?>