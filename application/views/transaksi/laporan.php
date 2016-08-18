<h3>Laporan Transaksi</h3>
<?php print form_open('transaksi/laporan'); ?>
<table class="table table-bordered">
	<tr>
		<td>
		<div class="col-sm-2">
		<input type="date" name="tanggal1" Class="form-control" required>
		</div>
		<div class="col-sm-2">
		<input type="date" name="tanggal2" Class="form-control"  required> 
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button type="submit" name="submit" Class="btn btn-primary btn-sm">Proses</button></td>
	</tr>
</table>
</form>
<hr>
<table class="table table-bordered">
	<tr class="success">
		<th>No</th>
		<th>Tanggal Transaksi</th>
		<th>Operator</th>
		<th>Total Transaksi</th>
	</tr>
	<?php
	$no=1;
	$total=0;
		foreach($record->result() as $r)
		{
			print 	"<tr>
					<td width='10'>$no</td>
					<td width='160'>".tgl_indo("$r->tanggal_transaksi")."</td>
					<td>$r->nama</td>
					<td>$r->total</td>
					</tr>";
	$no++;
	$total=$total+$r->total;
	}
	?>
	<tr>
		<td colspan="3">Total</td>
		<td><?php print $total; ?></td>
	</tr>
</table>
