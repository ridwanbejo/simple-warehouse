<?php

class Mutasi extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('gudang_model');
	}

	public function ajax_add_mutasi()
	{
		$data = array (
				'jumlah_barang' => $this->input->post('kuantitas'),
				'jenis_mutasi' => $this->input->post('jenis_mutasi'),
				'master_barang_Kode_Barang' => $this->input->post('kode_barang'),
				'master_gudang_Kode_Gudang' => $this->input->post('kode_gudang'),
				'keterangan' => $this->input->post('keterangan'),
			);

		$new_id = $this->gudang_model->set_mutasi_barang($data);
		
		if ($new_id)
		{
			$ajax_data = array ('status' => 200, 'message'=>'tambah mutasi berhasil...', 'data'=>$data);
		}
		else
		{
			$ajax_data = array ('status' => 500, 'message'=>'tambah mutasi gagal...');
		}

		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($ajax_data);
	}
}