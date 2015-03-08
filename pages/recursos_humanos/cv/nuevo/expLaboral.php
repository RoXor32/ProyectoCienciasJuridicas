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
    <script type="text/javascript" src="../../../js/insertarPOA.js" ></script>


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
                                    <label>Experiencia Laboral</label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Número de identidad</label>
                                            <select name="ideLab" class="form-control">
                                                <?php
                                                $pa=mysql_query("SELECT N_identidad FROM persona");
                                                while($row=mysql_fetch_array($pa)){
                                                    echo '<option value="'.$row['N_identidad'].'">'.$row['N_identidad'].'</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="multi-field-wrapper-eLab">
                                                <div class="multi-fields-eLab">
                                                    <div class="multi-field-eLab">
                                                        <div class="form-group">
                                                            </br><label><h3>Nueva experiencia laboral</h3></label></br>
                                                            </br><label>Nombre de la empresa</label>
                                                            <input class="form-control" name="nombreEmpresa[]" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tiempo (número de meses)</label>
                                                            <input class="form-control" name="tiempoLab[]" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Cargo</label>
                                                            <select name="cargo[]" class="form-control">
                                                                <?php
                                                                $pa=mysql_query("SELECT Cargo FROM cargo");
                                                                while($row=mysql_fetch_array($pa)){
                                                                    echo '<option value="'.$row['Cargo'].'">'.$row['Cargo'].'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <button type="button" class="btn btn-default remove-field-eLab">Borrar</button>
                                                    </div>
                                                </div>
                                                </br><button type="button" class="btn btn-primary add-field-eLab">Añadir</button>
                                            </div>
                                            <script type="text/javascript">
                                                $('.multi-field-wrapper-eLab').each(function() {
                                                    var $wrapper = $('.multi-fields-eLab', this);
                                                    $(".add-field-eLab", $(this)).click(function(e) {
                                                        $('.multi-field-eLab:first-child', $wrapper).clone(true).appendTo($wrapper).find('div').val('').focus();
                                                    });
                                                    $('.multi-field-eLab .remove-field-eLab', $wrapper).click(function() {
                                                        if ($('.multi-field-eLab', $wrapper).length > 1)
                                                            $(this).parent('.multi-field-eLab').remove();
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