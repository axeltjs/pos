<body onload="load_data_temp()"></body>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	function load_data_temp()
	{
		$.ajax({
			type:"GET",
			url:"pembelian/load_temp",
			data:"",
			success:function(html){
				$("#list").html(html)
			}
		});
	}

	function add_barang()
	{
		var barang=$("#idbarang").val();
		var qty=$("#idqty").val();
		var harga=$("#idharga").val();
		if(barang == '' || qty == '')
		{
			alert('harap lengkapi form barang terlebih dahulu!');
			die;
		}else{
			$.ajax({
				type:"GET",
				url:"pembelian/input_ajax",
				data:"barang="+barang+"&qty="+qty+"&harga="+harga,
				success:function(html){
					load_data_temp();
				}
			});
		}
	}

	function hapus(id)
	{
		$.ajax({
			type:"GET",
			url:"pembelian/hapus_temp",
			data:"id="+id,
			success:function(html){
				$("#dataku"+id).hide(2000);
			}
		});
	}

	function selesai()
	{
		var supplier=$("#idsupplier").val();
		if(supplier == '')
		{
			alert('Harap isi Supplier terlebih dahulu!');
			die;
		}else{

			$.ajax({
			type:"GET",
			url:"pembelian/checkout",
			data:"supplier="+supplier,
			success:function(html){
				alert('transaksi berhasil!');
				load_data_temp();
			}
		
		});	
		}
	}
</script>

<h3>Form Transaksi Pembelian</h3>
<?php 
echo form_open('transaksi');
?>
<table class="table table-bordered">
	<tr>
		<td>Supplier</td>
		<td><div class="col-sm-8">
				<input type="text" list="supplier" id="idsupplier" placeholder="Supplier" autocomplete="off" class="form-control">
			</div>
		</td>
	</tr>
	<tr>
		<td>Barang</td>
		<td><div class="col-sm-4">
				<input list="barang" type="text" name="nama_barang" id="idbarang" placeholder="Nama Barang" autocomplete="off" class="form-control">
			</div>
			<div class="col-sm-1">
				<input type="text" name="qty" id="idqty" placeholder="QTY" class="form-control">
			</div>
			<div class="col-sm-3">
				<input type="text" name="harga" id="idharga" placeholder="Harga" class="form-control">
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="3"><button class="btn btn-primary btn-sm" type="button" onclick="selesai()" name="submit">Simpan</button>
			<button class="btn btn-success btn-sm" type="button" onclick="add_barang()" name="add">Add Barang</button>
		</td>
	</tr>
</table>
</form>
<div id="list">
	
</div>

<datalist id="barang">
	<?php
	foreach ($barang->result() as $b) {
		echo "<option value='$b->nama_barang'></option>";
	}
	?>
	
</datalist>

<datalist id="supplier">
	<?php
	foreach ($supplier->result() as $s) {
		echo "<option value='$s->nama_supplier'></option>";
	}
	?>
	
</datalist>

