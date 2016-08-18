<h3>Kategori barang</h3>
<?php
	print anchor('kategori/post','Tambah Data', array('class'=>'btn btn-success btn-sm'));
?>
</br>
<hr>
<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Nama Kategori</th>
		<th colspan="2">Operasi</th>
	</tr>
	
<?php
$no = 1+$this->uri->segment(3);
	foreach ($record->result() as $r) 
	{
		print "<tr>
		<td width='10'>$no</td>
		<td>$r->nama_kategori</td>
		<td width='10'>".anchor('kategori/edit/'.$r->kategori_id,'Edit',array('class'=> 'btn btn-primary btn-sm'))."</td>
		<td width='10'>".anchor('kategori/delete/'.$r->kategori_id,'Delete',array('class'=> 'btn btn-danger btn-sm'))."</td>
		</tr>";
		$no++;			
	}
?>
	

</table>
<?php 
echo $paging;
?>