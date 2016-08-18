<h3>Tambah Data Operator</h3>
<?php 
	print form_open('operator/post');
?>

<table class="table table-bordered">
	<tr>
		<td width="120">Nama Lengkap</td>
		<td>
			<div class="col-sm-4">
			<input type="text" class="form-control" name="nama" placeholder="Full Name" required>
			</div>
		</td>
	</tr>
	<tr>
		<td>Username</td>
		<td>
			<div class="col-sm-4">
			<input type="text" class="form-control" name="username" placeholder="Username" required>
			</div>
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>
			<div class="col-sm-4">
			<input type="text" class="form-control" name="email" placeholder="Email" required>
			</div>
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>
			<div class="col-sm-4">
			<input type="password" class="form-control" name="password" placeholder="Password" required>
			</div>
		</td>
	</tr>
	<tr>
		<td>Re-Type Password</td>
		<td>
			<div class="col-sm-4">
			<input type="password" class="form-control" name="password2" placeholder="Re-Type Password" required>
			</div>
		</td>
	</tr>
	<tr>
		<td>Level</td>
		<td>
			<div class="col-sm-4">
			<?php $level = array('penjualan' => 'Penjualan', 'pembelian' => 'Pembelian' ); ?>
			<?php echo form_dropdown('level', $level,'','class="form-control"'); ?>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
			<?php print anchor('operator','Kembali',array('class'=>'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>