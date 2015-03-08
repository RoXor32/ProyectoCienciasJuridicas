<?php

    require_once("../../conexion/config.inc.php");
    $conexion = mysqli_connect($host,$username, $password, $dbname);

    $num_folio = $_POST["NroFolio"];
    $fechaCreacion = $_POST["fechaCreacion"];
    $fechaEntrada=date("Y-m-d");
    $personaReferente = $_POST["personaReferente"];
    $unidadAcademica = $_POST["unidadAcademica"];
    $organizacion = $_POST["organizacion"];
    $descripcion = $_POST["descripcion"];
    $tipoFolio=$_POST["tipoFolio"];
    $ubicacionFisica = $_POST["ubicacionFisica"];
    $prioridad = $_POST["prioridad"];      

    if($num_folio == "" or $fechaCreacion == "" or $fechaEntrada == "" or $personaReferente == "" or $descripcion == ""){

        $mensaje="Por favor introduzca todos los campos";
        $codMensaje =0;

    }elseif($tipoFolio == -1 or $ubicacionFisica == -1 or $prioridad == -1){

        $mensaje="Por favor introduzca todos los campos";
        $codMensaje =0;

    }elseif($organizacion == -1 and $unidadAcademica == -1){
        
        $mensaje="Por favor introduzca una organizacion o una unidadAcademica";
        $codMensaje =0;

    }elseif($organizacion != -1 and $unidadAcademica != -1){

        $mensaje="Por favor seleccione solo una organizacion o una unidadAcademica";
        $codMensaje =0;

    }else{
        
        if($organizacion == -1){
            $query = "INSERT INTO folios (NroFolio, FechaCreacion, FechaEntrada, PersonaReferente, UnidadAcademica, Organizacion, DescripcionAsunto, 
            TipoFolio,UbicacionFisica, Prioridad) VALUES('".$num_folio."', '".$fechaCreacion."','".$fechaEntrada."','".$personaReferente."',".$unidadAcademica.",NULL,'".$descripcion."',".$tipoFolio.",".$ubicacionFisica.", ".$prioridad.");";    
        }else{
             $query = "INSERT INTO folios (NroFolio, FechaCreacion, FechaEntrada, PersonaReferente, UnidadAcademica, Organizacion, DescripcionAsunto, 
            TipoFolio,UbicacionFisica, Prioridad) VALUES('".$num_folio."', '".$fechaCreacion."','".$fechaEntrada."','".$personaReferente."',NULL,".$organizacion.",'".$descripcion."',".$tipoFolio.",".$ubicacionFisica.", ".$prioridad.");";    
        }
       
        if (mysqli_query($conexion, $query)) {
            $mensaje = "Folio insertado correctamente";
            $codMensaje = 1;
        } else {
            $mensaje = "Al tratar de insertar, por favor intente de nuevo";
            $codMensaje = 0;
        }

    }

/*
	echo"<HTML>
<meta http-equiv='REFRESH' content='0;url=../../index.php'>
</HTML>";

*/

?>
