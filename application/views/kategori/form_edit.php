<h3>Edit Data Kategori</h3>
<?php 
	print form_open('kategori/edit/');
?>
<input type="hidden" name="id" value="<? print $record['kategori_id'];?>">
<table class="table table-bordered">
	<tr>
		<td width="130">Nama Kategori</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="kategori" class="form-control" placeholder="kategori" value="<?php print $record['nama_kategori']; ?>">
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
			<?php print anchor('kategori','Kembali',array('class'=>'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>