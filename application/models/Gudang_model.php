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

	public function set_mutasi_barang($data)
	{
		$id = $this->db->insert('mutasi_barang', $data);
		return $id;
	}
}

?>