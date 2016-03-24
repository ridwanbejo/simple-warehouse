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