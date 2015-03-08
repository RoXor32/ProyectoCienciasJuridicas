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

  $NroFolio = $_POST['idFolio'];

  require_once('datos/obtener_datos_folio.php');

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
                    <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
			
			<div class="content-wrapper">
        <!-- Content Header (Page header) -->
                <!-- Main content -->
				
				
                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="glyphicon glyphicon-list-alt"></i> Folio <?php echo $result['NroFolio']; ?>
                                <i class="fa fa-globe"></i> <?php echo $result['DescripcionPrioridad']; ?>
                                <small class="pull-right">Fecha de Entrada: <?php echo $result['FechaEntrada']; ?></small>
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <strong>Tipo de Folio: </strong> 
                            <?php 
                                if($result['TipoFolio'] == 0){
                                    echo "Folio de entrada";
                                }elseif($result['TipoFolio'] == 1){
                                    echo "Folio de salida";
                                }
                            ?>
                            <address>
                                <?php 
                                    if($result['NombreUnidadAcademica'] == null or $result['NombreUnidadAcademica'] == ""){
                                        echo "<strong>Organizacion referente: </strong>";  
                                        echo $result['NombreOrganizacion'];
                                    }elseif($result['NombreOrganizacion'] == null or $result['NombreOrganizacion'] == ""){
                                        echo "<strong>Unidad Academica referente: </strong>";  
                                        echo $result['NombreUnidadAcademica'];
                                    }
                                ?><br>
                                <strong>Persona referente al folio: </strong><?php echo $result['PersonaReferente']; ?><br>
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Fecha de creacion del folio: </b> <?php echo $result['FechaCreacion']; ?><br/>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <hr>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <p class="lead">Descripcion: </p>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            <?php echo $result['DescripcionAsunto']; ?>
                            </p>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                            <p class="lead">Ubicacion fisica en archivo</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:35%">Ubicacion </th>
                                        <td><?php echo $result['DescripcionUbicacionFisica']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-primary pull-right" ><i class="glyphicon glyphicon-save-file"></i> Modificar datos</button>
                        </div>
                    </div>
                </section><!-- /.content -->
			</div>
				<section class="content">
				    <?php
					    require_once("seguimiento.php");
					?>
				</section>
            </aside><!-- /.right-side -->
    </div><!--/col-span-10-->

</div>
</div>
<!-- /Main -->

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>
