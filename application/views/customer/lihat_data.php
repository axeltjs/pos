<h3>Data Customer</h3>
<?php
	print anchor('customer/post','Tambah Data', array('class'=>'btn btn-success btn-sm'));
?>
</br>
<hr>
<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Kode Customer</th>
		<th>Nama Customer</th>
		<th>Alamat Customer</th>
		<th>Telepon Customer</th>
		<th colspan="2">Operasi</th>
	</tr>
	
<?php
$no = 1+$this->uri->segment(3);
	foreach ($record->result() as $r) 
	{
		print "<tr>
		<td width='10'>$no</td>
		<td width='120'>$r->kode_customer</td>
		<td>$r->nama_customer</td>
		<td>$r->alamat</td>
		<td>$r->telpon_customer</td>
		<td width='10'>".anchor('customer/edit/'.$r->customer_id,'Edit',array('class'=> 'btn btn-primary btn-sm'))."</td>
		<td width='10'>".anchor('customer/delete/'.$r->customer_id,'Delete',array('class'=> 'btn btn-danger btn-sm'))."</td>
		</tr>";
		$no++;			
	}
?>
	

</table>
<?php 
echo $paging;
?>