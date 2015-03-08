<?php

  $maindir = "../../../";

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

  $adId_UbicacionArchivoFisico = $_POST['Id_UbicacionArchivoFisico'];

  try{
    $sql = "SELECT * FROM ubicacion_archivofisico WHERE Id_UbicacionArchivoFisico = :adId_UbicacionArchivoFisico";

    $query = $db->prepare($sql);
    $query->bindParam(":adId_UbicacionArchivoFisico",$adId_UbicacionArchivoFisico);
    $query->execute();
    $result = $query->fetch();
    $query = null;
    $db = null;
  }catch(PDOExecption $e){

  }

?>

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

                <!-- Content Header (Page header) -->
                <section class="content-header no-margin">
                    <h1 class="text-center">
                        Mantenimiento de Datos
                    </h1>
                </section>

  <div class="table-responsive">
	<table border="1" class='table table-bordered table-hover'>
        <thead>
            <tr>
                <th>Id_UbicacionArchivoFisico</th>
                <th>DescripcionUbicacionFisica</th>
                <th>Capacidad</th>
				<th>TotalIngresados</th>
				<th>HabilitadoParaAlmacenar</th>
				<th>Actualizacion</th>        
            </tr>
        </thead>
        <tbody>
            <tr><form action='#'>
			    <td><p id="Id_UbicacionArchivoFisico"><?php echo $result['Id_UbicacionArchivoFisico']; ?></p></td>
				<td><input name='DescripcionUbicacionFisica' id="DescripcionUbicacionFisica" type ='text' value="<?php echo htmlentities($result['DescripcionUbicacionFisica']); ?>" placeholder="<?php echo htmlentities($result['DescripcionUbicacionFisica']); ?>" ></td>
				<td><input name='Capacidad' id="Capacidad" type ='text' value="<?php echo htmlentities($result['Capacidad']); ?>" placeholder="<?php echo htmlentities($result['Capacidad']); ?>" ></td>
				<td><input name='TotalIngresados' id="TotalIngresados" type ='text' value="<?php echo htmlentities($result['TotalIngresados']); ?>" placeholder="<?php echo htmlentities($result['TotalIngresados']); ?>" ></td>
				<td><input name='HabilitadoParaAlmacenar' id="HabilitadoParaAlmacenar" type ='text' value="<?php echo htmlentities($result['HabilitadoParaAlmacenar']); ?>" placeholder="<?php echo htmlentities($result['HabilitadoParaAlmacenar']); ?>" ></td>
               <td> <button type="button" id="actulizar_ubicacion_archivofisico" data-id=<?php echo $result['Id_UbicacionArchivoFisico']; ?> class="btn btn-primary pull-left">Actualizar</button></td>
             </form>			
            </tr>
        </tbody>
    </table>
                
  </div><!-- /.table-responsive -->	

    </section><!-- /.content -->
    </div><!-- /col-10 -->                
  </div><!-- end row -->
</div><!-- end container fluid -->

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

<script type="text/javascript">
    $(".btn-primary").on('click',function(){
            id = $(this).data('id');
      data={
            Id_UbicacionArchivoFisico:id,
            DescripcionUbicacionFisica:$("#DescripcionUbicacionFisica").val(),
            Capacidad:$("#Capacidad").val(),
			TotalIngresados:$("#TotalIngresados").val(),
			HabilitadoParaAlmacenar:$("#HabilitadoParaAlmacenar").val(),
            tipoProcedimiento:"actualizar_"
          };
          $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_ubicacion_archivofisico.php", 
                success:actualizarUbicacionArchivoFisicoFinalizado,
                timeout:4000
          }); 
          return false;
    });

    function actualizarUbicacionArchivoFisicoFinalizado(){
            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_ubicacion_archivofisico.php',data);
    }
</script>

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>
