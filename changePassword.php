<?php $title="Cambiar Contraseña";?>
<?php include_once('site-globals/top.php');?>

<?php 
/*Si no hay key, redirecionamos a la home*/
if(!isset($_GET['key']) || cheekKey($_GET['key'])){ 
	echo'<meta http-equiv="refresh" content="0;url='.getSiteUrl().'">';
}
?>
	<div class="row show-grid">
		<section class="span12">
		<?php include_once('site-includes/form_changePassword.php');?>
		</section>
	</div>
<?php

function cheekKey($key){
		$query = "SELECT * FROM `usuarios` WHERE `key` = '".$key."'";
		$result = mysql_query($query);
		if(mysql_num_rows($result)>0){
				return false;
		}else{
				return true;		
		}
}

 include_once('site-globals/bottom.php');

?>