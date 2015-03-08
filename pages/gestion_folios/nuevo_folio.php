<?php

  $maindir = "../../";

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");
  
  if(isset($_GET['contenido']))
  {
    $contenido = $_GET['contenido'];
  }
else
  {
    $contenido = 'gestion_de_folios';
  }
  
require_once($maindir.'pages/navbar.php');

require_once($maindir."conexion/conn.php"); 
$conexion = mysqli_connect($host,$username, $password, $dbname);

$query = "SELECT * FROM unidad_academica";
$result = mysqli_query($conexion, $query);

$query2 = "SELECT * FROM organizacion";
$result2 = mysqli_query($conexion, $query2);

$query3 = "SELECT * FROM ubicacion_archivofisico";
$result3 = mysqli_query($conexion, $query3);

$query4 = "SELECT * FROM prioridad";
$result4 = mysqli_query($conexion, $query4);

$query5 = "SELECT * FROM ubicacion_archivofisico";
$result5 = mysqli_query($conexion, $query5);
?>

<link href="css/datepicker.css" rel="stylesheet">
<link href="css/prettify.css" rel="stylesheet">
   
<script src="js/prettify.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

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

<!-- Main -->
<div class="container-fluid">
<div class="row">
  <div class="col-sm-2">
      <!-- Left column -->
      
      <ul class="list-unstyled">
        <li class="nav-header"> <a id="gestion_folios" href="#"><i class="glyphicon glyphicon-home"></i> Inicio </a></li>
        <hr>

        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Manejo de folios<i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="userMenu">
                
                <li><a id="folios" href="#"><i class="glyphicon glyphicon-book"></i> Folios
                  <!-- <span class="badge badge-info">4</span>--></a></li>
                <li><a id="alertas "href="#"><i class="glyphicon glyphicon-bell"></i> Alertas 
                  <!-- <span class="badge badge-info">10</span>--></a></li>
                <li><a id="notificaciones" href="#"><i class="glyphicon glyphicon-flag"></i> Notificaciones
                  <!-- <span class="badge badge-info">6</span>--></a></li>
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
          <h5>Mantenimiento <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu2">
                <li><a id="mantenimiento_organizacion" href="#">Mantenimiento de Organizacion</a>
                </li>
                <li><a id="mantenimiento_unidadacademica" href="#">Mantenimiento de unidad academica</a>
                </li>
                <li><a id="mantenimiento_prioridad"href="#">Mantenimiento de prioridad</a>
                </li>
				<li><a id="mantenimiento_ubicacionfisica"href="#">Mantenimiento de ubicacion fisica</a>
                </li>			
            </ul>
        </li>
      </ul>
           
      <hr>

    </div><!-- /col-2 -->
    <div class="col-sm-10">
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-9">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Datos del folio</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" id="form1" name="form1" action="#">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Numero del folio</span>
                                                <input type="text" name="NroFolio" class="form-control" id="NroFolio" placeholder="Folio" title="Completa este campo" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Fecha de creacion del folio:</span>
                                                <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-m-d" data-link-field="dtp_input2" data-link-format="yyyy-m-d">
                                                    <input type="text" class="form-control" size="5"  id="dp1" required>
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>   
                                            </div>            
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Persona referente</span>
                                                <input type="text" name="personaReferente" class="form-control" id="personaReferente" placeholder="Persona Referente" title="Completa este campo" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Unidad Academica</span>
                                                <select id="unidadAcademica" class="form-control" name="unidadAcademica">
                                                <option value=-1> -- Seleccione -- </option>>
                                            <?php while($filas = mysqli_fetch_assoc($result)) { ?>
                                            <option value="<?php echo $filas["Id_UnidadAcademica"];?>"><?php echo $filas["NombreUnidadAcademica"];?></option><?php } 
                                            mysqli_free_result($result); ?></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Entrada o salida ?</span>
                                                <select id="TipoFolio" class="form-control" name="TipoFolio">
                                                    <option value=-1> -- Seleccione -- </option>
                                                    <option value=0>Entrada</option>
                                                    <option value=1>Salida</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Organizacion</span>
                                                <select id="Organizacion" class="form-control"name="Organizacion" >
                                                <option value=-1> -- Seleccione -- </option>
                                            <?php while($filas = mysqli_fetch_assoc($result2)) { ?>
                                            <option value="<?php echo $filas["Id_Organizacion"];?>"><?php echo $filas["NombreOrganizacion"];?></option><?php } 
                                            mysqli_free_result($result2); ?></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Descripcion</span>
                                                <textarea id="Descripcion" class="form-control" name="Descripcion" rows="3" placeholder="Ingrese una descripcion..." title="Completa este campo" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon">Ubicacion fisica de entrada</span>
                                            <select id="ubicacionFisica"class="form-control"name="ubicacionFisica" >
                                                <option value=-1> -- Seleccione -- </option>
                                            <?php while($filas = mysqli_fetch_assoc($result3)) { ?>
                                            <option value="<?php echo $filas["Id_UbicacionArchivoFisico"];?>"><?php echo $filas["DescripcionUbicacionFisica"];?></option><?php } 
                                            mysqli_free_result($result3); ?></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon">Prioridad</span>
                                            <select id="Prioridad" class="form-control"name="Prioridad" >
                                                <option value=-1> -- Seleccione -- </option>
                                            <?php while($filas = mysqli_fetch_assoc($result4)) { ?>
                                            <option value="<?php echo $filas["Id_Prioridad"];?>"><?php echo $filas["DescripcionPrioridad"];?></option><?php } 
                                            mysqli_free_result($result4); mysqli_close($conexion); ?></select>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                        </div><!--/.col (left) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </div><!--/col-span-10-->

</div>
</div>
<!-- /Main -->

<script type='text/javascript'>
        
  $(document).ready(function() {
    $(".alert").addClass("in").fadeOut(4500);
/* swap open/close side menu icons */
      $('[data-toggle=collapse]').click(function(){
      // toggle icon
        $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
      });  
  });
        
</script>

<script type="text/javascript" src="js/gestion_folios/crear_folio.js" ></script>

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>
