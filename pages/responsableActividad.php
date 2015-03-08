<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin PAO</title>
    
    <!-- CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/timeline.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet" media="screen">
   

    <!-- javascript -->
    
    
    
    
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet"> 
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

     <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>   
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
    <script src="js/morris-data.js"></script>    
    <script src="dist/js/sb-admin-2.js"></script> 
    <script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
     <script type="text/javascript" src="js/datepicker.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>    
    <script type="text/javascript" src="js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/insertarPOA.js" ></script>

    
     
    <script type="text/javascript">
        /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('.datepicker').datepicker({
    startDate: '-3d'
})


    $('.form_datetime').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
    
    
</head>

<body>
    
    <div class="col-lg-8">
        
        <div class="row"> 
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Plan Operativo Anual
                        </div>
                        <div class="panel-body">
                            Titulo:
                            Fecha Inicio.
                            Fecha Fin:
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                <div class="panel-heading">
                    Objetivo Institucional
                </div>
                <div class="panel-body">
                    Descripcion
                    Area Estrategica
                    Resultado
                    Area que Pertenece
                </div>
            </div>
                    
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                <div class="panel-heading">
                    Indicador
                </div>
                <div class="panel-body">
                    nombre:
                    Descripcion                    
                </div>
            </div>
                </div>
            </div>
            
            
            
            
            <div class="panel panel-default">               
                <div class="panel-heading">
                   Asignacion de Actividad 
                </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <label >Asignacion Actividad</label>
                                        </h4>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="col-lg-8">
                                                <form role="form">
                                                    <div class="form-group">
                                                        <label>Descripcion Actividad</label>
                                                        <textarea id="observacion" class="form-control" rows="2"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Asignar a: </label>
                                                        <select class="form-control">
                                                            <option>Seleccione..</option>
                                                            <option>Desarrollo e innovacion Curricular</option>
                                                            <option>De Investigacion</option>
                                                            <option>Vinculacion </option>
                                                            <option>Docencia</option>
                                                            <option>Profesorado</option>
                                                        </select>
                                                    </div>
                                                    
                                                    
                                                    <button id="guardar" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                                        Asignar
                                                    </button>
                                                </form>
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

    
    
    
    
       
    
   
    
    
   
    
   


</body>

</html>

