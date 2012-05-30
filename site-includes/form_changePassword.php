<script type="text/javascript"  src="site-scripts/md5.js"></script>
<form action="<?php echo getSiteUrl()?>/site-actions/user.php?action=cambiarPassword" method="post" class="form-horizontal" id="changePasswordForm">
<fieldset>
	<div class="control-group">
		<label class="control-label">Contraseña</label>
		<div class="controls">
			<input type="password" name="pwd2" id="user_pass" class="input-xlarge" placeholder="Nueva contraseña" required="required"><br/><br/>
			<input type="password" name="pwd2" id="user_pass2" class="input-xlarge" placeholder="Repite tu nueva contraseña" required="required" onfocus="validatePass(document.getElementById('user_pass'), this);" oninput="validatePass(document.getElementById('user_pass'), this);">
			<input type="hidden" name="key" id="key" class="input-xlarge" placeholder="Nueva contraseña" required="required" value="<?php echo $_GET['key']; ?>"><br/><br/>
		</div>
	</div>
	<button type="submit" class="btn btn-primary btn-large" id="submitChangePassword">Cambiar</button>
</form>