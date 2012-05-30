<?php include_once('../site-globals/header.php');?>
<?php
$files = $_FILES['fileselect'];
	foreach ($files['error'] as $id => $err) {
		if ($err == UPLOAD_ERR_OK) {
			$fn = $files['name'][$id];

			move_uploaded_file(
				$files['tmp_name'][$id],'../resources/'.$_SESSION['IDUSER'].'/'.$fn
			);
			echo "<p>File $fn uploaded.</p>";
		}
	}
	echo'<meta http-equiv="refresh" content="0;url='.getSiteUrl().'/site-includes/widget_uploadFile.php?file=ok">';
?>