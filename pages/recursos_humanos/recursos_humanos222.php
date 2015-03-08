<?php

    $maindir = "../../";

  if(isset($_GET['contenido']))
    {
      $contenido = $_GET['contenido'];
    }
  else
    {
      $contenido = 'recursos_humanos';
    }

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");

  require_once($maindir."pages/navbar.php");

?>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Control Curricular</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i> Inserción de Datos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Idiomas.php">Idiomas</a> <!--  aqui modifique la extension del archivo -->
                                    </li>
                                    <li>
                                        <a  id="clases" href= "#">Clases</a>
                                    </li>
                                    <li>
                                        <a href="Cargos.php">Cargos</a>
                                    </li>

                                    <li>
                                        <a href="Universidades.php">Universidades</a>
                                    </li>
                                    <li>
                                        <a href="Tipo_Estudio.php">Tipo Estudio</a>
                                    </li>
                                    <li>
                                        <a href="departamento.php">Departamentos</a>
                                    </li>
                                    <li>
                                        <a Id="pais" href="#">Paises</a>
                                    </li>
                                    <li>
                                        <a href="infoPersonal.php">Personas</a>
                                    </li>
                                    <li>
                                        <a href="expAcademica.php">Experiencia Academica</a>
                                    </li>
                                    <li>
                                        <a href="formAcademica.php">Formación Academica</a>
                                    </li>
                                    <li>
                                        <a href="expLaboral.php">Experiencia Laboral</a>
                                    </li>
                                    <li>
                                        <a href="Empleados.php">Empleados</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>


            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->









        <div id="page-wrapper">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div id="contenedor" class="panel-body">


                        <div class="col-lg-12">
                            <h1 class="page-header">Bienvenido!</h1>
                        </div>
                        <div class="panel-heading">
                            Por favor seleccione en la barra lateral que datos desea ingresar.
                        </div>

                    </div>
                </div>
            </div>
        </div>    











       

        
         <script>

            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */

            var x;
            x = $(document);
            x.ready(menuInicioEmpleado);
            function menuInicioEmpleado()
            {
                var x;
                x = $("#clases");
                x.click(clases);
                
                var x;
                x = $("#pais");
                x.click(paises);
                
            }


            function clases()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaClases,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
                function paises()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadapais,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }


            function inicioEnvio()
            {
                var x = $("#contenedor");
                x.html('Cargando...');
            }
            
             function problemas()
            {
                $("#contenedor").text('Problemas en el servidor.');
            }

            function llegadaClases()
            {
                $("#contenedor").load('pagesClases.php');
                
            }

           
              function llegadapais()
            {
                $("#contenedor").load('pages/recursos_humanos/Pais.php');
                
            }



        </script>