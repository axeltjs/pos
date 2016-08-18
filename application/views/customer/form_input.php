<h3>Tambah data Customer</h3>
<?php 
	print form_open('customer/post');
?>
<table class="table table-bordered">
	<tr>
		<td width="130">Nama Customer</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="nama" placeholder="Nama Customer" class="form-control">
		</div>
		</td>
	</tr>
	<tr>
		<td width="130">Alamat Customer</td>
		<td>
			<div class="col-sm-4">
			<textarea class="form-control" name="alamat"></textarea>
		</div>
		</td>
	</tr>
	<tr>
		<td width="130">Telepon</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="telpon" placeholder="Telepon Customer" class="form-control">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan</button>
			<?php print anchor('customer','Kembali',array('class'=> 'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>