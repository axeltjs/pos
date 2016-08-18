<body onload="tampilkan()"></body>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	function tampilkan(){
		$.ajax({
			type: "GET",
			url: "penjualan/tampilkan",
			data:'',
			success:function(html){
				$("#list_transaksi").html(html)
				}
		});
	}

	function selesai(){
		var customers = $("#customers").val();
		if(customers == ''){
			alert('harap isi customer terlebih dahulu!');
			die();
		}else{
		$.ajax({
			type: "GET",
			url: "penjualan/selesai",
			data: "customer="+customers,
			success:function(html){
				alert('Penjualan Berhasil!');
				tampilkan();
			}
		});
		}
	}

	function hapus(id) {
		$.ajax({
			type: "GET",
			url: "penjualan/hapus_temp",
			data: "id="+id,
			success:function(html){
				tampilkan();
			}
		});
	}	

	function addBarang () {
		var barang = $("#barangid").val();
		var qty = $("#qty").val();
		if(barang == '' || qty == ''){
			alert('harap isi barang dan qty terlebih dahulu!');
			die();
		}else{
		$.ajax({
			type: "GET",
			url: "penjualan/post",
			data: "barang=" + barang + "&qty=" + qty,
			success:function(html){
				tampilkan();
			}
		});
	}
}

</script>

<h3>Form Penjualan</h3>

<table class="table table-bordered">
	<tr>
		<td width="100">Customer</td>
		<td>
		<div class="col-sm-10">
		<input list="customer" placeholder="Masukan Nama Customer" id="customers" class="form-control">
		</div>
	</td>
	</tr>
	<tr>
		<td>Barang</td>
		<td>
			<div class="col-sm-7">
			<input list="barang" id="barangid" placeholder="Masukan Nama Barang" class="form-control">
			</div>
			<div class="col-sm-3">
			<input id="qty" placeholder="QTY" type="text" class="form-control">
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<button class="btn btn-primary btn-sm" onclick="selesai()" id="selesai">Selesai</button>
			<button class="btn btn-success btn-sm" onclick="addBarang()" id="add">Add Barang</button>
		</td>
	</tr>
</table>

<div id="list_transaksi">

</div>

<datalist id="customer">
	<?php
		foreach($customer->result() as $c){
			echo "<option value='$c->nama_customer'>";
		}
	 ?>
</datalist>

<datalist id="barang">
	<?php
	foreach ($barang->result() as $b) {
		echo "<option value='$b->nama_barang'></option>";
	}
	?>
	
</datalist>