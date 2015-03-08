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

   $user = $_SESSION['nombreUsuario'];


  if(isset($_POST['tipoProcedimiento'])){
    $tipoProcedimiento =  $_POST['tipoProcedimiento'];
    if($tipoProcedimiento == 'insertar'){
      require_once("gestion_de_folios/Enviar_notificacion.php");
    }
  }


$query2 = $db->prepare( "SELECT NroFolio  FROM folios");
$query2->execute();
$filas = $query2->fetchAll();
        if($filas){
            //$number_of_rows = $rows->rowCount();
            $folio = 1;
        }else{
            $numero_filas = 0;
            $notificacion = 0;
        }
    $query2 = null;
    

//Consulta para cargar los usuarios al combobox
$query3 = $db->prepare("SELECT * FROM usuario");
$query3->execute();
$filas2 = $query3->fetchAll();
        if($filas2){
            //$number_of_rows = $rows->rowCount();
            $usuario= 1;
        }else{
            $numero_filas = 0;
            $notificacion = 0;
        }
    $query3 = null;

 //Consulta para ver el idUsuario   
$query5 = $db->prepare( "SELECT *  FROM usuario WHERE nombre ='".$user."'");
$query5->execute();
$filas3 = $query5->fetchAll();
foreach( $filas3 as $row ){ 
     
            $usuario2 = $row['id_Usuario'];
            }


//Consulta para ver las notificaciones Enviadas
  $query = $db->prepare("SELECT NroFolio,Titulo,FechaCreacion FROM notificaciones_folios WHERE IdEmisor=(SELECT id_Usuario FROM usuario WHERE nombre='".$user."')");
    $query->execute();
    $rows = $query->fetchAll();
        if($rows){
            //$number_of_rows = $rows->rowCount();
            $notificacion = 1;
        }else{
            $number_of_rows = 0;
            $notificacion = 0;
        }
    $query = null;
    

//Consulta para ver las notificaciones Recibidas
 $query4 = $db->prepare("SELECT NroFolio,Titulo,FechaCreacion FROM notificaciones_folios WHERE Id_Notificacion=(SELECT Id_Notificacion from usuario_notificado WHERE Id_Usuario=(SELECT id_Usuario from usuario where nombre ='".$user."'))");
    $query4->execute();
    $rows2 = $query4->fetchAll();
        if($rows2){
            //$number_of_rows = $rows->rowCount();
            $notificacion = 1;
        }else{
            $number_of_rows = 0;
            $notificacion = 0;
        }
    $query4 = null;


?>
<!-- Script para inicializar el funcionamiento de la tabla -->
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#tabla_notificaciones').dataTable(); // example es el id de la tabla
  } );
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
				<li><a id="mantenimiento_ubicacionArchivoFisico"href="#">Mantenimiento de ubicacion fisica</a>
                </li>			
            </ul>
        </li>
      </ul>
           
      <hr>

    </div><!-- /col-2 -->
    <div class="col-sm-10">

<!--
          <div class="container">

