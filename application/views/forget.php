<h3>Lupa Password</h3>
<?php 
	print form_open('email');
?>
<table class="table table-bordered">

	<tr>
	<td width="120">Email</td>
		<td>
			<div class="col-sm-4">
			<input type="email" class="form-control" name="email" placeholder="Masukan Email yang terdaftar" required>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button class="btn btn-primary btn-sm" name="submit" type="submit">Kirim</button>
		<?php print anchor('auth/login','Kembali',array('class' => 'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>
