<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Demo 6.8
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<!-- Bootstrap CSS Toolkit styles -->

<!-- Generic page styles -->
<link rel="stylesheet" href="<?php echo getSiteUrl()?>/site-libs/jqFUpload/css/style.css">

<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo getSiteUrl()?>/site-libs/jqFUpload/css/jquery.fileupload-ui.css">
    <h4>Arrastra tus ficheros aqui para añadirlos a tu bilbioteca de ficheros</h4>
    <br>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="<?php echo getSiteUrl()?>/php/uploadProcess.php?userID=<?php echo $_SESSION['IDUSER']?>" method="POST" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<input type="hidden" name="userID" value="<?php echo $_SESSION['IDUSER'];?>"/>
        <div class="row fileupload-buttonbar">
            <div class="span9">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Añadir ficheros...</span>
                    <input type="file" name="files[]" multiple accept="video/mp4, audio/mpeg, image/*">
                </span>
                <button type="submit" class="btn btn-info start">
                    <i class="icon-upload icon-white"></i>
                    <span>Comenzar la subida</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancelar la subida</span>
                </button>
              <!--  <button type="button" class="btn btn-danger delete">
                    <i class="icon-fire icon-white"></i>
                    <span>Borrar</span>-->
                </button>
						<!--<input type="checkbox" class="toggle"> Marcar todos todos</input>-->
            </div>
            <div class="span3 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-success progress-striped active">
                    <div class="bar" style="width:0%;"></div>
                </div>
				 <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The loading indicator is shown during file processing -->
        <div class="fileupload-loading"></div>
        <br>
        <!-- The table listing the files available for upload/download -->
		 <h4>Edita aqui tus archivos guardados</h4><br/>
		 <div style="overflow:auto; height:400px">
        <table class="table table-striped" style="height:400px; overflow:auto"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
		</div>
    </form>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-info">
                    <i class="icon-upload icon-white"></i>
                    <span>Subir</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>Cancelar</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <a class="btn btn-danger" href="<?php echo getSiteUrl()?>/php/delete.php?userID=<?php echo $_SESSION['IDUSER']?>&file={%=file.delete_url%}">
                <i class="icon-fire icon-white"></i>
                <span>Borrar</span>
            </button>
           <!-- <input type="checkbox" name="delete" value="1">-->
        </td>
    </tr>
{% } %}
</script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo getSiteUrl()?>/site-libs/jqFUpload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.com/JavaScript-Templates/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>
<script src="http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo getSiteUrl()?>/site-libs/jqFUpload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo getSiteUrl()?>/site-libs/jqFUpload/js/jquery.fileupload.js"></script>
<!-- The File Upload file processing plugin -->
<script src="<?php echo getSiteUrl()?>/site-libs/jqFUpload/js/jquery.fileupload-fp.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo getSiteUrl()?>/site-libs/jqFUpload/js/jquery.fileupload-ui.js"></script>
<!-- The localization script -->
<script src="<?php echo getSiteUrl()?>/site-libs/jqFUpload/js/locale.js"></script>
<!-- The main application script -->
<script src="<?php echo getSiteUrl()?>/site-libs/jqFUpload/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="js/cors/jquery.xdr-transport.js"></script><![endif]-->
