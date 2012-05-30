<div class="well"><p>Introduce tu nombre de usuario o tu correo para resetear tu cotnraseña</p></div>
<form action="<?php echo getSiteUrl()?>/site-actions/user.php?action=olvidopassword" class="form-horizontal" method="POST">
	<fieldset>
			<div class="control-group">
				<label class="control-label">Nombre de usuario</label>
				<div class="controls">
					<input type="text" name="log" id="user_login1" class="input-xlarge" placeholder="Nombre de Usuario" required="required">
					<p class="help-block">y</p>
				</div>
			</div>
		<div class="control-group">
			<label class="control-label" for="prependedInput">Email</label>
			<div class="controls">
				<div class="input-prepend">
					<input class="input-xlarge" name="email" id="prependedInput"  type="Email" placeholder="Email" required="required">
				</div>
				<p class="help-block">Recivirás una nueva contraseña por correo electrónico</p>
			</div>
		</div>
		
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Solicitar contraseña</button>
		</div>
	</fieldset>
</form>