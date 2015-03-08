<?php

    try{
        $addId_Prioridad = $_POST['Id_Prioridad'];
        $addDescripcionPrioridad = $_POST['DescripcionPrioridad'];
       

        if($addDescripcionPrioridad == "" or $addDescripcionPrioridad == null){
        	$mensaje = "Debe de ingresar un nombre para la Prioridad";
            $codMensaje = 0;
        }else{

            require_once("../../conexion/config.inc.php");
    
            $sql = "UPDATE prioridad SET DescripcionPrioridad =:addDescripcionPrioridad
                            WHERE Id_Prioridad = :addId_Prioridad";
            $query = $db->prepare($sql);
            $query->bindParam(":addDescripcionPrioridad",$addDescripcionPrioridad);
            $query->bindParam(":addId_Prioridad",$addId_Prioridad);
            $query->execute();

            $mensaje = "Prioriad actualizada correctamente";
            $codMensaje = 1;
        }
    }catch(PDOExecption $e){
    	$mensaje = "Al tratar de insertar, por favor intente de nuevo";
        $codMensaje = 0;
    }
    ?>