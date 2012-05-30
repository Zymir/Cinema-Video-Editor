<script type="text/javascript"  src="site-scripts/md5.js"></script>
<form class="form-horizontal" action="<?php echo getSiteUrl()?>/site-actions/user.php?action=registro" method="post" id="registroForm">
	<fieldset>
			<div class="control-group">
				<label class="control-label">Nombre de usuario</label>
				<div class="controls">
					<input type="text" min="5" name="log" id="user_log" class="input-xlarge" placeholder="Nombre de Usuario" required="required">
					<p class="help-block">Lo usarás para entrar en la aplicación</p>
					<p class="error-block" id ="err_user_log"></p>
				</div>
			</div>
	   <div class="control-group">
			<label class="control-label">Nombre</label>
			<div class="controls">
				<input type="text" name="name" id="user_login1" class="input-xlarge" placeholder="Nombre" required="required">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="prependedInput">Email</label>
			<div class="controls">
				<div class="input-prepend">
					<input class="input-xlarge" name="email" id="user_email"  type="Email" placeholder="Email" required="required">
				</div>
				<p class="help-block">Aqui se te enviaran las notificaciones</p>
				<p class="error-block" id ="err_user_email"></p>
				
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="appendedPrependedInput">Contraseña</label>
			<div class="controls">
				<input pattern="[a-zA-Z0-9]{5,}" type="password" name="pwd2" id="user_pass" class="input-xlarge" placeholder="Contraseña" required="required"><br/><br/>
				<input pattern="[a-zA-Z0-9]{5,}" type="password" name="pwd2" id="user_pass2" class="input-xlarge" placeholder="Repite tu contraseña" required="required" onfocus="validatePass(document.getElementById('user_pass'), this);" oninput="validatePass(document.getElementById('user_pass'), this);">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="optionsCheckboxList">Terminos de Uso</label>
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" name="optionsCheckboxList1" value="option1" required="required">
					Acepto los <a href="<?php echo getSiteUrl();?>/terminos.php" target="_blank" >terminos de uso y privacidad</a>
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="optionsCheckboxList">Newsletter</label>
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" name="optionsCheckboxList2" value="1">
					Subscribirme a la lista de email para recivir <br/> noticias y actualizaciones sobre CVE
				</label>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" id="submitRegistro" class="btn btn-primary">Darme de alta</button>
		</div>
	</fieldset>
</form>
<script>
function validatePass(p1, p2) {
    if (p1.value != p2.value || p1.value == '' || p2.value == '') {
		//Estas aqui
        p2.setCustomValidity('Password incorrect');
		//alert('incorrecto');
    } else {
        p2.setCustomValidity('');
    }
}
</script>