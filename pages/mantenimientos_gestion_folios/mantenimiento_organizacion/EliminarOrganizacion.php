<?php

    try{
        require_once("../../conexion/config.inc.php");
        $adIdOrganizacion = $_POST['Id_Organizacion'];

        $sql = "DELETE FROM organizacion WHERE Id_Organizacion = :adIdOrganizacion";

        $query = $db->prepare($sql);
        $query ->bindParam(":adIdOrganizacion",$adIdOrganizacion);
        $query->execute();

        $mensaje = "Organizacion eliminada correctamente";
        $codMensaje = 1;
    }catch(PDOExecption $e){
    	$mensaje = "Al tratar de eliminar la organizacion, por favor intente de nuevo";
        $codMensaje = 0;
    }
	
 ?>