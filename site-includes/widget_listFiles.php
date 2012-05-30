<span id="reloadWidget" class="badge badge-info pull-right">Reload</span>
<h3>Tus archivos</h3>

<?php listar_directorios_ruta('./resources/'.$_SESSION['IDUSER'].'/');?>


<?php
function listar_directorios_ruta($ruta){ 
	echo'<ul class="widgetListFiles the-icons">';
   // abrir un directorio y listarlo recursivo 
   if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
         while (($file = readdir($dh)) !== false) { 
		 if( $file!="." && $file!=".."){
			$fileType = filetype($ruta . $file);
			$classe="";
			switch($fileType){
				case '1': 	$classe="icon-film";	break;
				case 'dir': 	$classe="icon-folder-open";	break;
				default: 	$classe="icon-file";	break;
			}
			
		 	echo "<li class='widgetListFile ".filetype($ruta . $file)."'><i class='".$classe."'></i>".$file."</li>"; 
		 
		 }
            if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
			 
               //solo si el archivo es un directorio, distinto que "." y ".." 
               listar_directorios_ruta($ruta . $file . "/"); 
            } 
         } 
      closedir($dh); 
      } 
   }else 
      echo "<br>No es ruta valida"; 
	echo'</ul>';
} 

?>