<?php

	function tanggal()
	{
		return date('Y-m-d');
	}

	function tgl_indo($tanggals)
	{
		//2015-06-26
		$tanggal = substr($tanggals, 8, 2);
		$bulan = substr($tanggals, 5, 2);
		$tahun = substr($tanggals, 0, 4);

		return $tanggal."-".bulan($bulan)."-".$tahun;
	}

	function bulan($bulan)
	{
		switch ($bulan) {
			case 1:
				return 'Januari';
			break;
			case 2:
				return 'Februari';
			break;
			case 3:
				return 'Maret';
			break;
			case 4:
				return 'April';
			break;
			case 5:
				return 'Mei';
			break;
			case 6:
				return 'Juni';
			break;
			case 7:
				return 'Juli';
			break;
			case 8:
				return 'Agustus';
			break;
			case 9:
				return 'September';
			break;
			case 10:
				return 'Oktober';
			break;
			case 11:
				return 'November';
			break;
			case 12:
				return 'Desember';
			break;
		}
	}

	function kodebarang()
	{
		//BR001
		$CI = & get_instance();
		$check = $CI->db->query("SELECT kode_barang FROM barang ORDER BY barang_id DESC");

		if ($check->num_rows()>0)
		{
		$check = $check->row_array();
		$lastCode = $check['kode_barang'];
		$ambil = substr($lastCode, 2, 3)+1;
		$newCode = "BR".sprintf("%03s", $ambil);
		return $newCode;
		
		}else{
			return "BR001";
		}
	}

	function kodecustomer()
	{
	
		$CI = & get_instance();
		$check = $CI->db->query("SELECT kode_customer FROM customer ORDER BY customer_id DESC");

		if ($check->num_rows()>0)
		{
		$check = $check->row_array();
		$lastCode = $check['kode_customer'];
		$ambil = substr($lastCode, 2, 3)+1;
		$newCode = "CS".sprintf("%03s", $ambil);
		return $newCode;
		
		}else{
			return "CS001";
		}
	}

	function kodesupplier()
	{
	
		$CI = & get_instance();
		$check = $CI->db->query("SELECT kode_supplier FROM supplier ORDER BY supplier_id DESC");

		if ($check->num_rows()>0)
		{
		$check = $check->row_array();
		$lastCode = $check['kode_supplier'];
		$ambil = substr($lastCode, 2, 3)+1;
		$newCode = "SP".sprintf("%03s", $ambil);
		return $newCode;
		
		}else{
			return "SP001";
		}
	}
	
	function check_stok($barang_id){
		$CI = & get_instance();
		$qb = "SELECT sum(qty) AS jumlah_beli FROM transaksi_beli_detail WHERE barang_id = '$barang_id'";
		$qj = "SELECT sum(qty) AS jumlah_jual FROM transaksi_jual_detail WHERE barang_id = '$barang_id'";
		$beli = $CI->db->query($qb)->row_array();
		$jual = $CI->db->query($qj)->row_array();
		return $beli['jumlah_beli']-$jual['jumlah_jual'];
	}