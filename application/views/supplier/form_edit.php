<h3>Edit Data Supplier</h3>
<?php 
	print form_open('supplier/edit/');
?>
<input type="hidden" name="id" value="<?php print $record['supplier_id'];?>">
<table class="table table-bordered">
	<tr>
		<td width="130">Nama Supplier</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="nama" class="form-control" placeholder="Nama Customer" value="<?php print $record['nama_supplier']; ?>">
			</div>
		</td>
	</tr>
	<tr>
		<td width="130">Alamat Supplier</td>
		<td>
			<div class="col-sm-4">
			<textarea class="form-control" name="alamat"><?php echo $record['alamat'] ?></textarea>
		</div>
		</td>
	</tr>
	<tr>
		<td width="130">Telepon</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="telpon" placeholder="Telepon Customer" value="<?php echo $record['telpon_supplier'] ?>" class="form-control">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
			<?php print anchor('supplier','Kembali',array('class'=>'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>