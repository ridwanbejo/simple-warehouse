<?php

class Warehouse extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('gudang_model');
	}

	public function index()
	{
		$daftar_barang = $this->barang_model->get_barang();
		$content = $this->load->view('warehouse/index', array('daftar_barang'=>$daftar_barang), true);
		$script = $this->load->view('warehouse/barang_js', '', true);
		$this->load->view('layout', array('content'=>$content, 'script'=>$script));
	}

	public function detail ($kode_gudang)
	{
		$gudang = $this->gudang_model->get_gudang_by_id($kode_gudang);
		$daftar_barang = $this->barang_model->get_barang_at_gudang($kode_gudang);
		$content = $this->load->view('warehouse/detail', array('daftar_barang'=>$daftar_barang, 'gudang'=>$gudang), true);
		$this->load->view('layout', array('content'=>$content, 'script'=>''));
	}

	public function gudang()
	{
		$daftar_gudang = $this->gudang_model->get_gudang();
		$content = $this->load->view('warehouse/gudang', array('daftar_gudang'=>$daftar_gudang), true);
		$script = $this->load->view('warehouse/gudang_js', '', true);
		$this->load->view('layout', array('content'=>$content, 'script'=>$script));
	}

	public function history($kode_gudang)
	{
		$gudang = $this->gudang_model->get_gudang_by_id($kode_gudang);
		$daftar_barang = $this->gudang_model->get_history_mutasi($kode_gudang);
		$content = $this->load->view('warehouse/history', array('daftar_barang'=>$daftar_barang, 'gudang'=>$gudang), true);
		$this->load->view('layout', array('content'=>$content, 'script'=>''));
	}
}