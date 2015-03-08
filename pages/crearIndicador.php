<?php
$id= $_POST['ide'];
$nombreObjetivo;
$nombrePoa;

//echo $id;
include '../Datos/conexion.php';
$query = mysql_query("SELECT objetivos_institucionales.id_Objetivo,objetivos_institucionales.definicion,objetivos_institucionales.id_Poa,poa.nombre FROM objetivos_institucionales inner join poa on objetivos_institucionales.id_Poa=poa.id_Poa where  objetivos_institucionales.id_Objetivo='".$id."'",$enlace);
while($row = mysql_fetch_array($query))
        {
    $nombreObjetivo = $row['definicion'];
    $nombrePoa=$row['nombre'];
    $idObj=$row['id_Objetivo'];
        }
        ?>


<!DOCTYPE html>
<html lang="es">

<head>
<script>
     var id;
     var data;// para ver
     var id1;
     var data1;// para consulta 
     var id2;
     var data2;// para eliminar
 var x;
 x=$(document);
 x.ready(inicio);
 
    function inicio(){
        
        var x;
        x=$("#guardarIndicador");
        x.click(guardarIndicador);
        
        var x;
        x=$(".verIndicador");
        x.click(verIndicador);
        
        var x;
        x=$(".eliminarIndicador");
        x.click(eliminarIndicador);
       
    }
    
        function eliminarIndicador (){
            var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta)
    {
        id2 = $(this).parents("tr").find("td").eq(0).html();
             // alert(id2);      
                data2 ={ ide:id2,obj:$("#idObj").val() };     
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"Datos/eliminarIndicador.php", 
                beforeSend:inicioEliminar,
                success:llegadaEliminar,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
    }
    
        function verIndicador(){
            id = $(this).parents("tr").find("td").eq(0).html();
             // alert(id);      
                data ={ ide:id};     
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/crearActividad.php", 
                beforeSend:inicioVer,
                success:llegadaVer,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
        
        
        function guardarIndicador() {
           
           // var pnombre=$("#idObj").val(); 
            //alert(pnombre);
            data1 ={ ind:$("#indicador").val(),
                def:$("#definicion").val(),
                obj:$("#idObj").val()
                
            };
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"Datos/insertarIndicador.php", 
                beforeSend:inicioEnvio,
                success:llegadaGuardar,
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

    function inicioEnvio()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}

function inicioEliminar()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}

function llegadaVer()
{
    $("#contenedor").load('pages/crearActividad.php',data);
}

function llegadaEliminar()
{
    $("#contenedor2").load('Datos/eliminarIndicador.php',data2);
}

function llegadaGuardar()
{
    $("#contenedor2").load('Datos/insertarIndicador.php',data1);
    //$("#contenedor2").load('Datos/cargarObjetivos.php',data);
}

function problemas()
{
    $("#contenedor2").text('Problemas en el servidor.');
}


    </script>
    
    
</head>

<body>
    
    <input type="hidden" id="idObj" value="<?php echo $idObj;?>">  
    
    <div class="col-lg-12">
        
        <div class="row"> 
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <h5><?php echo $nombrePoa;?> </h5>
                        </div>
                        
                        
                    </div>
            
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <h5><?php echo $nombreObjetivo;?> </h5>
                        </div>
                        
                        
                    </div>
            
            <div class="panel panel-default">               
                <div class="panel-heading">
                    Agregar Indicador
                </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <label >Nuevo Indicador</label>
                                        </h4>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                           <div class="col-lg-8">
                                                <button class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                                    Nuevo Indicador
                                                </button>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <label >Mis Indicadores</label>
                                        </h4>
                                    </div>
                                    <div >
                                        <div id="contenedor2" class="panel-body">
                                            <?php 
                                            //include '../Datos/cargarIndicadores.php'; 
                                            
                                            
                                            
                                            
//include '../Datos/conexion.php';
// aqui falta aplicar el filtro para que solo carge los indicadores de un solo objetivo
$query = mysql_query("SELECT objetivos_institucionales.id_Objetivo,indicadores.id_Indicadores,indicadores.nombre,indicadores.descripcion FROM indicadores inner join objetivos_institucionales on indicadores.id_ObjetivosInsitucionales = objetivos_institucionales.id_Objetivo where indicadores.id_ObjetivosInsitucionales='".$id."'",$enlace);
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
                        <td><button id="ver" type="button" class="verIndicador btn btn-success">Ver</button></td>
                        <td><button id="eliminar" type="button" class="eliminarIndicador btn btn-success">eliminar</button></td>
                    </tr>
					<?php
				}
				 ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
    
 



                                            
                                            
                                           
                                        </div>
                                    </div>
                                </div> 
                                
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

    
   
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Indicador</h4>
            </div>
            <div class="modal-body">
               
                                                    <div class="form-group">
                                                        <label>Indicador</label>
                                                        <textarea id="indicador" class="form-control" rows="2"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Descripcion</label>
                                                        <textarea id="definicion" class="form-control" rows="2"></textarea>
                                                    </div>                                                    
                                                    
                                              
                
                
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="guardarIndicador" class="btn btn-primary" data-dismiss="modal" >Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>  
    
    
       
    
   
    
    
   
    
   


</body>

</html>

