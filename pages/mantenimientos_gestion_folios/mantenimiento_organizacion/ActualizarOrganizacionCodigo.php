<?php

    try{
        $addIdOrganizacion = $_POST['Id_Organizacion'];
        $addNombreOrganizacion = $_POST['NombreOrganizacion'];
        $addUbicacion = $_POST['Ubicacion'];

        if($addNombreOrganizacion == "" or $addNombreOrganizacion == null){
        	$mensaje = "Debe de ingresar un nombre para la organizacion";
            $codMensaje = 0;
        }elseif($addUbicacion == "" or $addUbicacion == null){
        	$mensaje = "Debe de ingresar una ubicacion para la organizacion";
            $codMensaje = 0;
        }else{

            require_once("../../conexion/config.inc.php");
    
            $sql = "UPDATE organizacion SET NombreOrganizacion =:addNombreOrganizacion,
                           Ubicacion = :addUbicacion WHERE Id_Organizacion = :addIdOrganizacion";
            $query = $db->prepare($sql);
            $query->bindParam(":addNombreOrganizacion",$addNombreOrganizacion);
            $query->bindParam(":addUbicacion",$addUbicacion);
            $query->bindParam(":addIdOrganizacion",$addIdOrganizacion);
            $query->execute();

            $mensaje = "Organizacion actualizada correctamente";
            $codMensaje = 1;
        }
    }catch(PDOExecption $e){
    	$mensaje = "Al tratar de insertar, por favor intente de nuevo";
        $codMensaje = 0;
    }
    ?>