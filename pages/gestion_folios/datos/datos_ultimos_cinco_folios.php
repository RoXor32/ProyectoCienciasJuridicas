<?php

    require_once("../../conexion/config.inc.php");

    // Obtiene los ultimos 5 folios ingresados al sistema.

    $query = $db->prepare("SELECT folios.NroFolio, folios.FechaEntrada, folios.TipoFolio, seguimiento.EstadoSeguimiento, 
        folios.Prioridad ,prioridad.DescripcionPrioridad, estado_seguimiento.DescripcionEstadoSeguimiento FROM folios 
        INNER JOIN prioridad ON folios.Prioridad = prioridad.Id_Prioridad INNER JOIN seguimiento ON folios.NroFOlio = seguimiento.NroFolio 
        INNER JOIN estado_seguimiento ON seguimiento.EstadoSeguimiento = estado_seguimiento.Id_Estado_Seguimiento 
        ORDER BY folios.fechaEntrada DESC");
    $query->execute();
    $rows = $query->fetchAll();
        if($rows){
            $folios = 1;
        }else{
            $folios = 0;
        }
    $query = null;
    $db = null;

?>