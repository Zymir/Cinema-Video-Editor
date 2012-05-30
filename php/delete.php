<?php 
$title="Deleting";
$miraLogin=true;
	include_once('../site-globals/topBlank.php');

	if(isset($_GET['userID']) && isset($_GET['file'])){
	if($_GET['userID'] == $_SESSION['IDUSER']){
		$file_path = "files/".$_GET['userID']."/".$_GET['file'];		
		$suc = unlink($file_path);
	}
		header('Location: '.getSiteUrl().'/upload.php');	
	}
	include_once('../site-globals/bottomBlank.php');
?>