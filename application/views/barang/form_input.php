<h3>Tambah Data Barang</h3>
<?php 
	print form_open('barang/post');
?>
<table class="table table-bordered">
	<tr>
		<td width="120">Nama Barang</td>
		<td>
			<div class="col-sm-4">
		<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
		</div>
		</td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>
			<div class="col-sm-4">
			<select name="kategori" class="form-control">
			<?php
				foreach ($kategori as $k ) 
				{
					print "<option value='$k->kategori_id'>$k->nama_kategori</option>";
				}
			?>
		</select>
	</div>
	</td>
	</tr>
	<tr>
		<td>Harga Barang</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="harga" class="form-control" placeholder="Harga">
		</div>
		</td>
	</tr>
	
	<tr>
		<td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
			<?php print anchor('barang','Kembali',array('class'=>'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>