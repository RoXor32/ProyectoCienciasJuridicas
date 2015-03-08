<?php
include '../Datos/conexion.php';

$id= $_POST['id'];
$idPOA= $_POST['idPOA'];
$consulta=$conectar->prepare("CALL pa_eliminar_objetivo_institucional(?)");
$consulta->bind_param('i',$id);
$resultado=$consulta->execute();

if($resultado==1)
    {
    echo '<div id="resultado" class="alert alert-success">
        se ha elinado un nuevo objetivo
         
         </div>';
    
    }else{
         echo '<div id="resultado" class="alert alert-danger">
        hubo problemas al Eliminar el objetivo institucional
         
         </div>';
    }
    
    $query = mysql_query("SELECT * FROM objetivos_institucionales where id_Poa='".$idPOA."'",$enlace);
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
                                            <th>Definicion</th>
                                            <th>Area Estrategica</th>
                                            <th>Resultado</th>
                                            <th>Area que Pertenece</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
				while($row = mysql_fetch_array($query))
				{
					$id = $row['id_Objetivo'];
					?>
					<tr>
                                            <td><?php echo $row['id_Objetivo']?></td>
                        <td><div class="text" id="definicion-<?php echo $id ?>"><?php echo $row['definicion']?></div></td>
                        <td><div class="text" id="area-<?php echo $id ?>"><?php echo $row['area_Estrategica']?></div></td>
                        <td><div class="text" id="resultado-<?php echo $id ?>"><?php echo $row['resultados_Esperados']?></div></td>
                        <td><div class="text" id="campo-<?php echo $id ?>"><?php echo $row['id_Area']?></div></td>
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
var data; // para ver
//
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
         function ver(){
             data ={ ide:id};
    
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/crearIndicador.php",     
        beforeSend:inicioVer,
        success:llegadaVer,
        timeout:4000,
        error:problemas
    }); 
    return false;
} 

function eliminar(){
    var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta)
    {
             //alert($("#idPOA").val());
             //alert(id1);
             data1 ={ id:id1,idPOA:$("#idPOA").val()};   
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"Datos/eliminarObjetivo.php",     
        beforeSend:inicioEliminar,
        success:llegadaEliminar,
        timeout:4000,
        error:problemas
    }); 
    return false;
    }
}
function inicioVer()
{
    var x=$("#contenedor");
    x.html('Cargando...');
}
function inicioEliminar()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}
function llegadaVer()
{
    $("#contenedor").load('pages/crearIndicador.php',data);
}
function llegadaEliminar()
{
    $("#contenedor2").load('Datos/eliminarObjetivo.php',data1);
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


