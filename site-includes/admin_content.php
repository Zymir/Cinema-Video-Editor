<button type="button" id="news-button" class="btn btn-success news-letter pull-right">Enviar Newsletter</button>
<table class="table table-striped table-condensed">
	<thead>
		 <tr>
		 	<th>ID</th>
			<th>username</th>
			<th>email</th>
			<th>name</th>
			<th>type</th>
			<th>news</th>
			<th></th>
			<th></th>
			<th></th>
		 </tr>
	</thead>
	<tbody>

<?php
$query = "SELECT * FROM usuarios";
$result = mysql_query($query);

while ($row = mysql_fetch_array($result)) {


	if($row['type']==0){
		$type="<b style='color:red'>Administrador</b>";
	}elseif($row['type']==1){
		$type="<b>Premium</b>";
	}elseif($row['type']==2){
		$type="Free";
	}

	if($row['news']==0){
		$news='&nbsp;';
	}elseif($row['news']==1){
		$news='<i class="icon-envelope mail"></i>';
	}

    echo"
    	 <tr class='admin-user-row' id='".$row['ID']."'>
		    <td>".$row['ID']."</td>
		    <td>".$row['username']."</td>
		    <td><a href='mailto:".$row['email']."'>".$row['email']."</a></td>
		    <td>".$row['name']."</td>
		    <td>".$type."</td>
		    <td>".$news."</td>";
		   ?>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td><a href='<?php echo getSiteUrl();?>/site-actions/user.php?action=delete_user&ID=<?php echo $row['ID'];?>' id='admin-delete-<?php echo $row['ID'];?>' class='btn btn-danger pull-right admin-delete' style='margin-left:6px'><i class='icon-fire icon-white'></i></a><div href='javascript: edit_user("<?php echo $row['name'];?>", <?php echo $row['type'];?>, <?php echo $row['ID'];?>);' class='btn btn-info pull-right admin-edit'><i class='icon-pencil icon-white'></i></div></td>
		  </tr>
    <?php
}

?>
	</tbody>
</table>
<!-- Edicion de usuario -->
<div class="edit-user-div">
	<span class="edit-title">Editar usuario: <b id="user-name-to-edit"></b></span><button type="button" id="hide-popup" class="btn btn-inverse hide-popup"><i class='icon-remove icon-white hide-popup'></i></button>
	<br/>
	<div class="edit-user-div2">
		<br/>
		<form method="post" action="<?php echo getSiteUrl();?>/site-actions/user.php">
			<input type="hidden" value="adm-edit" name="action"/>
			<input type="hidden" id="user-id" value="" name="IDUSER"/>
			<input id="edit-name-input" type="text" value="" name="name"/>
			<select id="edit-type-select" name="type">
				<option value="2">Free</option>
				<option value="1">Premium</option>
				<option value="0">Administrador</option>
			</select>
			<br/>
			<br/>
			<input type="submit" id="actualizar" class="btn btn-inverse" value="Actualizar"/>
		</form>
	</div>
</div>
<!-- Envio de Newsletter -->
<div class="news-div">
	<span class="news-title">Newsletter</span><button type="button" id="hide-popup" class="btn btn-inverse hide-popup"><i class='icon-remove icon-white hide-popup'></i></button>
	<br/>
	<div class="news-div2">
		<br/>
		<form method="post" action="<?php echo getSiteUrl();?>/site-actions/user.php">
			<input type="hidden" value="adm-news" name="action"/>
			Titulo del mensaje: <input id="title-input" type="text" value="" name="title"/>
			<br/><br/>
			Mensaje:<br/>
			<textarea class="news-message" name="message">&lt;html&gt;
&lt;head&gt;
	&lt;title&gt;Newsletter CVE&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;

	Introduce aqu&iacute; tu c&oacute;digo...

&lt;/body&gt;
&lt;/html&gt;</textarea>
			<br/>
			<br/>
			<input type="submit" id="enviar" class="btn btn-inverse" value="Enviar"/>
		</form>
	</div>
</div>
<script>
$(document).ready(function() {
		$('.admin-user-row').click(function(){
			var id = $(this).attr('id');
			$('#admin-edit-'+id).click();
		})
		$('.admin-edit').click(function(){ 
			window.location.href=$(this).attr('href');
		})
		$('.hide-popup').click(function(){
			$('.edit-user-div').hide("fast");
			$('.news-div').hide("fast");
		});
		$('#news-button').click(function(){
			$('.edit-user-div').hide("fast");
			$('.news-div').show("fast");
		});
	});

function edit_user(name, type, id){
	$('.news-div').hide("fast");
	$('.edit-user-div').show("fast");
	$('#edit-name-input').val(name);
	$('#user-name-to-edit').text(name);
	$('#edit-type-select').val(type);
	$('#user-id').val(id);
};

</script>