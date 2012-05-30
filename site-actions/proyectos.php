<?php include_once('../site-globals/header.php');?>
<?php
if(isset($_GET['ACTION']) && isset($_GET['IDUSER'])){
	switch ($_GET['ACTION']){
		case "getone":
			$query = "SELECT * FROM proyectos WHERE ID = '".$_GET['ID']."'";
			$result = mysql_query($query);
			if(mysql_num_rows($result)>0){
					printLoop($result);
			}else{
				header('Location: '.getSiteUrl().'/index.php?error=login&log='.$_POST['log']);
			}
			break;
		case "delete":
		
			break;
		case "update":
		
			break;
		case "showall":
			$query = "SELECT * FROM proyectos WHERE IDUsuario = '".$_GET['IDUSER']."'";
			$query = "SELECT * FROM proyectos";
			$result = mysql_query($query);
			printLoop($result);
			break;
		default:
			break;
	}
}

function printLoop($result){

	while ($row = mysql_fetch_array($result)) {
			if($row['privada']==1){
			$news='<i class="icon-lock"></i>&nbsp;&nbsp;<a href="#">editar</a>';
		}elseif($row['privada']==0){
			$news='<i class="icon-eye-open"></i>&nbsp;&nbsp;<a href="#">editar</a>';
		}
		echo"
			 <tr class='admin-user-row' id='".$row['ID']."'>
				<td style='text-align:justify; width:178px;'><a title='Ir a ver' href='#?idProject=".utf8_encode($row['ID'])."'>".utf8_encode($row['titulo'])."</a></td>
				<td style='text-align:justify; padding-right:15px; width:470px;'>".utf8_encode($row['descripcion'])."</td>
				<td>".$news."</td>
				";
				?>
				<td>
					<a title="Eliminar" href='<?php echo getSiteUrl();?>/proyectos.php#?ID=<?php echo $row['ID'];?>' id='admin-delete-<?php echo $row['ID'];?>' class='btn btn-danger pull-right admin-delete' style='margin-left:6px'>
						<i class='icon-fire icon-white'></i>
					</a>
					<a title="Editar" href='javascript: edit_user("<?php echo $row['name'];?>", <?php echo $row['type'];?>, <?php echo $row['ID'];?>);' class='btn btn-info pull-right admin-edit'>
						<i class='icon-pencil icon-white'></i>
					</a>
					<a title="Descargar" href='<?php echo getSiteUrl();?>/proyectos.php#?ID=<?php echo $row['ID'];?>' id='admin-delete-<?php echo $row['ID'];?>' class='btn btn-success pull-right admin-delete' style='margin-right:6px'>
						<i class='icon-download icon-white'></i>
					</a>
				</td>
				<?php echo"</tr>";
	}
}
?>