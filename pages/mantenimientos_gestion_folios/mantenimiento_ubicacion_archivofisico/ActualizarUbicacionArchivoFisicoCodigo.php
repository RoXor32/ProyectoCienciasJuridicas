<?php

    try{
        $addId_UbicacionArchivoFisico = $_POST['Id_UbicacionArchivoFisico'];	
        $addDescripcionUbicacionFisica = $_POST['DescripcionUbicacionFisica'];
        $addCapacidad = $_POST['Capacidad'];
		$addTotalIngresados = $_POST['TotalIngresados'];
		$addHabilitadoParaAlmacenar = $_POST['HabilitadoParaAlmacenar'];

        if($addDescripcionUbicacionFisica == "" or $addDescripcionUbicacionFisica == NULL){
            $mensaje = "Por favor introduzca una descripcion para la Ubicacion  Fisica del archivo";
            $codMensaje = 0;
        }elseif($addCapacidad == "" or $addCapacidad == NULL){
            $mensaje = "Por favor introduzca una Capacidad";
            $codMensaje = 0;
        }elseif($addTotalIngresados == "" or $addTotalIngresados == NULL){
            $mensaje = "Por favor introduzca un Total de ingresados";
            $codMensaje = 0;
        }elseif($addHabilitadoParaAlmacenar == "" or $addHabilitadoParaAlmacenar == NULL){
            $mensaje = "Por favor introduzca un habilitado para almacenar";
            $codMensaje = 0;
        }else{

            require_once("../../conexion/config.inc.php");
    
            $sql = "UPDATE ubicacion_archivofisico SET DescripcionUbicacionFisica =:addDescripcionUbicacionFisica,
                           Capacidad = :addCapacidad, TotalIngresados =  :addTotalIngresados, HabilitadoParaAlmacenar = :addHabilitadoParaAlmacenar
						   WHERE Id_UbicacionArchivoFisico = :addId_UbicacionArchivoFisico";
						   
        $query = $db->prepare($sql);
        $query ->bindParam(":addDescripcionUbicacionFisica",$addDescripcionUbicacionFisica);
        $query ->bindParam(":addCapacidad",$addCapacidad);
		$query ->bindParam(":addTotalIngresados",$addTotalIngresados);
		$query ->bindParam(":addHabilitadoParaAlmacenar",$addHabilitadoParaAlmacenar);
		$query ->bindParam(":addId_UbicacionArchivoFisico",$addId_UbicacionArchivoFisico);
        $query->execute();

            $mensaje = "Ubicacion Fisica del archivo actualizada correctamente";
            $codMensaje = 1;
        }
    }catch(PDOExecption $e){
    	$mensaje = "Al tratar de insertar, por favor intente de nuevo";
        $codMensaje = 0;
    }
    ?>