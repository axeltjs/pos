<h3>Tambah data Supplier</h3>
<?php 
	print form_open('supplier/post');
?>
<table class="table table-bordered">
	<tr>
		<td width="130">Nama Supplier</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="nama" placeholder="Nama Supplier" class="form-control">
		</div>
		</td>
	</tr>
	<tr>
		<td width="130">Alamat Supplier</td>
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
			<input type="text" name="telpon" placeholder="Telepon Supplier" class="form-control">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan</button>
			<?php print anchor('supplier','Kembali',array('class'=> 'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>