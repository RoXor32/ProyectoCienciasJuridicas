<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Módulo Curricular</title>
    <!-- CSS -->
    <link href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../../../dist/css/timeline.css" rel="stylesheet">
    <link href="../../../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../../css/datepicker.css" rel="stylesheet" media="screen">

    <!-- javascript -->
    <link href="../../../bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="../../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../../../bower_components/raphael/raphael-min.js"></script>
    <script src="../../../bower_components/morrisjs/morris.min.js"></script>
    <script src="../../../js/morris-data.js"></script>
    <script src="../../../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="../../../js/jquery-1.11.1.min.js" ></script>
    <script type="text/javascript" src="../../../js/datepicker.js"></script>
    <script type="text/javascript" src="../../../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="../../../js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>


    <?php include_once "personaAgregar.php"; ?>


</head>

<body>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Agregar Persona
            </div>
            <!-- .panel-heading -->
            <div class="panel-body">
                <form role="form" method="post">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <label>Experiencia Académica</label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Número de identidad</label>
                                            <select name="ideAcad" class="form-control">
                                                <?php
                                                $pa=mysql_query("SELECT N_identidad FROM persona");
                                                while($row=mysql_fetch_array($pa)){
                                                    echo '<option value="'.$row['N_identidad'].'">'.$row['N_identidad'].'</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="multi-field-wrapper-eAcad">
                                                <div class="multi-fields-eAcad">
                                                    <div class="multi-field-eAcad">
                                                        <div class="form-group">
                                                            </br><label><h3>Nueva experiencia académica</h3></label></br>
                                                            </br><label>Nombre de la empresa</label>
                                                            <input class="form-control" name="nombreInst[]" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tiempo (número de meses)</label>
                                                            <input class="form-control" name="tiempoAcad[]" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Clases</label>
                                                            <select name="clases[]" class="form-control">
                                                                <?php
                                                                $p=mysql_query("SELECT Clase FROM clases");
                                                                while($row=mysql_fetch_array($p)){
                                                                    echo '<option value="'.$row['Clase'].'">'.$row['Clase'].'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <button type="button" class="btn btn-default remove-field-eAcad">Borrar</button>
                                                    </div>
                                                </div>
                                                </br><button type="button" class="btn btn-primary add-field-eAcad">Añadir</button>
                                            </div>
                                            <script type="text/javascript">
                                                $('.multi-field-wrapper-eAcad').each(function() {
                                                    var $wrapper = $('.multi-fields-eAcad', this);
                                                    $(".add-field-eAcad", $(this)).click(function(e) {
                                                        $('.multi-field-eAcad:first-child', $wrapper).clone(true).appendTo($wrapper).find('div').val('').focus();
                                                    });
                                                    $('.multi-field-eAcad .remove-field-eAcad', $wrapper).click(function() {
                                                        if ($('.multi-field-eAcad', $wrapper).length > 1)
                                                            $(this).parent('.multi-field-eAcad').remove();
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Información</button>
                </form>
            </div>
            <!-- .panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
</body>

</html>