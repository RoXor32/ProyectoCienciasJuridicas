<?php
$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\ProyectoIS\ModuloCurricular\Datos\Conexion.php";
//echo 'cargar la tabla'
?>

<table class="table table-bordered">
    <tr class="well">
        <td><strong><center>ID Grupo o Comité</center></strong></td>
        <td><strong><center>Nombre Grupo o Comité</strong></td>
        <td><strong><center>Eliminar</strong></center></td>
        <td><strong><center>Actualizar</strong></center></td>

    </tr>

    <?php
    $pame = mysql_query("SELECT * FROM grupo_o_comite");
    while ($row = mysql_fetch_array($pame)) {
        ?>

        <tr>
            <td ><?php echo $row['ID_Grupo_o_comite']; ?></td>
            <td><?php echo $row['Nombre_Grupo_o_comite']; ?></td>




            <td>
        <center>




            <form action="" method='POST' >

                <button type="submit" class="btn btn-danger" id="eliminarClase" value= <?php echo $row['ID_Grupo_o_comite'];?></button>
                <i class="icon-cancel">X</i>

            </form>

        </center>
    </td> 

    <td>
    <center>
        <a class="btn btn-info" href="modi_clase.php?codigo=<?php echo $row['ID_Grupo_o_comite']; ?>" title="Editar">
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

