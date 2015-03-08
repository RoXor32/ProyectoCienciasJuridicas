<?php

    try{
        require_once("../../conexion/config.inc.php");
        $adId_UbicacionArchivoFisico = $_POST['Id_UbicacionArchivoFisico'];

        $sql = "DELETE FROM ubicacion_archivofisico WHERE Id_UbicacionArchivoFisico = :adId_UbicacionArchivoFisico";

        $query = $db->prepare($sql);
        $query ->bindParam(":adId_UbicacionArchivoFisico",$adId_UbicacionArchivoFisico);
        $query->execute();

        $mensaje = "Ubicacion Archivo Fisica eliminada correctamente";
        $codMensaje = 1;
    }catch(PDOExecption $e){
    	$mensaje = "Al tratar de eliminar la Ubicacion Archivo Fisica, por favor intente de nuevo";
        $codMensaje = 0;
    }
	
 ?>