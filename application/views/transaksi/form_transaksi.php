<h3>Form Transaksi</h3>
<?php
print form_open('transaksi');
?>
<table class="table table-bordered">
<tr class="success">
	<th>Form</th>
</tr>
<tr>
	<td>
		<div class="col-sm-6">
		<input list="barang" name="barang" placeholder="Masukan Nama Barang" Class="form-control" autocomplete="off" required>
		</div>
		<div class="col-sm-1">
		<input type="text" name="qty" placeholder="QTY" Class="form-control">
		</div>
	</td>
</tr>
<tr>
	<td> <button type="submit" name="submit" Class="btn btn-default">Simpan</button>
		<?php print anchor('transaksi/selesai_belanja','Selesai',array('class'=>'btn btn-primary')); ?>
	</td>
</tr>
</table>
</form>

<table class="table table-bordered">
	<tr class="success">
		<th colspan="6">Detail Transaksi</th>
	</tr>
	<tr>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Quanty</th>
		<th>Harga</th>
		<th>Sub Total</th>
		<th>Cancel</th>
	</tr>
	<?php 
	$no=1;
	$total=0;
		foreach ($detail->result() as $d) {
			print "<tr>
			<td>$no</td>
			<td>$d->nama_barang</td>
			<td>$d->qty</td>
			<td>$d->harga</td>
			<td>".$d->qty*$d->harga."</td>
			<td>".anchor('transaksi/hapusitem/'.$d->t_detail_id,'Hapus',array('class'=>'btn btn-danger btn-sm'))."</td>
			</tr>";
		$total=$total+($d->qty*$d->harga);
		$no++;
		}

	?>
	<tr>
		<td Colspan="5"><p align="right">Total</p></td>
		<td><? print $total; ?></td>
	</tr>
</table>

<datalist id="barang">
	<?php
	foreach ($barang->result() as $b) {
		print "<option value='$b->nama_barang'></option>";
	}
	?>
	
</datalist>