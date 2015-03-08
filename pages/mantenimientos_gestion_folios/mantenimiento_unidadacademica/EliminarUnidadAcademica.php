<?php

    try{
        require_once("../../conexion/config.inc.php");
        $adId_UnidadAcademica = $_POST['Id_UnidadAcademica'];

        $sql = "DELETE FROM unidad_academica WHERE Id_UnidadAcademica = :adId_UnidadAcademica";

        $query = $db->prepare($sql);
        $query ->bindParam(":adId_UnidadAcademica",$adId_UnidadAcademica);
        $query->execute();

        $mensaje = "Unidad Academica eliminada correctamente";
        $codMensaje = 1;
    }catch(PDOExecption $e){
    	$mensaje = "Al tratar de eliminar la Unidad Academica, por favor intente de nuevo";
        $codMensaje = 0;
    }
	
 ?>