<?php

/**
* 
*/
class penjualan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		cek_session();
		$this->load->model(array('model_customer', 'model_barang', 'model_penjualan'));
	}

	function index(){
		$data['barang'] = $this->model_barang->tampil_data();
		$data['customer'] = $this->model_customer->tampilkan_data();
		$this->template->load('template','penjualan/form', $data);
	}

	function post(){
		$this->model_penjualan->post_temp();
	}

	function selesai(){
		$customer = $_GET['customer'];
		$customer_id = $this->model_penjualan->get_id_by_name($customer)->row_array();
		$transaksi_id = $this->model_penjualan->selesai($customer_id['customer_id']);
		$this->model_penjualan->update_status($transaksi_id);
	}

	function hapus_temp(){
		$id=$_GET['id'];
		$this->model_penjualan->hapus_temp($id);
	}

	function tampilkan(){
		echo "<table class='table table-bordered'>
		<tr>
			<th>No.</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>QTY</th>
			<th>Sub Total</th>
			<th>Operasi</th>
		</tr>";
		$no=1;
		$data = $this->model_penjualan->transaksi_temp()->result();
		foreach ($data as $d){
			echo "<tr>
				<td>$no</td>
				<td>$d->kode_barang</td>
				<td>$d->nama_barang</td>
				<td>$d->harga_jual</td>
				<td>$d->qty</td>
				<td>".$d->harga_jual * $d->qty."</td>
				<td><button class='btn btn-danger btn-sm' onClick='hapus($d->detail_id)'>Hapus</button></td>
			</tr>";
		$no++;
		}
		echo "</table> ";
	}
}
