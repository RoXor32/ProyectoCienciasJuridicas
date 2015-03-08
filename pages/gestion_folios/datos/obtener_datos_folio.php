<?php

    require_once("../../conexion/config.inc.php");

    $query = $db->prepare("SELECT folios.NroFolio, folios.PersonaReferente, unidad_academica.NombreUnidadAcademica, organizacion.NombreOrganizacion, folios.TipoFolio,
    	folios.FechaEntrada, folios.FechaCreacion, ubicacion_archivofisico.DescripcionUbicacionFisica, prioridad.DescripcionPrioridad, folios.DescripcionAsunto 
    	FROM folios INNER JOIN ubicacion_archivofisico ON folios.UbicacionFisica = ubicacion_archivofisico.id_UbicacionArchivoFisico 
    	INNER JOIN prioridad ON folios.Prioridad = prioridad.Id_Prioridad 
    	LEFT JOIN unidad_academica ON folios.UnidadAcademica = unidad_academica.Id_UnidadAcademica 
    	LEFT JOIN organizacion ON folios.Organizacion = organizacion.Id_Organizacion 
    	WHERE NroFolio = :NroFolio");
    $query ->bindParam(":NroFolio",$NroFolio);
    $query->execute();
    $result = $query->fetch();
        if($result){
            $folio = 1;
        }else{
            $folio = 0;
        }
    $query = null;
    $db = null;

?>