<table id="example" class="display" cellspacing="0" width="100%"><thead><tr><th>Name</th><th>Position</th><th>Office</th><th>Salary</th></tr></thead><tbody><tr><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>$320,800</td></tr><tr><td>Garrett Winters</td><td>Accountant</td><td>Tokyo</td><td>$170,750</td></tr><tr><td>Ashton Cox</td><td>Junior Technical Author</td><td>San Francisco</td><td>$86,000</td></tr><tr><td>Cedric Kelly</td><td>Senior Javascript Developer</td><td>Edinburgh</td><td>$433,060</td></tr><tr><td>Airi Satou</td><td>Accountant</td><td>Tokyo</td><td>$162,700</td></tr><tr><td>Brielle Williamson</td><td>Integration Specialist</td><td>New York</td><td>$372,000</td></tr><tr><td>Herrod Chandler</td><td>Sales Assistant</td><td>San Francisco</td><td>$137,500</td></tr><tr><td>Rhona Davidson</td><td>Integration Specialist</td><td>Tokyo</td><td>$327,900</td></tr><tr><td>Colleen Hurst</td><td>Javascript Developer</td><td>San Francisco</td><td>$205,500</td></tr><tr><td>Sonya Frost</td><td>Software Engineer</td><td>Edinburgh</td><td>$103,600</td></tr><tr><td>Jena Gaines</td><td>Office Manager</td><td>London</td><td>$90,560</td></tr><tr><td>Quinn Flynn</td><td>Support Lead</td><td>Edinburgh</td><td>$342,000</td></tr><tr><td>Charde Marshall</td><td>Regional Director</td><td>San Francisco</td><td>$470,600</td></tr><tr><td>Haley Kennedy</td><td>Senior Marketing Designer</td><td>London</td><td>$313,500</td></tr><tr><td>Tatyana Fitzpatrick</td><td>Regional Director</td><td>London</td><td>$385,750</td></tr><tr><td>Michael Silva</td><td>Marketing Designer</td><td>London</td><td>$198,500</td></tr><tr><td>Paul Byrd</td><td>Chief Financial Officer (CFO)</td><td>New York</td><td>$725,000</td></tr><tr><td>Gloria Little</td><td>Systems Administrator</td><td>New York</td><td>$237,500</td></tr><tr><td>Bradley Greer</td><td>Software Engineer</td><td>London</td><td>$132,000</td></tr><tr><td>Dai Rios</td><td>Personnel Lead</td><td>Edinburgh</td><td>$217,500</td></tr><tr><td>Jenette Caldwell</td><td>Development Lead</td><td>New York</td><td>$345,000</td></tr><tr><td>Yuri Berry</td><td>Chief Marketing Officer (CMO)</td><td>New York</td><td>$675,000</td></tr><tr><td>Caesar Vance</td><td>Pre-Sales Support</td><td>New York</td><td>$106,450</td></tr><tr><td>Doris Wilder</td><td>Sales Assistant</td><td>Sidney</td><td>$85,600</td></tr><tr><td>Angelica Ramos</td><td>Chief Executive Officer (CEO)</td><td>London</td><td>$1,200,000</td></tr><tr><td>Gavin Joyce</td><td>Developer</td><td>Edinburgh</td><td>$92,575</td></tr><tr><td>Jennifer Chang</td><td>Regional Director</td><td>Singapore</td><td>$357,650</td></tr><tr><td>Brenden Wagner</td><td>Software Engineer</td><td>San Francisco</td><td>$206,850</td></tr><tr><td>Fiona Green</td><td>Chief Operating Officer (COO)</td><td>San Francisco</td><td>$850,000</td></tr><tr><td>Shou Itou</td><td>Regional Marketing</td><td>Tokyo</td><td>$163,000</td></tr><tr><td>Michelle House</td><td>Integration Specialist</td><td>Sidney</td><td>$95,400</td></tr><tr><td>Suki Burks</td><td>Developer</td><td>London</td><td>$114,500</td></tr><tr><td>Prescott Bartlett</td><td>Technical Author</td><td>London</td><td>$145,000</td></tr><tr><td>Gavin Cortez</td><td>Team Leader</td><td>San Francisco</td><td>$235,500</td></tr><tr><td>Martena Mccray</td><td>Post-Sales support</td><td>Edinburgh</td><td>$324,050</td></tr><tr><td>Unity Butler</td><td>Marketing Designer</td><td>San Francisco</td><td>$85,675</td></tr><tr><td>Howard Hatfield</td><td>Office Manager</td><td>San Francisco</td><td>$164,500</td></tr><tr><td>Hope Fuentes</td><td>Secretary</td><td>San Francisco</td><td>$109,850</td></tr><tr><td>Vivian Harrell</td><td>Financial Controller</td><td>San Francisco</td><td>$452,500</td></tr><tr><td>Timothy Mooney</td><td>Office Manager</td><td>London</td><td>$136,200</td></tr><tr><td>Jackson Bradshaw</td><td>Director</td><td>New York</td><td>$645,750</td></tr><tr><td>Olivia Liang</td><td>Support Engineer</td><td>Singapore</td><td>$234,500</td></tr><tr><td>Bruno Nash</td><td>Software Engineer</td><td>London</td><td>$163,500</td></tr><tr><td>Sakura Yamamoto</td><td>Support Engineer</td><td>Tokyo</td><td>$139,575</td></tr><tr><td>Thor Walton</td><td>Developer</td><td>New York</td><td>$98,540</td></tr><tr><td>Finn Camacho</td><td>Support Engineer</td><td>San Francisco</td><td>$87,500</td></tr><tr><td>Serge Baldwin</td><td>Data Coordinator</td><td>Singapore</td><td>$138,575</td></tr><tr><td>Zenaida Frank</td><td>Software Engineer</td><td>New York</td><td>$125,250</td></tr><tr><td>Zorita Serrano</td><td>Software Engineer</td><td>San Francisco</td><td>$115,000</td></tr><tr><td>Jennifer Acosta</td><td>Junior Javascript Developer</td><td>Edinburgh</td><td>$75,650</td></tr><tr><td>Cara Stevens</td><td>Sales Assistant</td><td>New York</td><td>$145,600</td></tr><tr><td>Hermione Butler</td><td>Regional Director</td><td>London</td><td>$356,250</td></tr><tr><td>Lael Greer</td><td>Systems Administrator</td><td>London</td><td>$103,500</td></tr><tr><td>Jonas Alexander</td><td>Developer</td><td>San Francisco</td><td>$86,500</td></tr><tr><td>Shad Decker</td><td>Regional Director</td><td>Edinburgh</td><td>$183,000</td></tr><tr><td>Michael Bruce</td><td>Javascript Developer</td><td>Singapore</td><td>$183,000</td></tr><tr><td>Donna Snider</td><td>Customer Support</td><td>New York</td><td>$112,000</td></tr></tbody></table>
      
    </div>

