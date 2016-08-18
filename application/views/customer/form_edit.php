<h3>Edit Data Customer</h3>
<?php 
	print form_open('customer/edit/');
?>
<input type="hidden" name="id" value="<?php print $record['customer_id'];?>">
<table class="table table-bordered">
	<tr>
		<td width="130">Nama Customer</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="nama" class="form-control" placeholder="Nama Customer" value="<?php print $record['nama_customer']; ?>">
			</div>
		</td>
	</tr>
	<tr>
		<td width="130">Alamat Customer</td>
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
			<input type="text" name="telpon" placeholder="Telepon Customer" value="<?php echo $record['telpon_customer'] ?>" class="form-control">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
			<?php print anchor('customer','Kembali',array('class'=>'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>