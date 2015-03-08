<?php

  $maindir = "../../";

  if(isset($_GET['contenido']))
  {
    $contenido = $_GET['contenido'];
  }
  else
  {
    $contenido = 'gestion_de_folios';
  }

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");
  

?>

<?php $idusuario= $_SESSION['user_id']; ?> 

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">

<script type="text/javascript" src="../sl/jquery-2.1.3.js"></script>
<script language="javascript" type="text/javascript"></script>

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
				<h1 class="page-header">Solicitud</h1>
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
									<form id="formulario">
                                            <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form" Id="nombre" type="text" name="nombre" >
											</div>
											
											<div class="form-group">
                                            <label>Unidad Académica</label>                                            
											<select class="form-control" Id="area" name="area">
                                                <?php
												//		$bd = 'test8'; 
												//$conexion = mysqli_connect('localhost', 'root', '123', $bd);
												require_once("conexion.php");
												$rec = mysql_query("SELECT descripcion from tbl_unidad_academica", $enlace);
												while($row=mysql_fetch_array($rec))
												{
													echo "<option>";
													echo $row['descripcion'];
													echo "</option>";
												}/*
													require_once("conexion.php");
													$rec = mysqli_query($conexion, "SELECT descripcion from tbl_unidad_academica");
													while($row=mysqli_fetch_array($rec))
													{
														echo "<option>";
														echo $row['descripcion'];
														echo "</option>";
													}*/
												?>												
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Solicito permiso por motivo de</label>
											<select class="form-control" Id="motivo" name="motivo">
												<?php
													//$bd = 'test8'; 
													//$conexion = mysqli_connect('localhost', 'root', '123', $bd);
													require_once("conexion.php");
													$rec1 = mysql_query("SELECT descripcion from tbl_motivos", $enlace);
													while($row=mysql_fetch_array($rec1))
													{
														echo "<option>";
														echo $row['descripcion'];
														echo "</option>";
													}
												?>
												
												<?php /*
													require_once("conexion.php");
													$rec1 = mysqli_query($conexion, "SELECT descripcion from tbl_motivos");
													while($row=mysqli_fetch_array($rec1))
													{
														echo "<option>";
														echo $row['descripcion'];
														echo "</option>";
													}*/													
												?>
												
											</select>                                       
										</div>
										<div class="form-group">
                                            <label>Edificio donde tiene registrada su asistencia</label>
											<select class="form-control" Id="edificio" name="edificio">
												<?php
													//$bd = 'test8'; 
													//$conexion = mysqli_connect('localhost', 'root', '123', $bd);
													require_once("conexion.php");
													$rec2 = mysql_query("SELECT descripcion from tbl_edificios", $enlace);
													while($row=mysql_fetch_array($rec2))
													{
														echo "<option>";
														echo $row['descripcion'];
														echo "</option>";
													}
													mysql_close($conexion);
												
													/*
													require_once("conexion.php");
													$rec2 = mysqli_query($conexion, "SELECT descripcion from tbl_edificios");
													while($row=mysqli_fetch_array($rec2))
													{
														echo "<option>";
														echo $row['descripcion'];
														echo "</option>";
													}
													mysqli_close($conexion);*/
												?>
											</select>                                       
										</div>
										<div>
											<label>Cantidad de dias:</label>											 
											<!--Date: <input type="text" id="datepicker" name="datepicker" ></p-->
											<p> <input type="number" id="cantidad" name="cantidad" min="0" max="5" ></p>
										</div>
										<div>
											  <label>Fecha</label>
										<!--Date: <input type="text" id="datepicker" name="datepicker" ></p-->
										<p> <input type="date" id="fecha" name="datepicker" ></p>									
										</div>
										<div>
											<label>Hora Inicio</label>											
												<input type="time" name="horai" min=9:00 max=17:00 step=900 id="horai" val="1:00 pm">
										</div>
										<div>
											<label>Hora Finalización</label>
											<input type="time" name="horaf" min=9:00 max=17:00 step=900 id="horaf" val="2:00 pm">									
										</div>
										
										<input id="bt" class="btn btn-primary" type="submit"  value="Enviar Solicitud" /></td>
                                     
                                    </form>
									<span></span>
								</div>
								<div id="destino"> </div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</body>

<script type="text/javascript" src="../SistemaCienciasJuridicas/js/jquery-2.1.3.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
		$("form").submit(function(e){
		e.preventDefault();
		
		var idusuario="<?php echo $idusuario; ?>" ;
		var nombre=$('input:text[name=nombre]').val();
		var area=$('select[name=area]').val();
	    var  motivo=$('select[name=motivo]').val();
	   	var edificio=$('select[name=edificio]').val();
	
		var horaf= $( "#horaf" ).val();
		var horai= $( "#horai" ).val();
		var fecha= $( "#fecha" ).val();
		var cantidad= $("#cantidad" ).val();
	     
		 $.post("../pages/permisos/Isolicitud.php",{name:nombre,area: area,motivo:motivo,edificio:edificio,fecha:fecha,fecha:fecha,horai:horai,horaf:horaf,cantidad:cantidad,idusuario:idusuario},llegadaDatos)

		 .done(function() {
			
				 $("#r").html( "La solicitud se ha completado correctamente." );
				 
		 })
		 .fail(function() {
			
				 $("#r").html( "La solicitud a fallado: " );
	    });
	})
	
})

function llegadaDatos(datos)
{
	//$( "#nombre" ).val(datos);
	 //$("#r").html( Datos );

 // alert(datos);
 // $('span').php(datos);
 //  $('span').html( "La solicitud se ha completado correctamente." );
  		
}

</script>



</html>
										