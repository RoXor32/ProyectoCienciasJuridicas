<?php
include '../Datos/conexion.php';

$ind= $_POST['ind'];
$des= $_POST['def'];

$idObj= $_POST['obj'];

$consulta=$conectar->prepare("CALL pa_insertar_indicador(?,?,?)");
$consulta->bind_param('iss',$idObj,$ind,$des);
$resultado=$consulta->execute();

if($resultado==1)
    {
    echo '<div id="resultado" class="alert alert-success">
        se ha Creado un Nuevo Elemento
         
         </div>';
    
    }else{
         echo '<div id="resultado" class="alert alert-danger">
        No se Inserto ningun Nuevo elemento 
         
         </div>';
    }

//include 'cargarObjetivos.php';


//$ide= $_POST['id'];
//include '../Datos/conexion.php';
// aqui falta aplicar el filtro para que solo carge los Objetivos de Un solo POA
//$query = mysql_query("SELECT * FROM objetivos_institucionales",$enlace);
$query = mysql_query("SELECT objetivos_institucionales.id_Objetivo,indicadores.id_Indicadores,indicadores.nombre,indicadores.descripcion FROM indicadores inner join objetivos_institucionales on indicadores.id_ObjetivosInsitucionales = objetivos_institucionales.id_Objetivo where indicadores.id_ObjetivosInsitucionales='".$idObj."'",$enlace);
?>



?>
<!DOCTYPE html>
<html lang="en">

<head>
     

    
    
    

    
</head>

<body>
 <?php 
                                            //include '../Datos/cargarIndicadores.php'; 
                                            
                                            
                                            
                                            
//include '../Datos/conexion.php';
// aqui falta aplicar el filtro para que solo carge los indicadores de un solo objetivo
$query = mysql_query("SELECT objetivos_institucionales.id_Objetivo,indicadores.id_Indicadores,indicadores.nombre,indicadores.descripcion FROM indicadores inner join objetivos_institucionales on indicadores.id_ObjetivosInsitucionales = objetivos_institucionales.id_Objetivo where indicadores.id_ObjetivosInsitucionales='".$idObj."'",$enlace);
?>

<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>  
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Descripcion </th>                                                                                    
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
				while($row = mysql_fetch_array($query))
				{
					$id = $row['id_Indicadores'];
					?>
					<tr>
                                            <td><?php echo $row['id_Indicadores']?></td>
                        <td><div class="text" id="nombre-<?php echo $id ?>"><?php echo $row['nombre']?></div></td>
                        <td><div class="text" id="descripcion-<?php echo $id ?>"><?php echo $row['descripcion']?></div></td>                        
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
var data ; //para ver
var id1;
var data1; // para eliminar 

///esta parte selecciona el Poa que se quiere ver 
            $(document).ready(function(){
                fn_dar_ver();               
            });
            
            $(document).ready(function(){
                fn_dar_eliminar();               
            });
			
			
             function fn_dar_ver(){
                $("a.ver").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    verIndicador();
                });
            };
            
            
            function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id1 = $(this).parents("tr").find("td").eq(0).html();
                    eliminarIndicador();
                    
                });
            };

//// en esta parte implemeta el ajax


 
    function eliminarIndicador(){
        var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta)
    {
             data1 ={ ide:id1,obj:$("#idObj").val()};
    
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"Datos/eliminarIndicador.php",     
        beforeSend:inicioEliminar,
        success:llegadaEliminarIndicador,
        timeout:4000,
        error:problemas
    }); 
    return false;
    }
}
        
            function verIndicador(){
             data ={ ide:id                
        };
    
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/crearActividad.php",     
        beforeSend:inicioVer,
        success:llegadaVerIndicador,
        timeout:4000,
        error:problemas
    }); 
    return false;
} 
function inicioVer()
{
    var x=$("#contenedor");
    x.html('Cargando...');
}

function llegadaVerIndicador()
{
    $("#contenedor").load('pages/crearActividad.php',data);
}

function inicioEliminar()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}

function llegadaEliminarIndicador()
{
    $("#contenedor2").load('Datos/eliminarIndicador.php',data1);
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



    

