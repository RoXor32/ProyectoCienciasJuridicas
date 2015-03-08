<?php 

//conexion a la base de datos 
//$link = mysqli_connect("localhost","root","123","test8") or die("Error " . mysqli_error($link)); 
require("conexion.php")
//variables recibidas por ajax	
$nombre =  $_POST['name'];
$idusuario =  $_POST['idusuario'];
$unidad =  $_POST['area'];
$motivo =  $_POST['motivo'];
$edificio =  $_POST['edificio'];
$fecha =  $_POST['fecha'];
$horai =  $_POST['horai'];
$horaf =  $_POST['horaf'];
$cantidad =  $_POST['cantidad'];

$tildes = $enlace -> query("SET NAMES 'utf8'"); //Para que se muestren las tildes
$cont=0;

//consultas para encontrar los ID
$result = mysql_query("SELECT Edificio_ID FROM tbl_edificios  where descripcion='".$edificio."'", $enlace);
$result2 = mysql_query("SELECT Unidad_ID FROM tbl_unidad_academica  where descripcion='".$unidad."'", $enlace);
$result3 = mysql_query("SELECT Motivo_ID FROM tbl_motivos  where descripcion='".$motivo."'", $enlace);
$result5 = mysql_query("SELECT No_Empleado FROM usuario  where id_Usuario='".$idusuario."'", $enlace);


// data seek de consultas
mysql_data_seek ($result,$cont);
mysql_data_seek ($result2,$cont);
mysql_data_seek ($result3,$cont);
mysql_data_seek ($result5,$cont);
//mysqli_data_seek ($result4,$cont);

// arreglos de consultas
$extraido= mysql_fetch_array($result);
$extraido2= mysql_fetch_array($result2);
$extraido3= mysql_fetch_array($result3);
$extraido5= mysql_fetch_array($result5);
//$extraido4=mysqli_fetch_array($result4);

/*
echo "- edificio: ".$extraido['Edificio_ID']."<br/>";
echo "- edificio: ".$extraido2['Unidad_ID']."<br/>";
echo "- edificio: ".$extraido3['Motivo_ID']."<br/>";
*/

	$query = "INSERT INTO tbl_permisos (
	id_unidadAcademica,
	No_Empleado,
	id_motivo,
	dias_permiso,
	hora_inicio,
	hora_finalizacion,
	id_Edificio_Registro,
	fecha,
	estado)
	VALUES(
	'".$extraido2['Unidad_ID']."',
	'".$extraido5['No_Empleado']."',
	'".$extraido3['Motivo_ID']."',
	'".$cantidad."',
	'".$horai."',
	'".$horaf."',
	'".$extraido['Edificio_ID']."',
	'".$fecha."',
	'En espera'
	)";

    echo "Solicitud ingresada exitosamente ";
	$result4 =mysql_query($query, $enlace) or die("Error " . mysql_error($enlace));
	/*echo $query4;	
	/*
	echo $query;
	$result4 =mysqli_query($link, $query) or die("Error " . mysqli_error($link));
/
//echo "- peso: ".$extraido['peso']."<br/>";
echo "-----------------------------------<br/>";
//$cont=$cont+1;


mysqli_free_result($result);
*/
mysql_close($enlace);

?>