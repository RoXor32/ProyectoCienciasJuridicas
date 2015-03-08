<?php
$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\ProyectoIS\ModuloCurricular\Datos\Conexion.php";
?>

<table class="table table-bordered">
                <tr class="well">
                    <td><strong><center>Codigo</center></strong></td>
                    <td><strong><center>Nombre Idioma</strong></td>
                    <td><strong><center>Eliminar</strong></center></td>
                    <td><strong><center>Actualizar</strong></center></td>

                </tr>
                <?php
                if (isset($_POST['ID_Idioma'])) {
                    $id = $_POST['ID_Idioma'];
                    mysql_query("DELETE FROM idioma
						WHERE ID_Idioma='$id'");
                    echo mensajes('Idioma"' . $id . '" Eliminado con Exito', 'verde');
                }
                ?>



                <?php
                $pame = mysql_query("SELECT * FROM idioma");
                while ($row = mysql_fetch_array($pame)) {
                    ?>

                    <tr>
                        <td><?php echo $row['ID_Idioma']; ?></td>
                        <td><?php echo $row['Idioma']; ?></td>




                        <td>
                    <center>




                        <form action="" method='POST' >

                            <button type="submit" class="btn btn-danger" name="ID_Idioma" value= <?php echo $row['ID_Idioma']; ?>  </button>
                            <i class="icon-cancel">X</i>

                        </form>

                    </center>
                    </td> 

                    <td>
                    <center>
                        <a class="btn btn-info" href="modi_idioma.php?codigo=<?php echo $row['ID_Idioma']; ?>" title="Editar">
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