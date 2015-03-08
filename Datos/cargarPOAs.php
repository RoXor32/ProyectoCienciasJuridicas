<?php
include '../Datos/conexion.php';

$query = mysql_query("SELECT * FROM poa  ORDER BY fecha_Fin",$enlace);
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
                                            <th>id</th>
                                            <th>Titulo</th>
                                            <th>DEL</th>
                                            <th>Al</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
				while($row = mysql_fetch_array($query))
				{
					$id = $row['id_Poa'];
					?>
					<tr>
                                            <td><?php echo $row['id_Poa']?></td>
                        <td><div class="text" id="titulo-<?php echo $id ?>"><?php echo $row['nombre']?></div></td>
                        <td><div class="text" id="del-<?php echo $id ?>"><?php echo $row['fecha_de_Inicio']?></div></td>
                        <td><div class="text" id="al-<?php echo $id ?>"><?php echo $row['fecha_Fin']?></div></td>
                        <td><a class="ver btn btn-primary ">ver</a></td>
                        <td><a class="elimina btn btn-primary ">eliminar</a></td>
                    </tr>
					<?php
				}
				 ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
   
  
   
    



 


</body>

 <script>
    // JavaScript Document
var id;
var id1;
var data;
var data1;

///esta parte selecciona el Poa que se quiere ver 
            $(document).ready(function(){
                fn_dar_eliminar();               
            });
			
			
              $(document).ready(function(){
                fn_dar_ver();               
            });
            
             function fn_dar_eliminar(){
          
                $("a.elimina").click(function(){
                    id1 = $(this).parents("tr").find("td").eq(0).html();
                    eliminarUnPOA();
                  
                });
            };
            
            function fn_dar_ver(){
                $("a.ver").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    consultaDePOAS();
                    
                });
            };

//// en esta parte implemeta el ajax
        function eliminarUnPOA(){
        var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta){  
             data1 ={ id:id1};
    
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"Datos/eliminarPOA.php",     
        beforeSend:inicioEliminar,
        success:llegadaEliminarUnPOA,
        timeout:4000,
        error:problemas
    }); 
    return false;
        }
} 

 
    
        
         function consultaDePOAS(){
             data ={ ide:id                
        };
    
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/crearObjetivo.php",     
        beforeSend:inicioConsulta,
        success:llegadaConsultaPOAs,
        timeout:4000,
        error:problemas
    }); 
    return false;
} 

function inicioConsulta()
{
    var x=$("#contenedor");
    x.html('Cargando...');
}
function inicioEliminar()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}
function llegadaEliminarUnPOA()
{
    $("#contenedor2").load('Datos/eliminarPOA.php',data1);
}
function llegadaConsultaPOAs()
{
    $("#contenedor").load('pages/crearObjetivo.php',data);
}
function problemas()
{
    $("#contenedor").text('Problemas en el servidor.');
}


    
    </script>

</html>