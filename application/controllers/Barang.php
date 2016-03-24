<?php

class Barang extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('gudang_model');
	}

	public function ajax_jenis_barang()
	{
		$jenis_barang = $this->barang_model->get_jenis_barang();
		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($jenis_barang);
	}

	public function ajax_add_barang()
	{
		$data = array (
				'Kode_Barang' => $this->input->post('kode_barang'),
				'Nama_Barang' => $this->input->post('nama_barang'),
				'master_jenis_Kode_Jenis' => $this->input->post('jenis_barang'),
				'No_Part' => $this->input->post('no_part'),
				'Created_Date' => date('Y-m-d'),
			);

		$new_id = $this->barang_model->set_barang($data);
		
		if ($new_id)
		{
			$ajax_data = array ('status' => 200, 'message'=>'tambah barang berhasil...', 'data'=>$data);
		}
		else
		{
			$ajax_data = array ('status' => 500, 'message'=>'tambah barang gagal...');
		}

		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($ajax_data);
	}

	public function ajax_edit_barang()
	{
		$data = array (
				'Nama_Barang' => $this->input->post('nama_barang'),
				'No_Part' => $this->input->post('no_part'),
				'Created_Date' => date('Y-m-d'),
			);

		$updated = $this->barang_model->update_barang($data, $this->input->post('kode_barang'));
		
		if ($updated)
		{
			$data['Kode_Barang'] = $this->input->post('kode_barang');
			$ajax_data = array ('status' => 200, 'message'=>'update barang berhasil...', 'data'=>$data);
		}
		else
		{
			$ajax_data = array ('status' => 500, 'message'=>'update barang gagal...');
		}

		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($ajax_data);
	}

	public function ajax_get_barang()
	{
		$barang = $this->barang_model->get_barang_by_id($this->input->post('kode_barang'));
		if (count($barang))
		{
			$ajax_data = array ('status'=>200, 'message'=>'ambil barang berhasil...', 'data'=>$barang);
		}
		else
		{
			$ajax_data = array ('status'=>500, 'message'=>'ambil barang gagal...');
		}
				
		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($ajax_data);
	}

	public function ajax_get_barang_select()
	{
		$barang = $this->barang_model->get_barang();
		if (count($barang))
		{
			$ajax_data = array ('status'=>200, 'message'=>'ambil barang berhasil...', 'data'=>$barang);
		}
		else
		{
			$ajax_data = array ('status'=>500, 'message'=>'ambil barang gagal...');
		}
				
		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($ajax_data);
	}

	public function ajax_get_gudang()
	{
		$gudang = $this->gudang_model->get_gudang();
		if (count($gudang))
		{
			$ajax_data = array ('status'=>200, 'message'=>'ambil gudang berhasil...', 'data'=>$gudang);
		}
		else
		{
			$ajax_data = array ('status'=>500, 'message'=>'ambil gudang gagal...');
		}
				
		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($ajax_data);
	}

	public function ajax_delete_barang()
	{
		$this->db->where('Kode_Barang', $this->input->post('kode_barang'));
		$deleted = $this->db->delete('master_barang');

		$ajax_data = array ('status' => 200, 'message'=>'delete barang berhasil...');
		
		header('Content-Type: application/json; charset=UTF-8');
		echo json_encode($ajax_data);
	}
}