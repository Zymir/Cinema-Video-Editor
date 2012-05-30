<?php
	session_start();
	include('db.php');
		
	/*-------Variables de sesion-------*/
	/*
		$_SESSION['IDUSER']="";
	*/
	/*---Configuration---*/
	global $siteURL;
	$siteUrl ="http://localhost/site";
	/*Globales*/
	
	function getSiteUrl(){
		global $siteUrl;
		return $siteUrl;
	}
	
	function clearUser(){
		$_SESSION['USERNAME']="";
		$_SESSION['IDUSER']="";
	}
	
	function cveMail($destinatario, $asunto, $mensaje){

		// primero hay que incluir la clase phpmailer para poder instanciar
		//un objeto de la misma
		require_once("../site-libs/php-mailer/class.phpmailer.php");
		require_once("../site-libs/php-mailer/class.smtp.php");

		//instanciamos un objeto de la clase phpmailer al que llamamos 
		//por ejemplo mail
		$mail = new phpmailer();

		//Definimos las propiedades y llamamos a los métodos 
		//correspondientes del objeto mail

		//Con PluginDir le indicamos a la clase phpmailer donde se 
		//encuentra la clase smtp que como he comentado al principio de 
		//este ejemplo va a estar en el subdirectorio includes
		$mail->PluginDir = "../site-libs/php-mailer/";

		//Con la propiedad Mailer le indicamos que vamos a usar un 
		//servidor smtp
		$mail->Mailer = "smtp";
		$mail->SMTPSecure = "ssl";

		//Asignamos a Host el nombre de nuestro servidor smtp
		$mail->Host = "smtp.gmail.com";

		//Le indicamos que el servidor smtp requiere autenticación
		$mail->SMTPAuth = true;

		// puerto para gmail.
		$mail->Port = 465;
		//Le decimos cual es nuestro nombre de usuario y password
		$mail->Username = "noreply.cve@gmail.com"; 
		$mail->Password = "cve.2012";

		//Indicamos cual es nuestra dirección de correo y el nombre que 
		//queremos que vea el usuario que lee nuestro correo
		$mail->From = "noreply.cve@gmail.com";
		$mail->FromName = "CVE Info";

		//el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
		//una cuenta gratuita, por tanto lo pongo a 30  
		$mail->Timeout=10;

		//Indicamos cual es la dirección de destino del correo
		$mail->AddAddress($destinatario);

		//Asignamos asunto y cuerpo del mensaje
		//El cuerpo del mensaje lo ponemos en formato html, haciendo 
		//que se vea en negrita
		$mail->Subject = $asunto;
		$mail->MsgHTML($mensaje);
		$mail->IsHTML(true);

		//Definimos AltBody por si el destinatario del correo no admite email con formato html 
		//$mail->AltBody = $mensaje;

		//se envia el mensaje, si no ha habido problemas 
		//la variable $exito tendra el valor true
		$exito = $mail->Send();

		//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
		//para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
		//del anterior, para ello se usa la funcion sleep	
		$intentos=1; 
		while ((!$exito) && ($intentos < 5)) {
			sleep(5);
		   // echo $mail->ErrorInfo;
		    $exito = $mail->Send();
		    $intentos=$intentos+1;	
			
		} 

		//echo $exito;
		//exit;
				
		if(!$exito)
		{
			return $mail->ErrorInfo;	
		}else{
			return true;
		} 

	}
	
	function userIsLogedIn(){
		if( isset($_SESSION['USERNAME']) && isset($_SESSION['IDUSER'])){
			return true;
		}else{
			return false;
			
		}
	}
	if(isset($miraLogin) && !userIsLogedIn()){
		header('Location: '.getSiteUrl());
	}

	function userIsAdmin(){
		if(userIsLogedIn()){
			$query = "SELECT `type` FROM usuarios WHERE ID = '".$_SESSION['IDUSER']."'";
			$result = mysql_fetch_object(mysql_query($query));
			if($result->type == 0){//es Admin
				return true;
			}else{
				return false;
				
			}
		}else{
			return;
		}
		
	}
	if(isset($miraAdmin) && !userIsAdmin()){
		header('Location: '.getSiteUrl());
	}
?>