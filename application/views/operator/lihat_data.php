<h3>Operator</h3>
<?php
	echo anchor('operator/post','Tambah Data', array('class'=>'btn btn-success btn-sm'));
?>
<hr>
<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Nama Lengkap</th>
		<th>Username</th>
		<th>Email</th>
		<th>Last Login</th>
		<th align="center">Operasi</th>
	</tr>
	
<?php
$no = 1;
	foreach ($record->result() as $r) 
	{
		print "<tr>
		<td width='10'>$no</td>
		<td>$r->nama</td>
		<td>$r->username</td>
		<td>$r->email</td>
		<td>$r->last_login</td>
		<td width='20'>".anchor('operator/edit/'.$r->op_id,'Edit',array('class'=> 'btn btn-primary btn-sm'))."</td>
		</tr>";
		$no++;			
	}
?>
	

</table>
