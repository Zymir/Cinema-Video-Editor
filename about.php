<?php $title="About";
$miraLogin=false;
?>

<?php include_once('site-globals/top.php');?>

<div class="row show-grid">
	<section class="span4">
			<a name="top"></a>
			<a class="decoration2" href="#qs">Quienes somos</a><br/>
			<a class="decoration2" href="#cl">Clase</a><br/>
			<a class="decoration2" href="#cf">Como funciona</a><br/>
			<a class="decoration3" href="#bl">Biblioteca</a><br/>
			<a class="decoration3" href="#lt">Lineas de tiempo</a><br/>
			<a class="decoration3" href="#pr">Propiedades</a><br/>
			<a class="decoration3" href="#co">Controles</a><br/>
			<a class="decoration3" href="#re">Reproductor</a><br/>
			<a class="decoration3" href="#vi">Video</a><br/><br/>
	</section>
	<section class="span8">
		<section id="middle">
			<div  id="info"><span id="subtitle"><a name="qs">Quienes somos:</a></span><br/><br/>
			<span>- Albert Leal</span><br/>
			<span>- Teófilo Rodríguez</span><br/><br/></div><br/>
			<div  id="info"><span id="subtitle"><a name="cl">Clase:</a></span><br/><br/>
			<span>Arquitectura i tecnologia de sistemes web i multimèdia</span><br/><br/></div><br/>
	</section>		
</div>
<hr>
<div class="row show-grid ">
	<section class="span12 well" style="text-align:justify; padding-right:30px">
		<h2><a name="cf"></a>Como funciona:</h2>
		<p>La aplicación que se explica acontinuación nos permite crear videos a partir de texto, imagenes, videos y archivos de audio.</p>
		<h2><a name="bl"/></a>Biblioteca</h2>
		<center><img src="tutorial-img/biblioteca.jpg" style="width:250px"/></center>
		<br/><br/>
		<p>En el lado izquierdo de la pantalla encontraremos la librería de medios, en la que podremos encontrar todas las imagenes, videos y audios que podremos utilizar, así como la herramienta de generación de texto. En esta sección podremos arrastrar nuestros propios archivos multimedia que se añadirán directamente a nuestra lista para que podamos hacer uso de ellos en nuestra creación.</p>
		<h2><a name="lt"></a>Lineas de tiempo</h2>
		<br/><br/>
		<center><img src="tutorial-img/lineas.jpg"/ style="width:700px"></center>
		<br/><br/>
		<p>En la parte inferior se muestran las dos lineas de tiempo: la superior está destinada a los elementos visuales; mientras que la inferior nos permitirá insertar audio a nuestras creaciones.</p>
		<h2><a name="pr"></a>Propiedades</h2>
		<center><img src="tutorial-img/propiedades.jpg" style="width:250px"/></center>
		<br/><br/>
		<p>En el lado derecho de la pantalla encontraremos las opciones de los diferentes elementos, estas opciones nos permitirán modificar el tiempo que deberá permanecer cada elemento en pantalla una vez comencemos la reproducción de nuestro video. En el caso de los textos, además del tiempo nos permitirá modificar otros parametros como són el propio texto, su tamaño, color, etc.</p>
		<h2><a name="co"></a>Controles</h2>
		<center><img src="tutorial-img/controls.jpg"/></center>
		<br/><br/>
		<p>En la zona central de la pantalla se situan los controles de la aplicación, estos nos permitirán reproducir y detener la reproducción de nuestro video así como silenciar o restaurar el audio. A su vez, nos mostrarán el tiempo de reproducción.</p>
		<h2><a name="re"></a>Reproductor</h2>
		<center><img src="tutorial-img/player.jpg" style="width:450px"/></center>
		<br/><br/>
		<p>En el centro aparecerá la pantalla en que se mostrarán los diferentes elementos que utilicemos a medida que los seleccionemos, así como el video una vez comience su reproducción.</p>
		<h2><a name="vi"></a>Video</h2>
		<p>En el siguiente video se muestra como utilizar la aplicación, así como una breve explicación de los diferentes elementos que se han comentado en el texto anterior.<p/>
		<center>
				<iframe width="640" height="360" src="http://www.youtube.com/embed/JTaZ90_Lt_M?rel=0" frameborder="0" allowfullscreen></iframe>
		</center>
		<br/><br/>
	</section>
</div>

<?php
	include_once('site-globals/bottom.php');
?>
