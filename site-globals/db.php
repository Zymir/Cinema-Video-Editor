<?php
	$db =  mysql_connect('localhost', 'root', '');
	if (!$db) {
		echo 'not conected to database';
		exit;
	}
	mysql_select_db("cve-db",$db);
?>