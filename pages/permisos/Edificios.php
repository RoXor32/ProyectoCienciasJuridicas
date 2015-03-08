<?php
include 'conexion.php';

$query = mysql_query("SELECT * FROM tbl_edificios", $enlace);
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
</head>

<body>
	<div id="wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edificios</h1>
                </div>
                <!-- /.col-lg-12 -->
			</div>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Llene los campos con la información solicitada
                        </div>
						<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="#", method ="GET">
                                        <div class="form-group">
                                            <label>Nombre Edificio</label>
                                            <input id = "nmedificio" class="form-control" name ="edificio">
                                        </div>
										
                                        <button id = "guardarEdificio" class="btn btn-default">Agregar</button>
										
										
                                        <button type="reset" class="btn btn-default">Cancelar</button><br><br>
										
										<table class="table table-bordered">
											<tr class="well">
											<td><strong>Id_Edificio</strong></td>
											<td><strong>Edificio</strong></td>
											<td><strong>Eliminar</strong></td>
											</tr>
											<?php
												require_once("conexion.php");
												if(isset($_GET['Id_Edificio'])){
													$id=$_GET['Id_Edificio'];	
													mysql_query($conexion, "DELETE FROM tbl_edificios
													WHERE Edificio_ID='$id'");	
													//echo mensajes('Motivo"'.$id.'" Eliminado con Exito','verde');	
												}
											?>
											<?php
												//require_once("conexion.php");
												//$pame=mysqli_query($conexion, "SELECT * FROM tbl_edificios");
												while($row=mysql_fetch_array($query)){
											?>
											
											<tr>
											<td><?php echo $row['Edificio_ID']; ?></td>
											<td><?php echo $row['descripcion']; ?></td>
											<td>
												<center>                   
												<form action="" method='GET' >						
													<button type="submit"  name="Id_Edificio" value= <?php echo $row['Edificio_ID']; ?>> Eliminar </button>
												</form>
												</center>
											</td> 
											</tr>
											
											<?php } ?>
										</table>
									</form>
								</div>
							</div>				
						</div>					
					</div>						
				</div>							
			</div>								
	</div>									
	
</body>


<script>
 var id;
 var data;
 var x;
 x=$(document);
 x.ready(inicio);
 
    function inicio(){
        var x;
        x=$("#guardarEdificio");
        x.click(consultaEdificio);
        
        var x;
        x=$(".eliminar");
        x.click(ver);
	}
	
	function consultaEdificio() {
            var dedificio=$("#nmedificio").val(); 
            //alert(dmotivo);
            data ={ dedificio:$("#nmedificio").val()};
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/permisos/insertarEdificios.php", 
                beforeSend:inicioEnvio,
                success:llegadaGuardar,
                timeout:4000,
                error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }
            }); 
            return false;
    }
	
	function inicioEnvio(){
    var x=$("#contenedor");
    x.html('Cargando...');
	}
	
	function llegadaGuardar(){
		$("#contenedor").load('pages/permisos/insertarEdificios.php', data);
	}
	
	function problemas()
	{
    $("#contenedor").text('Problemas en el servidor.');
	}

	
</script>

</html>	
											
											
											
											
											
										
										
										
										