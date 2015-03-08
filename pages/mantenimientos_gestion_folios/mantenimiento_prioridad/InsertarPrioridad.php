 <?php

    try{

        $addDescripcionPrioridad = $_POST['DescripcionPrioridad'];
       
        if($addDescripcionPrioridad == "" or $addDescripcionPrioridad == NULL){
            $mensaje = "Por favor introduzca un nombre para la prioridad";
            $codMensaje = 0;
        }else{

        require_once("../../conexion/config.inc.php");
	
        $sql = "INSERT INTO prioridad Values(NULL,:addDescripcionPrioridad)";

        $query = $db->prepare($sql);
        $query ->bindParam(":addDescripcionPrioridad",$addDescripcionPrioridad);
        $query->execute();

        $mensaje = "Prioridad insertada correctamente";
        $codMensaje = 1;

        }

    }catch(PDOExecption $e){
        $mensaje = "Al tratar de insertar, por favor intente de nuevo";
        $codMensaje = 0;
    }

?>