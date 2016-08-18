<h3>Tambah data kategori</h3>
<?php 
	print form_open('kategori/post');
?>
<table class="table table-bordered">
	<tr>
		<td width="130">Nama Kategori</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="kategori" placeholder="kategori" class="form-control">
		</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan</button>
			<?php print anchor('kategori','Kembali',array('class'=> 'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>