<?php
session_start();
include_once "../../../pages/Conexion.php";

        //Información Personal
	  	if(!empty($_POST['id'])){
            //Borrar persona y teléfono(s) asociado(s).
            for($i=0; $i<count($_POST['id']); $i++){
                $identi = $_POST['id'][$i];
                mysql_query("DELETE FROM telefono WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM empleado WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM estudios_academico WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM experiencia_laboral WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM experiencia_academica WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM telefono WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM persona WHERE N_identidad = '$identi'");
            }
        }

        //Formación Académica
        if(!empty($_POST['idfAc'])){
            //Borrar persona y teléfono(s) asociado(s).
            for($i=0; $i<count($_POST['idfAc']); $i++){
                $identi = $_POST['idfAc'][$i];
                mysql_query("DELETE FROM estudios_academico WHERE N_identidad = '$identi'");
            }
        }

        //Experiencia laboral
        if(!empty($_POST['ideLab'])){
            //Borrar persona y teléfono(s) asociado(s).
            for($i=0; $i<count($_POST['ideLab']); $i++){
                $identi = $_POST['ideLab'][$i];
                mysql_query("DELETE FROM experiencia_laboral WHERE N_identidad = '$identi'");
            }
        }

        //Experiencia Académica
        if(!empty($_POST['idAcad'])){
            //Borrar persona y teléfono(s) asociado(s).
            for($i=0; $i<count($_POST['idAcad']); $i++){
                $identi = $_POST['idAcad'][$i];
                mysql_query("DELETE FROM experiencia_academica WHERE N_identidad = '$identi'");
            }
        }
?>

