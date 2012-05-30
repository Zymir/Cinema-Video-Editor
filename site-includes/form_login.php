<?php if(!isset($_SESSION['IDUSER']) || $_SESSION['IDUSER']==""){?>
<script type="text/javascript"  src="site-scripts/md5.js"></script>
<h3 class="module-title">Iniciar Sesión</h3>	
<form action="<?php echo getSiteUrl()?>/site-actions/user.php?action=login" method="post" class="form-vertical" id="loginForm">
	<label for="user_login1">Nombre de usuario</label>
	<input type="text" name="log" id="user_login1" class="input-xlarge" value="<?php if(isset($_GET['log'])){echo $_GET['log'];}?>" placeholder="Nombre de Usuario">
	
	<label for="user_pass">Contraseña</label>
	<input type="password" name="pwd" id="user_pass" class="input-xlarge" placeholder="Password">
				
	<?php /*<label class="checkbox">
		  <input type="checkbox"> Recuerdame
	</label>*/?>
	<button type="submit" id="submitLogin" class="btn btn-primary btn-large">Entrar</button>
</form>
<ul class="tml-action-links">
	<li><a href="<?php echo getSiteUrl();?>/registro.php" rel="nofollow">Registro</a></li>
	<li><a href="<?php echo getSiteUrl();?>/password.php" rel="nofollow">Recuperar Contraseña</a></li>
</ul>
<?php }else{ ?>
<h3 class="module-title">Tus últimos Poryectos</h3>	
<ul class="tml-action-links">
	<li><a href="<?php echo getSiteUrl();?>/editor.php">Proyecto 1</a></li>
</ul>

<?php } ?>
