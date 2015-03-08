<?php
$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\ProyectoIS\ModuloCurricular\Datos\Conexion.php";
 //echo 'cargar la tabla'
?>

<table class="table table-bordered">
                <tr class="well">
                    <td><strong><center>ID Cargo</center></strong></td>
                    <td><strong><center>Nombre Cargo</strong></td>
                    <td><strong><center>Eliminar</strong></center></td>
                    <td><strong><center>Actualizar</strong></center></td>

                </tr>
                <?php
                if (isset($_POST['ID_cargo'])) {
                    $id = $_POST['ID_Clases'];
                    mysql_query("DELETE FROM clases
						WHERE ID_Clases='$id'");
                    echo mensajes('clase"' . $id . '" Eliminado con Exito', 'verde');
                }
                ?>



                <?php
                $pame = mysql_query("SELECT * FROM cargo");
                while ($row = mysql_fetch_array($pame)) {
                    ?>

                    <tr>
                        <td><?php echo $row['ID_cargo']; ?></td>
                        <td><?php echo $row['Cargo']; ?></td>




                        <td>
                    <center>




                        <form action="" method='POST' >

                            <button type="submit" class="btn btn-danger" name="ID_Clases" value= <?php echo $row['ID_cargo']; ?>  </button>
                            <i class="icon-cancel">X</i>

                        </form>

                    </center>
                    </td> 

                    <td>
                    <center>
                        <a class="btn btn-info" href="modi_clase.php?codigo=<?php echo $row['ID_cargo']; ?>" title="Editar">
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

