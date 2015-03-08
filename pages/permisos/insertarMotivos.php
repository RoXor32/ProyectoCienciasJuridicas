<?php
	$motivo =  $_POST['dmotivo'];

	require_once("conexion.php");
	$query = "INSERT INTO tbl_motivos(descripcion) VALUES ('$motivo')";
	
	mysql_query($query, $enlace);
	mysql_close($enlace);
?>