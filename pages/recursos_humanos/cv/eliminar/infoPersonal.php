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

    <?php include_once "personaEliminar.php"; ?>


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
                                    <label>Información Personal</label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="multi-field-wrapper-fAc">
                                                <div class="multi-fields-fAc">
                                                    <div class="multi-field-fAc">
                                                        <div class="form-group">
                                                            </br><label><h3>Eliminar Información Personal</h3></label>
                                                            <label><h4>(Elimina toda la información asociada a la persona)</h4></label></br></br>
                                                            <label>Número de identidad</label>
                                                            <select name="id[]" class="form-control">
                                                                <?php
                                                                $pa=mysql_query("SELECT N_identidad FROM persona");
                                                                while($row=mysql_fetch_array($pa)){
                                                                    echo '<option value="'.$row['N_identidad'].'">'.$row['N_identidad'].'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <button type="button" class="btn btn-default remove-field-fAc">Borrar</button>
                                                    </div>
                                                </div>
                                                </br><button type="button" class="btn btn-primary add-field-fAc">Añadir</button>
                                            </div>
                                            <script type="text/javascript">
                                                $('.multi-field-wrapper-fAc').each(function() {
                                                    var $wrapper = $('.multi-fields-fAc', this);
                                                    $(".add-field-fAc", $(this)).click(function(e) {
                                                        $('.multi-field-fAc:first-child', $wrapper).clone(true).appendTo($wrapper).find('div').val('').focus();
                                                    });
                                                    $('.multi-field-fAc .remove-field-fAc', $wrapper).click(function() {
                                                        if ($('.multi-field-fAc', $wrapper).length > 1)
                                                            $(this).parent('.multi-field-fAc').remove();
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Eliminar Información</button>
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