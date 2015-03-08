<?php
include '../Datos/conexion.php';

$def= $_POST['def'];
$area= $_POST['area'];
$tipArea= $_POST['tipArea'];
$res= $_POST['res'];
$idPOA= $_POST['id'];

$consulta=$conectar->prepare("CALL pa_insertar_objetivos_institucionales(?,?,?,?,?)");
$consulta->bind_param('sssii',$def,$area,$res,$tipArea,$idPOA);
$resultado=$consulta->execute();

if($resultado==1)
    {
    echo '<div id="resultado" class="alert alert-success">
        se ha Creado un nuevo Plan Operativo Anual
         
         </div>';
    
    }else{
         echo '<div id="resultado" class="alert alert-danger">
        No se Inserto ningun Nuevo elemento 
         
         </div>';
    }

?>

<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $("#resultado").fadeOut(1500);
    },3000);
	
});
</script>