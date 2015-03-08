<?php

	require_once('funciones.php');
    
	$root = \realpath($_SERVER["DOCUMENT_ROOT"]);

   include "$root\ModuloCurricular - 3-mar-2015\Datos\Conexion.php";
	
        if (isset($_POST['Id_Idioma'])) {
            $id = $_POST['Id_Idioma'];
            mysql_query("DELETE FROM idioma WHERE Id_Idioma='$id'");
            echo mensajes('Idioma"' . $id . '" Eliminado con Exito', 'verde');
        }
    ?>