<?php

	class transaksi extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model(array('model_barang','model_transaksi'));
			cek_session();
		}

		function index()
		{
			if(isset($_POST['submit']))
			{
				$this->model_transaksi->simpan_barang();
				redirect('transaksi');
			}else{
				$data['barang'] = $this->model_barang->tampil_data();
				$data['detail'] = $this->model_transaksi->tampilkan_detail_transaksi();
				$this->template->load('template','transaksi/form_transaksi',$data);	
			}
		}

		function hapusitem()
		{
			$id = $this->uri->segment(3);
			$this->model_transaksi->hapusitem($id);
			redirect ('transaksi');
		}

		function selesai_belanja()
		{
			$tanggal=date('Y-m-d');
			$user = $this->session->userdata('username');
			$id_op = $this->db->get_where('petugas',array('username'=>$user))->row_array();
			$data=array('op_id'=> $id_op['op_id'],'tanggal_transaksi' => $tanggal);
			$this->model_transaksi->selesai_belanja($data);
			redirect('transaksi');
		}

		function laporan()
		{
			if (isset($_POST['submit']))
			{
				$tanggal1=$this->input->post('tanggal1');
				$tanggal2=$this->input->post('tanggal2');
				$data['record']=$this->model_transaksi->laporan_periode($tanggal1,$tanggal2);
				$this->template->load('template','transaksi/laporan',$data);
			}else{
				$data['record']=$this->model_transaksi->laporan_default();
				$this->template->load('template','transaksi/laporan',$data);	
			}	

		}

		function excel()
		{
			header("Content-type=application/vhd.ms-excel");
			header("Content-disposition:attachment;filename=laporantransaksi.xls");
			$data['record']=$this->model_transaksi->laporan_default();
			$this->load->view('transaksi/laporan_excel',$data);
		}

		function pdf()
		{
			$this->load->library('cfpdf');
			$pdf=new FPDF('P','mm','A4');
			//tampilkan header
			$pdf->AddPage();
			$pdf->SetFont('Arial','B','L');
			$pdf->SetFontSize(14);
			$pdf->text(10,10,'LAPORAN TRANSAKSI');
			$pdf->SetFont('Arial','B','L');
			$pdf->SetFontSize(10);
			$pdf->cell(10, 10,'','',1);
			$pdf->Cell(10 ,7 ,'No', 1, 0);
			$pdf->Cell(27 ,7 ,'Tanggal', 1, 0); 
			$pdf->Cell(30 ,7 ,'Operator', 1, 0);
			$pdf->Cell(38 ,7 ,'Total Transaksi', 1, 1);
			//tampilkan data a.k.a Body
			$data= $this->model_transaksi->laporan_default();
			$no=1;
			$total=0;
			foreach ($data->result() as $r)
			{
				$pdf->SetFont('Arial','','L');
				$pdf->Cell(10 ,7 ,$no, 1, 0);
				$pdf->Cell(27 ,7 ,$r->tanggal_transaksi, 1, 0); 
				$pdf->Cell(30 ,7 ,$r->nama, 1, 0);
				$pdf->Cell(38 ,7 ,$r->total, 1, 1);
				$no++;
				$total=$total+$r->total;
			}
			$pdf->cell(67,7,'Total',1,0,'R');
			$pdf->cell(38,7,$total,1,0);
			$pdf->Output();
		}
	}