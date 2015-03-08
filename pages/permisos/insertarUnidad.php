<?php
	 
	$unidad = $_POST['dunidad'];
	
	require_once("conexion.php");
	$query = "INSERT INTO tbl_unidad_academica(descripcion) VALUES('$unidad')";
	mysql_query($query, $enlace);
	mysql_close($enlace);
?>