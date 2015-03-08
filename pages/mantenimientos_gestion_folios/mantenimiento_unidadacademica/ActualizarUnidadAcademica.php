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

  $adId_UnidadAcademica= $_POST['Id_UnidadAcademica'];

  try{
    $sql = "SELECT * FROM unidad_academica WHERE Id_UnidadAcademica =:adId_UnidadAcademica";

    $query = $db->prepare($sql);
    $query->bindParam(":adId_UnidadAcademica",$adId_UnidadAcademica);
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
				<li><a id="mantenimiento_ubicacionfisica"href="#">Mantenimiento de ubicacion fisica</a>
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
                <th>ID_UnidadAcademica</th>
                <th>NombreUnidadAcademica</th>
                <th>UbicacionUnidadAcademica</th>
				<th>Actualizacion</th>        
            </tr>
        </thead>
        <tbody>
            <tr><form action='#'>
			    <td><p id="Id_UnidadAcademica"><?php echo $result['Id_UnidadAcademica']; ?></p></td>
				<td><input name='NombreUnidadAcademica' id="NombreUnidadAcademica" type ='text' value="<?php echo htmlentities($result['NombreUnidadAcademica']); ?>" placeholder="<?php echo htmlentities($result['NombreUnidadAcademica']); ?>" ></td>
				<td><input name='UbicacionUnidadAcademica' id="UbicacionUnidadAcademica" type ='text' value="<?php echo htmlentities($result['UbicacionUnidadAcademica']); ?>" placeholder="<?php echo htmlentities($result['UbicacionUnidadAcademica']); ?>" ></td>
               <td> <button type="button" id="actulizar_unidadacademica" data-id=<?php echo $result['Id_UnidadAcademica']; ?> class="btn btn-primary pull-left">Actualizar</button></td>
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
            NombreUnidadAcademica=$("#NombreUnidadAcademica").val();
            UbicacionUnidadAcademica=$("#UbicacionUnidadAcademica").val();
      data={
            Id_UnidadAcademica:id,
            NombreUnidadAcademica:$("#NombreUnidadAcademica").val(),
            UbicacionUnidadAcademica:$("#UbicacionUnidadAcademica").val(),
            tipoProcedimiento:"actualizar_"
          };
          $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_unidadacademica.php", 
                success:actualizarUnidadAcademicaFinalizado,
                timeout:4000,
          }); 
          return false;
    });

    function actualizarUnidadAcademicaFinalizado(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_unidadacademica.php',data);
    }
</script>

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>
