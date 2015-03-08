<?php
$id= $_POST['ide'];



include '../Datos/conexion.php';
$query = mysql_query("SELECT indicadores.nombre as ind,objetivos_institucionales.definicion as obj,poa.nombre as poa FROM indicadores inner join objetivos_institucionales on indicadores.id_ObjetivosInsitucionales = objetivos_institucionales.id_Objetivo inner join poa on objetivos_institucionales.id_Poa=poa.id_Poa where indicadores.id_Indicadores='".$id."'",$enlace);
while($row = mysql_fetch_array($query))
        {
    $objetivo = $row['obj'];
    $indicador=$row['ind'];
    $poa=$row['poa'];
    //$idObj=$row['id_Objetivo'];
        }
        ?>








<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    
    <head>
    <meta charset="utf-8">
    <title></title>
    
    <link href="css/datepicker.css" rel="stylesheet">
	<style>
	.container {
		background: #fff;
	}
	#alert {
		display: none;
	}
	</style>
    <link href="css/prettify.css" rel="stylesheet">
    
    
    
    
    <script src="js/prettify.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
     
    <script>
        var id;
     var data;
      var id2;
     var data2;
     var data3;
 var x;
 x=$(document);
 x.ready(inicio);
 
    function inicio(){
        
        var x;
        x=$("#guardarActividad");
        x.click(guardarActividad);
        
        var x;
        x=$(".verActividad");
        x.click(verActividad);
        
       var x;
        x=$(".eliminarActividad");
        x.click(eliminarActividad);
    }
     function eliminarActividad(){
         var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta)
    {
            idac = $(this).parents("tr").find("td").eq(0).html();
               data3 ={idActividad:idac,idIndice:$("#idInd").val()};     
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"Datos/eliminarActividad.php", 
                beforeSend:inicioEliminar,
                success:llegadaEliminar,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
        }
        
        
        function verActividad(){
            id2 = $(this).parents("tr").find("td").eq(0).html();
              //alert(id);      
                data2 ={ ide:id2};     
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
        
        
         
        function guardarActividad() {
            var pnombre=$("#act").val(); 
            alert(pnombre);
            data ={ act:$("#act").val(),
                cor:$("#cor").val(),
                sup:$("#sup").val(),
                jus:$("#jus").val(),
                ver:$("#ver").val(),
                pob:$("#pob").val(),
                inicio:$("#dp1").val(),
                fin:$("#dp2").val(),
                id:$("#idInd").val()
            };
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"Datos/insertarActividad.php", 
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

            function inicioEliminar()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}

    function inicioEnvio()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}

function llegadaVer()
{
    $("#contenedor").load('pages/actividad.php',data2);
}

function llegadaEliminar()
{
    $("#contenedor2").load('Datos/eliminarActividad.php',data3);
}

function llegadaGuardar()
{
    $("#contenedor2").load('Datos/insertarActividad.php',data);
}

function problemas()
{
    $("#contenedor2").text('Problemas en el servidor.');
}


    </script>
	<script>
	if (top.location != location) {
    top.location.href = document.location.href ;
  }
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'yyyy-mm-dd',
                                autoclose: true,
                                todayBtn: true
			}).on('show', function() {
                            // Obtener valores actuales z-index de cada elemento
                           	var zIndexModal = $('#myModal').css('z-index');
                                var zIndexFecha = $('.datepicker').css('z-index');
                                //alert(zIndexModal + zIndexFEcha);
                                $('.datepicker').css('z-index',zIndexModal+1);
                            });
			$('#dp2').datepicker({
                                 language: "es",
				format: 'yyyy-mm-dd'
			});
			$('#dp3').datepicker();
			$('#dp3').datepicker();
			$('#dpYears').datepicker();
			$('#dpMonths').datepicker();
			
			
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,1,25);
			$('#dp4').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() > endDate.valueOf()){
						$('#alert').show().find('strong').text('The start date can not be greater then the end date');
					} else {
						$('#alert').hide();
						startDate = new Date(ev.date);
						$('#startDate').text($('#dp4').data('date'));
					}
					$('#dp4').datepicker('hide');
				});
			$('#dp5').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() < startDate.valueOf()){
						$('#alert').show().find('strong').text('The end date can not be less then the start date');
					} else {
						$('#alert').hide();
						endDate = new Date(ev.date);
						$('#endDate').text($('#dp5').data('date'));
					}
					$('#dp5').datepicker('hide');
				});

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
	</script>
	
</script>
<script type="text/javascript">
_uacct = "UA-106117-1";
urchinTracker();
</script>
    
    
    
    
    
    
    </head> 
    <body>
    
   <input type="hidden" id="idInd" value="<?php echo $id;?>">  
    
    <div class="col-lg-12">
        
        <div class="row"> 
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <h5><?php echo $poa;?> </h5>
                        </div>
                    </div>
            
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <h5><?php echo $objetivo;?> </h5>
                        </div>
                        
                        
                    </div>
            
            <div class="panel panel-green">
                        <div class="panel-heading">
                            <h5><?php echo $indicador;?> </h5>
                        </div>
                        
                        
                    </div>
            
            <div class="panel panel-default">               
                <div class="panel-heading">
                    Agregar Actividad
                </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <label >Nueva Actividad</label>
                                        </h4>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                           <div class="col-lg-8">
                                                <button class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                                    Nueva Actividad
                                                </button>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <label >Mis Actividades</label>
                                        </h4>
                                    </div>
                                    <div >
                                        <div id="contenedor2" class="panel-body">
                                            <?php 
                                            //include '../Datos/cargarIndicadores.php'; 
                                            
                                            
                                            
                                            
//include '../Datos/conexion.php';
// aqui falta aplicar el filtro para que solo carge los indicadores de un solo objetivo
$query = mysql_query("SELECT * FROM actividades where id_indicador='".$id."'",$enlace);
                                            ?>

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
                        <td><a type="button" class="verActividad btn btn-success">ver</a></td>
                        <td><button id="eliminar" type="button" class="eliminarActividad btn btn-success">eliminar</button></td>
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
                <h4 class="modal-title" id="myModalLabel">Nueva Actividad</h4>
            </div>
            <div class="modal-body">
               
                
                <div class="form-group">
                                                        <label>Descripcion Actividad</label>
                                                        <textarea id="act" class="form-control" rows="1"></textarea>
                                                    </div>
                <div class="form-group">
                                                        <label>Correlativo</label>
                                                        <textarea id="cor" class="form-control" rows="1"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Supuesto</label>
                                                        <textarea id="sup" class="form-control" rows="1"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Justificacion</label>
                                                        <textarea id="jus" class="form-control" rows="1"></textarea>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label>Medio De Verificacion</label>
                                                        <textarea id="ver" class="form-control" rows="1"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Poblacion Objetivo</label>
                                                        <textarea id="pob" class="form-control" rows="1"></textarea>
                                                    </div>
                
                <div class="form-group">
                    <label for="dtp_input2" class="col-md-2 control-label">Del</label>
                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-m-d" data-link-field="dtp_input2" data-link-format="yyyy-m-d">
                        <input type="text" class="form-control" size="5"  id="dp1" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <label for="dtp_input2" class="col-md-2 control-label">Al</label>
                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-m-d" data-link-field="dtp_input2" data-link-format="yyyy-m-d">
                        <input type="text" class="form-control" size="5"  id="dp2" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" /><br/>
                </div>
                
                                                    
                
                
                
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="guardarActividad" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>  
    
    
   
    
   

</body>
</html>

