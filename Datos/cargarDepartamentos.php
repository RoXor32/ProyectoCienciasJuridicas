<?php
$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\ProyectoIS\ModuloCurricular\Datos\Conexion.php";
 //echo 'cargar la tabla'
?>

<table class="table table-bordered">
                <tr class="well">
                    <td><strong><center>ID Departamento</center></strong></td>
                    <td><strong><center>Nombre Departamento</strong></td>
                    <td><strong><center>Eliminar</strong></center></td>
                    <td><strong><center>Actualizar</strong></center></td>

                </tr>
                <?php
                if (isset($_POST['ID_Clases'])) {
                    $id = $_POST['ID_Clases'];
                    mysql_query("DELETE FROM clases
						WHERE ID_Clases='$id'");
                    echo mensajes('clase"' . $id . '" Eliminado con Exito', 'verde');
                }
                ?>



                <?php
                $pame = mysql_query("SELECT * FROM departamento_laboral");
                while ($row = mysql_fetch_array($pame)) {
                    ?>

                    <tr>
                        <td><?php echo $row['Id_departamento_laboral']; ?></td>
                        <td><?php echo $row['nombre_departamento']; ?></td>




                        <td>
                    <center>




                        <form action="" method='POST' >

                            <button type="submit" class="btn btn-danger" name="ID_Clases" value= <?php echo $row['Id_departamento_laboral']; ?>  </button>
                            <i class="icon-cancel">X</i>

                        </form>

                    </center>
                    </td> 

                    <td>
                    <center>
                        <a class="btn btn-info" href="modi_clase.php?codigo=<?php echo $row['Id_departamento_laboral']; ?>" title="Editar">
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

