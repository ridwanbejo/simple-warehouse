<?php

class Gudang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_gudang()
	{
		$query = $this->db->query(' SELECT mg.* FROM master_gudang mg');
		return $query->result();	
	}

	public function get_gudang_by_id($id)
	{
		$query = $this->db->query(' SELECT mg.* FROM master_gudang mg WHERE Kode_Gudang="'.$id.'"');
		return $query->row();	
	}

	public function set_mutasi_barang($data)
	{
		$id = $this->db->insert('mutasi_barang', $data);
		return $id;
	}

	public function get_history_mutasi($kode_gudang)
	{
		$query = $this->db->query(" SELECT 
									    mb2.*, mj.Nama_Jenis, mt.jenis_mutasi, mt.jumlah_barang, mt.Created_Date
									FROM
										master_barang mb2
										LEFT JOIN master_jenis mj on mj.Kode_Jenis = mb2.master_jenis_Kode_Jenis
										LEFT JOIN mutasi_barang mt on mt.master_barang_Kode_Barang = mb2.Kode_Barang
										LEFT JOIN master_gudang mg on mg.Kode_Gudang = mt.master_gudang_Kode_Gudang
									WHERE mt.master_gudang_Kode_Gudang = '".$kode_gudang."' 
									ORDER BY mt.Created_Date DESC ");
		return $query->result();
	}
}

?>