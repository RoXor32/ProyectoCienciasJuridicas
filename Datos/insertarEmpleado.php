<?php

$root=\realpath($_SERVER["DOCUMENT_ROOT"]);

include "$root\curriculo\Datos\conexion.php";

//include "$root\curriculo\Datos\funciones.php";
        
      
          
	If(isset($_POST['cod_empleado'])){
	
          
            
		$no_empleado=$_POST['cod_empleado'];
		 $id_dep=$_POST['id_dep'];
		 $fecha=$_POST['fecha'];
		 $obs=$_POST['obs'];
		 $identi=$_POST['identi'];
                 		 
 
	$query= mysql_query("INSERT INTO empleado(`No_Empleado`,`N_identidad`,`Id_departamento`,`Fecha_ingreso`,`Observacion`,`estado_empleado`,`foto_perfil`) VALUES ('$no_empleado','$identi','$id_dep','$fecha','$obs','1','null')");
	
	
	if($query){
	
		//echo '<METAHTTP-EQUIV="REFRESH" CONTENT="2">' ;
		//echo mensajes('Ingresado exitosamente','verde');
	
	
	
	}else{}
	
	}
        
        
    include "$root \curriculo\Datos\cargarEmpleados.php";
        
  ?>