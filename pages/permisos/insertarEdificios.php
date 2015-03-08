<?php
	require_once("conexion.php"); 
	
	$edificio = $_POST['dedificio'];
	$query = "INSERT INTO tbl_edificios(descripcion) VALUES('$edificio')";
	
	mysql_query($query, $enlace);
	mysql_close($enlace);
?>