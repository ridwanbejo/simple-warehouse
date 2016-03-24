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

	public function detail ()
	{
		$this->load->view('warehouse/detail');
	}

	public function gudang()
	{
		$daftar_gudang = $this->gudang_model->get_gudang();
		$content = $this->load->view('warehouse/gudang', array('daftar_gudang'=>$daftar_gudang), true);
		$script = $this->load->view('warehouse/gudang_js', '', true);
		$this->load->view('layout', array('content'=>$content, 'script'=>$script));
	}

	public function history()
	{
		$this->load->view('warehouse/history');
	}
}