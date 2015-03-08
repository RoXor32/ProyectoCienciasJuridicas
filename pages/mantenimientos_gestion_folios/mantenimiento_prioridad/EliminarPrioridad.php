<?php

    try{
        require_once("../../conexion/config.inc.php");
        $adId_Prioridad = $_POST['Id_Prioridad'];

        $sql = "DELETE FROM prioridad WHERE Id_Prioridad = :adId_Prioridad";

        $query = $db->prepare($sql);
        $query ->bindParam(":adId_Prioridad",$adId_Prioridad);
        $query->execute();

        $mensaje = "Prioridad eliminada correctamente";
        $codMensaje = 1;
    }catch(PDOExecption $e){
    	$mensaje = "Al tratar de eliminar la prioridad, por favor intente de nuevo";
        $codMensaje = 0;
    }
	
 ?>