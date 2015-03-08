 <?php

    try{

        $addDescripcionUbicacionFisica = $_POST['DescripcionUbicacionFisica'];
        $addCapacidad = $_POST['Capacidad'];
		$addTotalIngresados = $_POST['TotalIngresados'];
		$addHabilitadoParaAlmacenar = $_POST['HabilitadoParaAlmacenar'];

        if($addDescripcionUbicacionFisica == "" or $addDescripcionUbicacionFisica == NULL){
            $mensaje = "Por favor introduzca un nombre para la Ubicacion  Fisica del archivo";
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
	
        $sql = "INSERT INTO ubicacion_archivofisico Values(NULL,:addDescripcionUbicacionFisica,:addCapacidad,:addTotalIngresados, :addHabilitadoParaAlmacenar)";

        $query = $db->prepare($sql);
        $query ->bindParam(":addDescripcionUbicacionFisica",$addDescripcionUbicacionFisica);
        $query ->bindParam(":addCapacidad",$addCapacidad);
		$query ->bindParam(":addTotalIngresados",$addTotalIngresados);
		$query ->bindParam(":addHabilitadoParaAlmacenar",$addHabilitadoParaAlmacenar);
        $query->execute();

        $mensaje = "Ubicacion de archivo Fisica insertada correctamente";
        $codMensaje = 1;

        }

    }catch(PDOExecption $e){
        $mensaje = "Al tratar de insertar, por favor intente de nuevo";
        $codMensaje = 0;
    }

?>