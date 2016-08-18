<h3>Data Barang</h3>

<?php
	print anchor('barang/post','Tambah Data',  array('class'=>'btn btn-success btn-sm'));
?>
<hr>
<table class="table table-bordered">

<tr>
	<th>No</th>
	<th>Kode Barang</th>
	<th>Nama Barang</th>
	<th>Kategori Barang</th>
	<th>Harga</th>
	<th colspan="2">Operasi</th>
</tr>
<?php
$no=1+$this->uri->segment(3);
	foreach ($record as $r)
	{
		print "<tr>
		<td width='10'>$no</td>
		<td width='120'>$r->kode_barang</td>
		<td>$r->nama_barang</td>
		<td>$r->nama_kategori</td>
		<td>$r->harga</td>
		<td width='20'>".anchor('barang/edit/'.$r->barang_id,'Edit',array('class'=> 'btn btn-primary btn-sm'))."</td>
		<td width='20'>".anchor('barang/delete/'.$r->barang_id,'Delete',array('class'=> 'btn btn-danger btn-sm'))."</td>
		</tr>";
	$no++;
	}
	
?>

</table>

<?php 
echo $paging;
?>