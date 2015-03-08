<?php
include '../Datos/conexion.php';
$idActividad= $_POST['idActividad'];
$idInd= $_POST['idIndice'];

$consulta=$conectar->prepare("CALL pa_eliminar_actividad(?)");
$consulta->bind_param('i',$idActividad);
$resultado=$consulta->execute();

if($resultado==1)
    {
    echo '<div id="resultado" class="alert alert-success">
        se ha eliminado con exito la actividad
         
         </div>';
    
    }else{
         echo '<div id="resultado"class="alert alert-danger">
        No se ha eliminado la actividad
         
         </div>';
    }

//include 'cargarObjetivos.php';


//$ide= $_POST['id'];
//include '../Datos/conexion.php';
// aqui falta aplicar el filtro para que solo carge los Objetivos de Un solo POA
//$query = mysql_query("SELECT * FROM objetivos_institucionales",$enlace);
$query = mysql_query("SELECT * FROM actividades where id_indicador='".$idInd."'",$enlace);
?>
<!DOCTYPE html>
<html lang="en">

<head>
     

    
    
    

    
</head>

<body>


<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>  
                                            <th>Id</th>
                                            <th>Actividad</th>
                                            <th>Fecha Inicio  </th> 
                                            <th>Fecha Fin</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
				while($row = mysql_fetch_array($query))
				{
					$id = $row['id_actividad'];
					?>
					<tr>
                                            <td><?php echo $row['id_actividad']?></td>
                        <td><div class="text" id="nombre-<?php echo $id ?>"><?php echo $row['descripcion']?></div></td>
                        <td><div class="text" id="descripcion-<?php echo $id ?>"><?php echo $row['fecha_inicio']?></div></td> 
                        <td><div class="text" id="descripcion-<?php echo $id ?>"><?php echo $row['fecha_fin']?></div></td> 
                        <td><a class="ver btn btn-success">ver</a></td>
                        <td><a class="elimina btn btn-success">eliminar</a></td>
                                            </tr>
					<?php
				}
				 ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
    
    
    
    <script>
    // JavaScript Document
var id;
var data;// para ver
var id1;
var data1;//para eliminar

///esta parte selecciona el Poa que se quiere ver 
            $(document).ready(function(){
                fn_dar_eliminar();               
            });
		
             $(document).ready(function(){
                fn_dar_ver();               
            });
			
            
            function fn_dar_ver(){
                $("a.ver").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    ver();
                });
            };
            
            function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id1 = $(this).parents("tr").find("td").eq(0).html();
                    eliminar();
                    
                });
            };

//// en esta parte implemeta el ajax


 function eliminar(){
     var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta)
    {
         data1 ={idActividad:id1,idIndice:$("#idInd").val()};
    
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/actividad.php",     
        beforeSend:inicioEliminar,
        success:llegadaEliminar,
        timeout:4000,
        error:problemas
    }); 
    return false;
    }
}
        
         function ver(){
             data ={ ide:id                 };
    
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/actividad.php",     
        beforeSend:inicioVer,
        success:llegadaVer,
        timeout:4000,
        error:problemas
    }); 
    return false;
} 
           function inicioEliminar()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}
function inicioVer()
{
    var x=$("#contenedor");
    x.html('Cargando...');
}

function llegadaVer()
{
    $("#contenedor").load('pages/actividad.php',data);
}
            function inicioEliminar()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}
function llegadaEliminar()
{
    $("#contenedor2").load('Datos/eliminarActividad.php',data1);
}
function problemas()
{
    $("#contenedor").text('Problemas en el servidor.');
}


    
    </script>
            <script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $("#resultado").fadeOut(1500);
    },3000);
	
});
</script>
    
</body>

</html>