-->
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



                    <div class="mailbox row">
                        <div class="col-xs-12">
                            <div class="box box-solid">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <!-- BOXES are complex enough to move the .box-header around.
                                                 This is an example of having the box header within the box body -->
                                            <div class="box-header">
                                                <i class="fa fa-inbox"></i>
                                                <h3 class="box-title"> Notificaciones </h3>
                                            </div>
                                            <!-- compose message btn -->
                                            <!-- <a class="btn btn-block btn-primary" id="nuevo_folio" href="javascript:ajax_('pages/gestion_folios/nuevo_folio.php');"><i class="fa fa-pencil"></i> Nuevo Folio</a> -->
                                            <!-- Navigation - folders-->
                                         <a class="btn btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i>Nueva Notificacion</a>
                                            <div style="margin-top: 15px;">
                                                <ul class="nav nav-pills nav-stacked">
                            
                                                    <li class="active"><a href="#"><i class="fa fa-inbox"></i>Notificaciones (14)</a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-download-alt"></i> Recibidas </a></li>
                                                    <li><a href="#tabla_folios"><i class="glyphicon glyphicon-send"></i> Enviadas</a></li>
                                                    <li><a href="#tabla_folios"><i class="glyphicon glyphicon-send"></i> Basurero</a></li>
                                                </ul>
                                            </div>
                                        </div><!-- /.col (LEFT) -->
                                        <div class="col-md-9 col-sm-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Notificaciones </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="tabla_folios" class="table table-bordered table-striped">
                                      
<?php 
        if($notificacion == 1){

echo <<<HTML
                                        <thead>
                                            <tr>
                                                <th>Numero de Folio</th>
                                                <th>Titulo</th>
                                                <th>Fecha</th>
                                                
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
HTML;

            foreach( $rows as $row ){ 
     
            $NroFolio = $row['NroFolio'];
            $Titulo = $row['Titulo'];
        
            $FechaCreacion = $row['FechaCreacion'];
          

                echo "<tr data-id='".$NroFolio."'>";
                echo <<<HTML
                <td><a href="#">$NroFolio</a></td>

HTML;
                //echo <<<HTML <td><a href='javascript:ajax_("'$url'");'>$NroFolio</a></td>HTML;
                echo <<<HTML
                <td><a href="#">$Titulo</a></td>

HTML;
                echo <<<HTML
                <td><a href="#">$FechaCreacion</a></td>

HTML;
                
                
                echo "</tr>";

            }
                
echo <<<HTML
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Numero de Folio</th>
                                                <th>Titulo</th>
                                                <th>Fecha</th>
                                               
                                                
                                            </tr>
                                        </tfoot>
HTML;

        }
        else
        {
            echo "<tr>";
            echo "<td>No hay ninguna notificacion disponible</td>";
            echo "</tr>";
        }

?>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                                        </div><!-- /.col (RIGHT) -->
                                    </div><!-- /.row -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col (MAIN) -->
                      </div>
                  </div><!-- MAILBOX END -->
</section><!-- /.content -->
</div>
</div><!--/col-span-10-->

</div><!-- /Main -->




//Enviar una nueva notificacion

<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-disk"></i> Enviar Notificacion</h4>
      </div>
          <div class="modal-body">

            <div class="form-group">
              <div class="input-group">
              
                <input type ="hidden" name="Usuario" id="Insertar_Emisor" class="form-control"  readonly="readonly"  value="<?php echo $usuario2;?>"  /> 
                                             
              </div>
                 </div>   


            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Fecha:</span>
                <input type ="date" name="FechaCreacion" id="FechaCreacion" class="form-control"  readonly="readonly" value="<?php echo date('Y-m-d');?>" />
              </div>
                 </div>   
             <div class="form-group">
              <div class="input-group">
               
                <span class="input-group-addon">Numero Folio :</span>
                  <select id="NroFolio" class="form-control"name="NroFolio" >
                                            <option value=-1> -- Seleccione -- </option>
                                            <?php foreach( $filas as $row ) { ?>
                                            <option value="<?php echo $row["NroFolio"];?>"><?php echo $row["NroFolio"];?></option><?php } 
                                             ?></select>
                
              </div>
              </div>
            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon">Para :</span>
                 
                 <select id="Destinatarios" class="form-control"name="Destinatarios" >
                                            <option value=-1> -- Seleccione -- </option>
                                            <?php foreach( $filas2 as $row ) { ?>
                                            <option value="<?php echo $row["idUsuario"];?>"><?php echo $row["nombre"];?></option><?php } 
                                             ?></select>
              </div>
              </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Titulo:</span>
                <input name="Titulo" id="Insertar_Titulo" type="text" class="form-control" placeholder="Titulo">
            </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">Mensaje:</span>
                <textarea rows="2" name="Mensaje" id="Insertar_Mensaje" class="form-control" placeholder="Mensaje..." ></textarea>
              </div>
              </div>
                   
    
          <div class="modal-footer clearfix">
            <button type="button" name="submit" id="notificacion" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i> Enviar</button>
          </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Script necesario para que la tabla se ajuste a el tamanio de la pag-->
<script type="text/javascript">
  // For demo to fit into DataTables site builder...
  $('#tabla_notificaciones')
    .removeClass( 'display' )
    .addClass('table table-striped table-bordered');
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

<script type="text/javascript" src="js/gestion_folios/gestion_folios/Notificacion.js" ></script>

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>
