<?php $title="Index";?>
<?php include_once('site-globals/header.php');?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="Cinema Video Editor">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="site-theme/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="site-theme/styles.css">
		<script type="text/javascript"  src="site-scripts/jquery-1.7.1.min.js"></script>
		<script type="text/javascript"  src="site-scripts/scripts.js"></script>
		<title>CVE - Cinema Video Editor - <?php echo $title; ?></title>
	</head>
	<body>
		<div class="container">
			<header>
				<h1>Cinema Video Editor</h1>
			</header>
			<div class="row show-grid">
				<section class="span7">
					<h2>&iquest;Qu&eacute; &eacute;s CVE?</h2>
				</section>
				<aside id="login" class="span4  well">
					<form>
						<label>Nombre de usuario</label>
						<input type="text" class="span3" placeholder="Nombre de Usuario"> <span class="help-inline">Associated help text!</span>
						<p class="help-block">Example block-level help text here.</p>
						<label class="checkbox">
						  <input type="checkbox"> Check me out
						</label>
						<button type="submit" class="btn">Submit</button>
					 </form>
				</aside>
			</div>
		</div>
	</body>
</html>
<?php include_once('site-globals/footer.php');?>