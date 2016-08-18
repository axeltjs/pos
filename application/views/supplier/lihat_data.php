<h3>Data Supplier</h3>
<?php
	print anchor('supplier/post','Tambah Data', array('class'=>'btn btn-success btn-sm'));
?>
</br>
<hr>
<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Kode Supplier</th>
		<th>Nama Supplier</th>
		<th>Alamat Supplier</th>
		<th>Telepon Supplier</th>
		<th colspan="2">Operasi</th>
	</tr>
	
<?php
$no = 1+$this->uri->segment(3);
	foreach ($record->result() as $r) 
	{
		print "<tr>
		<td width='10'>$no</td>
		<td width='120'>$r->kode_supplier</td>
		<td>$r->nama_supplier</td>
		<td>$r->alamat</td>
		<td>$r->telpon_supplier</td>
		<td width='10'>".anchor('supplier/edit/'.$r->supplier_id,'Edit',array('class'=> 'btn btn-primary btn-sm'))."</td>
		<td width='10'>".anchor('supplier/delete/'.$r->supplier_id,'Delete',array('class'=> 'btn btn-danger btn-sm'))."</td>
		</tr>";
		$no++;			
	}
?>
	

</table>
<?php 
echo $paging;
?>