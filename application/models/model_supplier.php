<?php
	class model_supplier extends CI_Model {

		function tampilkan_data()
		{
			return $this->db->get('supplier');
		}

		function tampilkan_data_paging($halaman)
		{
			return $this->db->query("SELECT * FROM supplier LIMIT $halaman ,4");			
		}


		function post()
		{
			$data=array('kode_supplier'		=> kodesupplier(),
						'nama_supplier' 	=> $this->input->post('nama'),
						'alamat' 			=> $this->input->post('alamat'),
						'telpon_supplier' 	=> $this->input->post('telpon'));
			$this->db->insert('supplier',$data);
		}

		function edit()
		{
			$data=array('nama_supplier' 	=> $this->input->post('nama'),
						'alamat' 			=> $this->input->post('alamat'),
						'telpon_supplier' 	=> $this->input->post('telpon'));	
			$this->db->where('supplier_id',$this->input->post('id'));
			$this->db->update('supplier',$data);			
		}

		function get_one($id)
		{
			$param= array('supplier_id' => $id);
			return $this->db->get_Where('supplier',$param);
		}


		function delete($id)
		{
			$this->db->where('supplier_id',$id);
			$this->db->delete('supplier');
		}
	}
?>