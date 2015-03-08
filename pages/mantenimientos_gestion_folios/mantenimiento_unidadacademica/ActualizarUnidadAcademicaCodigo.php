<?php

    try{
        $addId_UnidadAcademica = $_POST['Id_UnidadAcademica'];
        $addNombreUnidadAcademica = $_POST['NombreUnidadAcademica'];
        $addUbicacionUnidadAcademica = $_POST['UbicacionUnidadAcademica'];

        if($addNombreUnidadAcademica == "" or $addNombreUnidadAcademica == null){
        	$mensaje = "Debe de ingresar un nombre para la Unidad Academica";
            $codMensaje = 0;
        }elseif($addUbicacionUnidadAcademica == "" or $addUbicacionUnidadAcademica == null){
        	$mensaje = "Debe de ingresar una ubicacion para la unidad academica";
            $codMensaje = 0;
        }else{

            require_once("../../conexion/config.inc.php");
    
            $sql = "UPDATE unidad_academica SET NombreUnidadAcademica =:addNombreUnidadAcademica,
                           UbicacionUnidadAcademica = :addUbicacionUnidadAcademica WHERE Id_UnidadAcademica = :addId_UnidadAcademica";
            $query = $db->prepare($sql);
            $query->bindParam(":addNombreUnidadAcademica",$addNombreUnidadAcademica);
            $query->bindParam(":addUbicacionUnidadAcademica",$addUbicacionUnidadAcademica);
            $query->bindParam(":addId_UnidadAcademica",$addId_UnidadAcademica);
            $query->execute();

            $mensaje = "Unidad Academica actualizada correctamente";
            $codMensaje = 1;
        }
    }catch(PDOExecption $e){
    	$mensaje = "Al tratar de insertar, por favor intente de nuevo";
        $codMensaje = 0;
    }
    ?>