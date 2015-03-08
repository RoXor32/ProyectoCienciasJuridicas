<?php
$id= $_POST['ide'];
$nombre;

include '../Datos/conexion.php';

$query = mysql_query("SELECT * FROM poa where id_Poa='".$id."'",$enlace);
while($row = mysql_fetch_array($query))
        {
    $nombre = $row['nombre'];
    
        }
        ?>


<!DOCTYPE html>
<html lang="es">

<head>
<script>
     var id;
     var data;//para funcion consulta//
     var id1;
     var data1;//para funcion ver//
     var id2;
     var data2;//para funcion eliminar//
     
 var x;
 x=$(document);
 x.ready(crearObjetivo);
 

 
    function crearObjetivo(){
        
        var x;
        x=$("#guardarObjetivo");
        x.click(guardarObjetivo);
        
        var x;
        x=$(".verObjetivo");
        x.click(verObjetivo);
        
        var x;
        x=$(".eliminarObjetivo");
        x.click(eliminarObjetivo); 
    }
        
        function eliminarObjetivo(){
            var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta)
    {
            id2 = $(this).parents("tr").find("td").eq(0).html();
           // alert(id2)
                 
                data2 ={ id:id2,idPOA:$("#idPOA").val()};     
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"Datos/eliminarObjetivo.php", 
                beforeSend:inicioEliminar,
                success:llegadaElminarObjetivo,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
        }
        
        function verObjetivo(){
            id1 = $(this).parents("tr").find("td").eq(0).html();
             // alert(id1);      
                data1 ={ ide:id1};     
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/crearIndicador.php", 
                beforeSend:inicioVer,
                success:llegadaVerObjetivo,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
        
        
        function guardarObjetivo() {
           
            //var pnombre=$("#idPOA").val(); 
            //alert(pnombre);
            data ={ def:$("#def").val(),
                area:$("#area").val(),
                tipArea:$("#tipArea").val(),
                res:$("#res").val(),
                id:$("#idPOA").val()
            };
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"Datos/insertarObjetivo.php", 
                beforeSend:inicioEnvio,
                success:llegadaGuardarObjetivo,
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
    function inicioEnvio()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}
function llegadaVerObjetivo()
{
    $("#contenedor").load('pages/crearIndicador.php',data1);
}
function llegadaElminarObjetivo()
{
    $("#contenedor2").load('Datos/eliminarObjetivo.php',data2);
}
function llegadaGuardarObjetivo()
{
    $("#contenedor2").load('Datos/insertarObjetivo.php',data);
    //$("#contenedor2").load('Datos/cargarObjetivos.php',data2);
}

function problemas()
{
    $("#contenedor2").text('Problemas en el servidor.');
}


    </script>
    
    
</head>

<body>
    
     <input type="hidden" id="idPOA" value="<?php echo $id;?>">     
    
    <div class="col-lg-12">
        
        <div class="row">            
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h5><?php echo $nombre;?> </h5>
                        </div>
                        
                        
                    </div>
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                            Agregar Objetivo Institucional
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <label >Nuevo Objetivo</label>
                                        </h4>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="col-lg-8">
                                                <button class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                                    Nuevo Objetivo
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <label >Mis Objetivos </label>
                                        </h4>
                                    </div>
                                    <div >
                                        <div id="contenedor2" class="panel-body">
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                                                        <?php

$query2 = mysql_query("SELECT * FROM objetivos_institucionales where id_Poa='".$id."'",$enlace);
?>    




<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Definicion</th>
                                            <th>Area Estrategica</th>
                                            <th>Resultado</th>
                                            <th>Area que Pertenece</th>                                            
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
				while($row = mysql_fetch_array($query2))
				{
					$id = $row['id_Objetivo'];
					?>
					<tr>
                                            <td ><?php echo $id ?></td>
                        <td><div class="text" id="definicion-<?php echo $id ?>"><?php echo $row['definicion']?></div></td>
                        <td><div class="text" id="area-<?php echo $id ?>"><?php echo $row['area_Estrategica']?></div></td>
                        <td><div class="text" id="resultado-<?php echo $id ?>"><?php echo $row['resultados_Esperados']?></div></td>
                        <td><div class="text" id="campo-<?php echo $id ?>"><?php echo $row['id_Area']?></div></td>
                        <td><button id="ver" type="button" class="verObjetivo btn btn-success">Ver</button></td>
                        <td><button id="borra" type="button" class="eliminarObjetivo btn btn-success">Eliminar</button></td>
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
                <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Objetivo</h4>
            </div>
            <div class="modal-body">
               
                <div class="form-group">
                    <label>Definición </label>
                    <textarea id="def" class="form-control" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label>Area Estrategica </label>
                    <textarea id="area" class="form-control" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label>Resultado</label>
                    <textarea id="res" class="form-control" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label>Area a la que pertenece </label>
                    <select id="tipArea" class="form-control">
                        <option value="0">Seleccione..</option>
                        <option value="1">Desarrollo e innovacion Curricular</option>
                        <option value="2">De Investigacion</option>
                        <option value="3">Vinculacion </option>
                        <option value="4">Docencia</option>
                        <option value="5">Profesorado</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="guardarObjetivo" class="btn btn-primary" data-dismiss="modal" >Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>  
     
    
    
    
   
    
   
    
    
   
    
   


</body>

</html>

<?php

    mysql_close($enlace);
       
?>