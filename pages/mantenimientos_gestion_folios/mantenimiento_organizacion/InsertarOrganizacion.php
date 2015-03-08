 <?php

    try{

        $addNombreOrganizacion = $_POST['Organizacion'];
        $addUbicacion = $_POST['Ubicacion'];

        if($addNombreOrganizacion == "" or $addNombreOrganizacion == NULL){
            $mensaje = "Por favor introduzca un nombre para la organizacion";
            $codMensaje = 0;
        }elseif($addUbicacion == "" or $addUbicacion == NULL){
            $mensaje = "Por favor introduzca una ubicacion para la organizacion";
            $codMensaje = 0;
        }else{

        require_once("../../conexion/config.inc.php");
	
        $sql = "INSERT INTO organizacion Values(NULL,:addNombreOrganizacion,:addUbicacion)";

        $query = $db->prepare($sql);
        $query ->bindParam(":addNombreOrganizacion",$addNombreOrganizacion);
        $query ->bindParam(":addUbicacion",$addUbicacion);
        $query->execute();

        $mensaje = "Organizacion insertada correctamente";
        $codMensaje = 1;

        }

    }catch(PDOExecption $e){
        $mensaje = "Al tratar de insertar, por favor intente de nuevo";
        $codMensaje = 0;
    }

?>