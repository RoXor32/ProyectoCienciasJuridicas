<?php
$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\ProyectoIS\ModuloCurricular\Datos\Conexion.php";
//echo 'cargar la tabla'
?>

<table class="table table-bordered">
    <tr class="well">
        <td><strong><center>ID Clase</center></strong></td>
        <td><strong><center>Nombre Clase</strong></td>
        <td><strong><center>Eliminar</strong></center></td>
        <td><strong><center>Actualizar</strong></center></td>

    </tr>

    <?php
    $pame = mysql_query("SELECT * FROM clases");
    while ($row = mysql_fetch_array($pame)) {
        ?>

        <tr>
            <td ><?php echo $row['ID_Clases']; ?></td>
            <td><?php echo $row['Clase']; ?></td>




            <td>
        <center>




            <form action="" method='POST' >

                <button type="submit" class="btn btn-danger" id="eliminarClase" value= <?php echo $row['ID_Clases'];?></button>
                <i class="icon-cancel">X</i>

            </form>

        </center>
    </td> 

    <td>
    <center>
        <a class="btn btn-info" href="modi_clase.php?codigo=<?php echo $row['ID_Clases']; ?>" title="Editar">
            <i class="icon-edit">Editar</i>
        </a>
    </center>

    </td>
    </tr>

    </div>
    <div id="contenedor2">
        
    </div>

        
    

<?php } ?>
</table>
</td>
</tr>
</table>

<script>
            var x;
            x = $(document);
            x.ready(eliminar);
            function eliminar()
            {
                var x;
                x = $("#eliminarClase");
                x.click(eliminarClase);
             
            }

            function eliminarClase()
            {
                data={
                    nombre:$('#nombre').val()
                }
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaEliminarClase,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }


            function inicioEnvio()
            {
                var x = $("#contenedor2");
                x.html('Cargando...');
            }

            function llegadaEliminarClase()
            {
                $("#contenedor2").load('Datos/elimianrClase.php',data);
                //$("#contenedor").load('../cargarPOAs.php');
            }

            function problemas()
            {
                $("#contenedor2").text('Problemas en el servidor.');
            }



        </script>
