 <?php

    try{

        $addNombreUnidadAcademica = $_POST['UnidadAcademica'];
        $addUbicacionUnidadAcademica = $_POST['Ubicacion'];

        if($addNombreUnidadAcademica == "" or $addNombreUnidadAcademica == NULL){
            $mensaje = "Por favor introduzca un nombre para la Unidad Academica";
            $codMensaje = 0;
        }elseif($addUbicacionUnidadAcademica == "" or $addUbicacionUnidadAcademica == NULL){
            $mensaje = "Por favor introduzca una ubicacion para la Unidad Academica";
            $codMensaje = 0;
        }else{

        require_once("../../conexion/config.inc.php");
	
        $sql = "INSERT INTO unidad_academica Values(NULL,:addNombreUnidadAcademica,:addUbicacionUnidadAcademica)";

        $query = $db->prepare($sql);
        $query ->bindParam(":addNombreUnidadAcademica",$addNombreUnidadAcademica);
        $query ->bindParam(":addUbicacionUnidadAcademica",$addUbicacionUnidadAcademica);
        $query->execute();

        $mensaje = "Unidad Academica insertada correctamente";
        $codMensaje = 1;

        }

    }catch(PDOExecption $e){
        $mensaje = "Al tratar de insertar, por favor intente de nuevo";
        $codMensaje = 0;
    }

?>