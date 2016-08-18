<?php 
/**
* 
*/
class stok extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		cek_session();
		$this->load->model('model_barang');
	}

	function index()
	{
			$data['record']= $this->model_barang->tampil_data();
			$this->template->load('template','stok/lihat_data',$data);
	}

	function word()
	{
		header("Content-type=application/vhd.ms-word");
		header("Content-disposition:attachment;filename=laporanstok.doc");
		$data['record']=$this->model_transaksi->laporan_default();
		$this->load->view('transaksi/laporan_excel',$data);
		$data['record']= $this->model_barang->tampil_data();
		$this->load->view('stok/msword',$data);
	}
}
?>