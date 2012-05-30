<?php include_once('site-globals/header.php');?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="Cinema Video Editor">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="site-theme/bootstrap/css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="site-theme/styles.css">
		<script type="text/javascript"  src="site-scripts/jquery-1.7.1.min.js"></script>
		<script type="text/javascript"  src="site-scripts/scripts.js"></script>
		<title>CVE - Cinema Video Editor - <?php echo $title; ?></title>
	</head>
	<body>
		<div class="container">
			<header>
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
					  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </a>
					  <a class="brand" href="<?php echo getSiteUrl();?>">Cinema Video Editor</a>
					  <div class="nav-collapse collapse" style="margin-left:100px">
						<ul class="nav">
							<?php if(isset($_SESSION['IDUSER']) && $_SESSION['IDUSER']!=""){?>
								<li><a href="<?php echo getSiteUrl();?>/upload.php" rel="nofollow">Gestión de archivos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
								<li><a href="<?php echo getSiteUrl();?>/proyectos.php" rel="nofollow">Gestión de proyectos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
								<?php if(userIsAdmin()){?>
								<li><a href="<?php echo getSiteUrl();?>/admin.php" rel="nofollow">Administración de usuarios&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
								<?php }?>
								<li class="pull-right"><a href="<?php echo getSiteUrl();?>/site-actions/user.php?action=logout" rel="nofollow">Salir</a></li>
							<?php }?>
						</ul>
					  </div>
					</div>
				</div>
			</div>
			</header>
			<?php
			if (!userIsAdmin()) {?>
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_floating_style addthis_32x32_style" style="left:50px;top:50px;">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_compact"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fc4eb2e29e9d67c"></script>
				<!-- AddThis Button END -->
			<?php }
			?>
			<h1 class="pageTitle"><?php echo $title; ?></h1>
			