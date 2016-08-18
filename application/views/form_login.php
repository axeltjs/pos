<?php
print form_open('auth/login');
?>
<table class="table table-bordered" align="center">
	<tr>
		<td width="120">Username</td>
		<td>
			<div class="col-sm-4">
			<input type="text" class="form-control" name="username" placeholder="username">
			</div>
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>
			<div class="col-sm-4">
			<input type="password" name="password" class="form-control" placeholder="password">
			</div>
		</td>
	</tr>
	<tr>
	<td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Login</button>
			<?php print anchor('email/index','Lupa Password',array('class'=>'btn btn-danger btn-sm')); ?>
		</td>
	
	</tr>
</table>

</form>