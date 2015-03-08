<?php
$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\ProyectoIS\ModuloCurricular\Datos\Conexion.php";
 //echo 'cargar la tabla'
?>

<table class="table table-bordered">
                <tr class="well">
                    <td><strong><center>ID Tipo Estudio</center></strong></td>
                    <td><strong><center>Nombre Tipo Estudio</strong></td>
                    <td><strong><center>Eliminar</strong></center></td>
                    <td><strong><center>Actualizar</strong></center></td>

                </tr>

                <?php
                $pame = mysql_query("SELECT * FROM tipo_estudio");
                while ($row = mysql_fetch_array($pame)) {
                    ?>

                    <tr>
                        <td><?php echo $row['ID_Tipo_estudio']; ?></td>
                        <td><?php echo $row['Tipo_estudio']; ?></td>




                        <td>
                    <center>




                        <form action="" method='POST' >

                            <button type="submit" class="btn btn-danger" name="ID_Tipo_estudio" value= <?php echo $row['ID_Tipo_estudio']; ?>  </button>
                            <i class="icon-cancel">X</i>

                        </form>

                    </center>
                    </td> 

                    <td>
                    <center>
                        <a class="btn btn-info" href="modi_clase.php?codigo=<?php echo $row['ID_Tipo_estudio']; ?>" title="Editar">
                            <i class="icon-edit">Editar</i>
                        </a>
                    </center>

                    </td>


                    </tr>

                  


            </div>

<?php } ?>
    </table>
</td>
</tr>
</table>

