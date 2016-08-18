<?php

	class model_barang extends CI_Model 
	{

		function tampil_data()
		{
			$query="SELECT b.barang_id, b.kode_barang, b.nama_barang, b.harga, kb.nama_kategori
					FROM barang AS b, kategori_barang AS kb
					WHERE b.kategori_id = kb.kategori_id";

			return $this->db->query($query);
		}

		function tampilkan_data_paging($halaman)
		{
			return $this->db->query("SELECT b.barang_id, b.kode_barang, b.nama_barang, b.harga, kb.nama_kategori
					FROM barang AS b, kategori_barang AS kb
					WHERE b.kategori_id = kb.kategori_id LIMIT $halaman ,4 ");			
		}

		function post($data)
		{
			$this->db->insert('barang',$data);
		}
	
		function get_one($id)
		{
			$param= array('barang_id' => $id);
			return $this->db->get_Where('barang',$param);
		}

		function edit($data,$id)
		{
			$this->db->where('barang_id',$id);
			$this->db->update('barang',$data);
		}

		function delete($id)
		{
			$this->db->where('barang_id',$id);
			$this->db->delete('barang');
		}
	} 

?>