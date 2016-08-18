<h3>Lupa Password</h3>
<?php 
	print form_open('email/confirm');
?>
<table class="table table-bordered">
		<input type="hidden" name="username" value="<?php echo $record['username']; ?>">
	<tr>
	<td width="120">New Password</td>
		<td>
			<div class="col-sm-4">
			<input type="password" class="form-control" name="password1" placeholder="Password Baru" required>
			</div>
		</td>
	</tr>
	<tr>
	<tr>
	<td width="120">Re-type New Password</td>
		<td>
			<div class="col-sm-4">
			<input type="password" class="form-control" name="password2" placeholder="Ulangi Password Baru" required>
			</div>
		</td>
	</tr>
		<td colspan="2"><button class="btn btn-primary btn-sm" name="submit" type="submit">Kirim</button>
		<?php print anchor('auth/login','Kembali',array('class' => 'btn btn-default btn-sm')); ?>
		</td>
	</tr>
</table>
</form>
