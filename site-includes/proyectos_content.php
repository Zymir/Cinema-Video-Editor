<button class="btn btn-success pull-right" style="margin-bottom:20px"><i class="icon-plus icon-white"></i>&nbsp; &nbsp;Añadir un nuevo proyecto</button>
<table class="table table-striped table-condensed">
	<thead>
		 <tr>
			<th>Título</th>
			<th>Descripción</th>
			<th>Privada</th>
			<th></th>
			<th></th>
			<th></th>
		 </tr>
	</thead>
	<tbody id="contenedor" style="display:none">
	<?php //Se rellena por ajax*/?>
	</tbody>
</table>
<div style="height:100px">
<div class="loadingAnimation">
	<span> Cargando...</span>
</div>
</div>
<script>
$(document).ready(function(){
	$.get('<?php echo getSiteUrl();?>/site-actions/proyectos.php?ACTION=showall&IDUSER=<?php echo $_SESSION['IDUSER'];?>', function(data) {
		$('.loadingAnimation').css('display','none');	
		$('.loadingAnimation').hide('slow',function(){
			$('#contenedor').html(data);
			$('#contenedor').show(100);
		});
	});

})

</script>