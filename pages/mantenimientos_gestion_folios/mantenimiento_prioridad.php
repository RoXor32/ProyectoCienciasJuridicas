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

  require_once($maindir."conexion/config.inc.php");

  if(isset($_POST['tipoProcedimiento'])){
    $tipoProcedimiento =  $_POST['tipoProcedimiento'];
    if($tipoProcedimiento == 'insertar'){
      require_once("mantenimiento_prioridad/InsertarPrioridad.php");
    }elseif($tipoProcedimiento == 'actualizar_'){
      require_once("mantenimiento_prioridad/ActualizarPrioridadCodigo.php");
    }elseif($tipoProcedimiento == 'eliminar'){
      require_once("mantenimiento_prioridad/EliminarPrioridad.php");
    }
  }

  $query = $db->prepare("SELECT * FROM prioridad");
  $query->execute();
    $rows = $query->fetchAll();
        if($rows){
            $prioridad = 1;
        }else{
            $prioridad = 0;
        }
    $query = null;
    $db = null;

?>

<!-- Script para inicializar el funcionamiento de la tabla -->
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#tabla_prioridad').dataTable(); // example es el id de la tabla
  } );
</script>

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
 
<?php
 
  if(isset($codMensaje) and isset($mensaje)){
    if($codMensaje == 1){
      echo '<div class="alert alert-success">';
      echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
      echo '<strong>Exito! </strong>';
      echo $mensaje;
      echo '</div>';
    }else{
      echo '<div class="alert alert-danger">';
      echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
      echo '<strong>Error! </strong>';
      echo $mensaje;
      echo '</div>';
    }
  } 

?>

      <div class="box-header">
        <h3 class="box-title">Mantenimiento de la tabla prioridad <a class="btn btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i>Insertar</a></h3>
      </div><!-- /.box-header -->

      <div class="box-body table-responsive">
      <table id="tabla_prioridad" class='table table-bordered table-striped'>
        <thead>
            <tr>
              <th>Id_Prioridad</th>
              <th>DescripcionPrioridad</th>
              <th>Actualizacion</th>
              <th>Eliminacion</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($rows as $row) {   
            $Id_Prioridad = $row['Id_Prioridad'];
        ?>
        
            <tr>
               <td><?php echo $row['Id_Prioridad']; ?></td>
                <td><?php echo $row['DescripcionPrioridad']; ?></td>
<?php

echo '<td><a class="btn btn-block btn-primary" data-mode="actualizar" data-id="'.$Id_Prioridad.'" href="#">Actualizar</a></td>';
echo '<td><a class="btn btn-block btn-primary" data-mode="eliminar" data-id="'.$Id_Prioridad.'" href="#"></i>Eliminar</a></td>';

?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
 
    </section><!-- /.content -->
    </div><!-- /col-10 -->                
  </div><!-- end row -->
</div><!-- end container fluid -->

<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-disk"></i> Insertar una nueva prioridad</h4>
      </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Descripcion de la prioridad</span>
                <input name="DescripcionPrioridad" id="Insertar_DescripcionPrioridad" type="text" class="form-control" placeholder="DescripcionPrioridad">
              </div>
            </div>      
          </div> 
          <div class="modal-footer clearfix">
            <button type="button" name="submit" id="nueva_prioridad" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i> Insertar</button>
          </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(".btn-primary").on('click',function(){
        mode = $(this).data('mode');
        id = $(this).data('id');
        if(mode == "actualizar"){
          data={
            Id_Prioridad:id,
            tipoProcedimiento:"actualizar"
          };
          $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_prioridad/ActualizarPrioridad.php", 
                success:actualizarPrioridad,
                timeout:4000,
                error:problemas
          }); 
          return false;
        }else if(mode == "eliminar"){
          data={
            Id_Prioridad:id,
            tipoProcedimiento:"eliminar"
          };
          if (confirm('Esta seguro que desea eliminar este registro?')) {
          $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_prioridad.php", 
                success:eliminarPrioridad,
                timeout:4000,
                error:problemas
          }); 
          }
          return false;
        }
    });

    function eliminarPrioridad(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_prioridad.php',data);
    }
    function actualizarPrioridad(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_prioridad/ActualizarPrioridad.php',data);
    }
</script>

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

<!-- Script necesario para que la tabla se ajuste a el tamanio de la pag-->
<script type="text/javascript">
  // For demo to fit into DataTables site builder...
  $('#tabla_prioridad')
    .removeClass( 'display' )
    .addClass('table table-striped table-bordered');
</script>

<script type="text/javascript">
    function ValidaSoloNumeros() {
      if ((event.keyCode < 48) || (event.keyCode > 57)) 
        event.returnValue = false;
      }
</script>

<script type="text/javascript" src="js/gestion_folios/mantenimiento_prioridad.js" ></script>

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>
