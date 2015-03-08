<?php
$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\ProyectoIS\ModuloCurricular\Datos\Conexion.php";


$id= $_POST['idClase'];


    
    $query = mysql_query("SELECT * FROM clases");
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
                <tr >
                    <td><strong><center>ID Clase</center></strong></td>
                    <td><strong><center>Nombre Clase</strong></td>
                    <td><strong><center>Eliminar</strong></center></td>
                    <td><strong><center>Actualizar</strong></center></td>

                </tr>
            </thead>
            <tbody>
                 <?php
                while ($row = mysql_fetch_array($query)) {
                    $id = $row['ID_Clases'];
                    ?>
                    <tr>
                        <td><?php echo $row['ID_Clases'] ?></td>
                        <td><div class="text" id="nombre-<?php echo $id ?>"><?php echo $row['Clase'] ?></div></td>


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

///esta parte selecciona el Poa que se quiere ver 
            $(document).ready(function(){
                fn_dar_eliminar();               
            });
			
			
            
            
            
            function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    consulta();
                    
                });
            };

//// en esta parte implemeta el ajax


 
    
        
         function consulta(){
             data ={ ide:id                
        };
    
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/crearIndicador.php",     
        beforeSend:inicioEnvio,
        success:llegadaGuardar,
        timeout:4000,
        error:problemas
    }); 
    return false;
} 

function inicioEnvio()
{
    var x=$("#contenedor");
    x.html('Cargando...');
}

function llegadaGuardar()
{
    $("#contenedor").load('pages/crearIndicador.php',data);
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

