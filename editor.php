<?php $title="Editor";
$miraLogin=false;
?>

<?php include_once('site-globals/top.php');?>

	<script type="text/javascript"  src="cve-scripts/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="cve-scripts/core.js"></script>
	<script type="text/javascript" src="cve-scripts/render.js"></script>
	<script type="text/javascript" src="cve-scripts/config.js"></script>
	
	<script type="text/javascript" src="cve-scripts/classes/cveImage.js"></script>
	<script type="text/javascript" src="cve-scripts/classes/cveAudio.js"></script>
	<script type="text/javascript" src="cve-scripts/classes/cveVideo.js"></script>
	<script type="text/javascript" src="cve-scripts/classes/cveVimeo.js"></script>
	<script type="text/javascript" src="cve-scripts/classes/cveText.js"></script>
	<script type="text/javascript" src="cve-scripts/classes/cveObjectLinea.js"></script>
	<script type="text/javascript" src="cve-scripts/classes/cveLineaVideo.js"></script>
	<script type="text/javascript" src="cve-scripts/classes/cveLineaAudio.js"></script>
	<script type="text/javascript" src="cve-scripts/classes/cveBiblioteca.js"></script>
	
	<script src="cve-scripts/jpicker/jpicker-1.1.6.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="cve-scripts/jpicker/css/jPicker-1.1.6.css" />
	
	
	<link rel="stylesheet" type="text/css" href="cve-theme/styles.css" />
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="cve-theme/ie-styles.css" />
	<![endif]-->
<div id="container" class="row show-grid" style="">
	<?php /*<header>
	<div id="title"><div id="logo"></div><h1>Cinema Video Editor</h1></div>
	<div id="headerBar" class="gradientGrey" title="Enable/Disable compact view"></div>
	</header>
	*/?>
	<section id="middle">
		<div id="bibliotecaBox">
			<div id="biblioteca">
			<div id="vimeo">
				<img id="logoVimeo" src="cve-theme/images/vimeo_icon.png" style="height:50px"  alt="vimeo"/>
				<div id="formVimeo">
					<span class="tileLineBox">ID Vimeo:</span><br/>
					<input id="vimeoInput" name="VIMEO" type="text" value="36820781"/>
					<button id="botonVimeo" value="Añadir">Añadir</button>
				</div>
			</div>
			<hr/>
			<ul id="ulBiblioteca"></ul>
			</div>
			
			<div id="uploader">Sube aqui tus imágenes</div>
		</div>
		<div id="playerBox">
			<div id="player" class="translucidBox">
			</div>
			<div id="hiddenPlayer"></div>
		</div>
		<div id="propiedadesBox"></div>
	</section>

	<aside>
		<div id="controlsBar" class="gradientGrey">
		<ul>
			<li id="plauItBaby">&nbsp;</li>
			<li id="pauseItBaby">&nbsp;</li>
			<li id="stopItBaby">&nbsp;</li>
			<li id="prevItBaby">&nbsp;</li>
			<li id="nextItBaby">&nbsp;</li>
			<li id="soundItBaby">&nbsp;</li>
			<li id="mouteItBaby">&nbsp;</li>
		</ul>
		<span id="textItBaby">--:--/--:--</span>
		</div>	
	</aside>
	<section id="bottom">
		<div id="timeLineBox">
			<div id="videoTimeLineBox" class="timeLineBox">
				
				<div id="videoTimeLine"></div>
			</div>
			<div id="audioTimeLineBox" class="timeLineBox">
				<div id="audioTimeLine"></div>
			</div>
		</div>
	</section>
</div>
<audio id="media"></audio>
<?php
	include_once('site-globals/bottom.php');
?>
