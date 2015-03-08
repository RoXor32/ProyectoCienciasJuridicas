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
  
  require_once($maindir.'pages/navbar.php');

  require_once("datos/datos_ultimos_cinco_folios.php");

?>

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
				<li><a id="mantenimiento_ubicacionArchivoFisico"href="#">Mantenimiento de ubicacion fisica</a>
                </li>			
            </ul>
        </li>
      </ul>
           
      <hr>

    </div><!-- /col-2 -->
    <div class="col-sm-10">
      <section class="content">
        <h2>Gestion de folios</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Alertas</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-condensed">
                                        <tr>
                                            <th style="width: 10px">Folio</th>
                                            <th>Prioridad</th>
                                            <th>Fecha alerta</th>
                                            <th style="width: 40px">Seguimiento</th>
                                        </tr>
                                        <tr class="danger">
                                            <td>1.</td>
                                            <td>Update software</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">55%</span></td>
                                        </tr>
                                        <tr class="warning">
                                            <td>2.</td>
                                            <td>Clean database</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">70%</span></td>
                                        </tr>
                                        <tr class="info">
                                            <td>3.</td>
                                            <td>Cron job running</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-blue">30%</span></td>
                                        </tr>
                                        <tr class="danger">
                                            <td>4.</td>
                                            <td>Fix and squish bugs</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">90%</span></td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->           
          </div>
          <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Notificaciones</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-condensed">
                                        <tr>
                                            <th style="width: 10px">Folio</th>
                                            <th>Enviado por</th>
                                            <th>Titulo</th>
                                            <th style="width: 40px">Fecha</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Update software</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-red">55%</span></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Clean database</td>
                                            <td>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-yellow">70%</span></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Cron job running</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-blue">30%</span></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Fix and squish bugs</td>
                                            <td>
                                                <div class="progress xs progress-striped active">
                                                    <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-green">90%</span></td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
        </div>
        <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Folios</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Folio</th>
                                            <th>Tipo de folio</th>
                                            <th>Fecha</th>
                                            <th>Prioridad</th>
                                            <th>Seguimiento</th>
                                        </tr>
                                        <?php
                                        if($folios == 1){
                                            foreach ($rows as $row) {

                                                $NroFolio = $row['NroFolio'];
                                                $Prioridad = $row['Prioridad'];
                                                $DescripcionPrioridad = $row['DescripcionPrioridad'];
                                                $EstadoSeguimiento = $row['EstadoSeguimiento'];
                                                $DescripcionEstadoSeguimiento = $row['DescripcionEstadoSeguimiento'];
                                                $FechaEntrada = $row['FechaEntrada'];
                                                $TipoFolio = $row['TipoFolio'];

                                                echo "<tr data-id='".$NroFolio."''>";
                                                echo "<td>".$NroFolio."</td>";
                                                if($TipoFolio == 1){
                                                    echo "<td> Entrada </td>";
                                                }else{
                                                    echo "<td> Salida </td>";
                                                }
                                                echo "<td>".$FechaEntrada."</td>";
                                                if( $Prioridad == 1){
                                                    echo "<td><span class='label label-primary'>".$DescripcionPrioridad."</span></td>";
                                                }elseif( $Prioridad == 2 ){
                                                    echo "<td><span class='label label-warning'>".$DescripcionPrioridad."</span></td>";
                                                }elseif( $Prioridad == 3 ){
                                                    echo "<td><span class='label label-danger'>".$DescripcionPrioridad."</span></td>";
                                                }
                                                echo "<td>".$DescripcionEstadoSeguimiento."</td>";
                                                echo "</tr>";
                                            }                                        
                                        }elseif($folios == 0){
                                            echo "<tr>";
                                            echo "<td>No hay ningun folio</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
      </section><!-- /.content -->
    </div>
    </div><!--/col-span-10-->

</div><!-- /Main -->

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

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>
