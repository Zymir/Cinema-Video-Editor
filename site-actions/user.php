<?php include_once('../site-globals/header.php');?>
<?php
 set_time_limit(0);


if(isset($_POST['action']) && $_POST['action']=="adm-edit"){
	//echo $_POST['type'].$_POST['name'];
	$query = "UPDATE usuarios SET `name` = '".$_POST['name']."', `type`=".$_POST['type']." WHERE ID = ".$_POST['IDUSER'];
	$result = mysql_query($query);
	//echo $query;
	header('Location: '.getSiteUrl().'/admin.php');
}

if(isset($_POST['action']) && $_POST['action']=="adm-news"){
	//echo $_POST['title'].$_POST['message'];
	$query = "SELECT `email` FROM `usuarios` WHERE `news`=1";
	$results = mysql_query($query);

	while($email = mysql_fetch_object($results)){
		//print_r($email->email);
		try{
			cveMail($email->email, $_POST['title'], $_POST['message']);
		}catch (Exception $e){  
			echo $e.'<br/>';
		}
	}

	header('Location: '.getSiteUrl().'/admin.php');
}



if(isset($_GET['action'])){
	switch ($_GET['action']){
		case "login":
			$query = "SELECT * FROM usuarios WHERE username = '".$_POST['log']."' AND password = '".$_POST['pwd']."'";
			$result = mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($rows = mysql_fetch_object($result)){
					$_SESSION['IDUSER']=$rows->ID;
					$_SESSION['USERNAME']=$rows->username;
					header('Location: '.getSiteUrl().'/index.php?ok=login');
				}
			}else{
				header('Location: '.getSiteUrl().'/index.php?error=login&log='.$_POST['log']);
			}
			break;
			
		case "logout":
			unset($_SESSION['IDUSER']); 
			unset($_SESSION['USERNAME']); 
			header('Location: '.getSiteUrl().'/index.php');
			break;
			
		case "registro":
			$query = "INSERT INTO usuarios (name, username, password, email, type, news) VALUES ('".$_POST['name']."', '".$_POST['log']."', '".$_POST['pwd2']."', '".$_POST['email']."', 2, '".$_POST['optionsCheckboxList2']."')";
			$result = mysql_query($query);
			
			/*EDITADO POR ALBERT LEAL OJO CIUDADO ALEAL*/
			$id = mysql_fetch_object(mysql_query("SELECT `ID` FROM `usuarios` WHERE `username` = '".$_POST['log']."'"));
			$carpeta = "../resources/".$id->ID."/";
			mkdir($carpeta, 0777);
			cveMail($_POST['email'], 'Bienvenido a Cinema Video Editor.', 'Bienvenido: <b>'.$_POST['name'].'</b><br/><br/>Accede a CVE desde el siguiente enlace: <a href="'.getSiteUrl().'">CVE</a>');
			echo "LOL";
			header('Location: '.getSiteUrl().'/index.php?ok=registro');
			break;
			
		case "olvidopassword":
			$codigo = md5($_POST['email'].rand(0, 3000));
			$query = "UPDATE `usuarios` SET `key`= '".$codigo."' WHERE `email` = '".$_POST['email']."'";
			$result = mysql_query($query);
			$mensaje = "Para reestablecer su contraseña dirijase a: <a href=".getSiteUrl()."/changepassword.php?key=".$codigo.">".getSiteUrl()."/changepassword.php?key=".$codigo."</a>";
			cveMail($_POST['email'], 'Recuperación de contraseña CVE', $mensaje);
			//echo '<a href="'.getSiteUrl().'/changepassword.php?key='.$codigo.'">Cambiar contraseña</a>';
			header('Location: '.getSiteUrl().'/index.php?ok=olvidopassword');
			break;

		case "cambiarPassword":
			$query = "UPDATE `usuarios` SET `password`= '".$_POST['pwd2']."', `key`= '' WHERE `key`='".$_POST['key']."'";
			$result = mysql_query($query);
			header('Location: '.getSiteUrl().'/index.php?ok=changepassword');
			break;
			
		case "edit":
			$query = "UPDATE usuarios SET name = ".$_POST['name'].", username = ".$_POST['log'].", password = ".$_POST['pwd'].", email = ".$_POST['email']." WHERE ID = ".$_SESSION['IDUSER'];
			$result = mysql_query($query);
			break;
			
		case "chekUsername":
			$query = "SELECT * FROM usuarios WHERE username = '".$_GET['log']."'";
			$result = mysql_query($query);
			if(mysql_num_rows($result)>0){
					echo'error';
			}else{
					echo'ok';		
			}
			break;
			
		case "cheekUserEmail":
			$query = "SELECT * FROM usuarios WHERE email = '".$_GET['email']."'";
			$result = mysql_query($query);
			if(mysql_num_rows($result)>0){
					echo'error';
			}else{
					echo'ok';		
			}
			break;		


		case "delete_user":
			if(userIsAdmin()){
				$query = "DELETE FROM `usuarios` WHERE `ID`=".$_GET['ID'];
				mysql_query($query);
				header('Location: '.getSiteUrl().'/admin.php');
			}else{
				header('Location: '.getSiteUrl());
			}
			break;

		default:
			echo "La URL no es valida";
			break;
	}
}
?>
