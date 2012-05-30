$(document).ready(function() {
	$('#user_log').keyup(function(){
		cheeckUserName();
	});
	$('#user_log').focusout(function(){
		cheeckUserName();
	});
	$('#user_email').keyup(function(){
		cheeckUserEmail();
	});
	$('#user_email').focusout(function(){
		cheeckUserEmail();
	});
	
	
	function cheeckUserName(){
		var value = $('#user_log').val();
		if(value.length > 4){
			$.get('site-actions/user.php?action=chekUsername&log='+value, function(data) {
				console.log(data);
				if(data != "ok"){
					$('#err_user_log').html("<p style='color:red'>Error, el usuario ya existe</p>");
				}else{
					$('#err_user_log').html("<p style='color:green'>El usuario está disponible</p>");
				}
			});
		}else{
			$('#err_user_log').html("<p style='color:red'>El usuario debe tener un minimo de 5 letras</p>");
		}
	}
	
	function cheeckUserEmail(){
		var value = $('#user_email').val();
		$.get('site-actions/user.php?action=cheekUserEmail&email='+value, function(data) {
			if(data != "ok"){
				$('#err_user_email').html("<p style='color:red'>Error, ya existe un usuario con ese email</p>");
			}else{
				$('#err_user_email').html("");
			}
		});
	}
	
	$('#submitRegistro').click(function(event) {
  		event.preventDefault();
		var pass=$('#user_pass').val();
		var md5Pass = hex_md5(pass);

		$('#user_pass').val(md5Pass) ;
		$('#user_pass2').val(md5Pass) ;

		$('#registroForm').submit();
	});
	
	$('#submitLogin').click(function(event) {
  		event.preventDefault();
		var pass=$('#user_pass').val();
		var md5Pass = hex_md5(pass);

		$('#user_pass').val(md5Pass) ;

		$('#loginForm').submit();
	});

	$('#submitChangePassword').click(function(event) {
  		event.preventDefault();
		var pass=$('#user_pass').val();
		var md5Pass = hex_md5(pass);

		$('#user_pass').val(md5Pass) ;
		$('#user_pass2').val(md5Pass) ;

		$('#changePasswordForm').submit();
	});

});