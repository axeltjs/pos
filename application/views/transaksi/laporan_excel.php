<table border="1">
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
					<td width='160'>$r->tanggal_transaksi</td>
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
