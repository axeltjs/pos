<?php
/**
* 
*/
class pembelian extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		cek_session();
		$this->load->model(array('model_barang','model_supplier','model_transaksi_beli'));
	}

	function index()
	{
		$data['barang']		= $this->model_barang->tampil_data();
		$data['supplier'] 	= $this->model_supplier->tampilkan_data();
		$this->template->load('template','pembelian/form',$data);
	}

	function input_ajax()
	{
		$this->model_transaksi_beli->insert_temp();
	}
	
	function load_temp()
	{
		echo "<table class='table table-bordered'>
		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>QTY</th>
			<th>Harga Beli</th>
			<th>Sub Total</th>
			<th>Operasi</th>
		</tr>";
		$no=1;
		$data= $this->model_transaksi_beli->tampilkan_temp()->result();
		foreach ($data as $d)
		{
			echo "<tr id='dataku$d->belidetail_id'>
					<td>$no</td>
					<td>$d->kode_barang</td>
					<td>$d->nama_barang</td>
					<td>$d->qty</td>
					<td>$d->harga</td>
					<td>".($d->qty*$d->harga)."</td>
					<td><button class='btn btn-danger btn-sm' onClick='hapus($d->belidetail_id)'>Hapus</button></td>
				</tr>";
				$no++;
		}
		echo "</table>";
	}

	function hapus_temp()
	{
		$id = $_GET['id'];
		$this->model_transaksi_beli->hapus_temp($id);
	}

	function checkout()
	{
		$id = $this->model_transaksi_beli->checkout();
		$this->model_transaksi_beli->ubah_status($id);
	}
}