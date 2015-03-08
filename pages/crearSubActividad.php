
<?php
include '../Datos/conexion.php';
$idAct = $_POST['idAct'];
?>
<script>

    $('#myModal2').modal({
        show: true
    })
</script>

<table >
   
    <tr>
        <td>
           
        </td>
        <td>
            <div >
                <input id="nombre" size="8" >
            </div>
        </td>
        <td>
            <div >
                <input id="descripcion" size="8" >
            </div>
        </td>


        <td>
            <div >
                <input type="date"  id="dp1" required>
                
            </div>
        </td>


        <td>
            <div >
                
                <select id="encargado" >
                    <option value="0">Seleccione..</option>



                    <?php
                    $query = mysql_query("SELECT * FROM responsables_por_actividad where id_Actividad='" . $idAct . "'", $enlace);
                    while ($row = mysql_fetch_array($query)) {
                        $idRes = $row['id_Responsable'];
                        $query2 = mysql_query("select * from persona where N_identidad in (select N_identidad from empleado where No_Empleado in (select No_Empleado from grupo_o_comite_has_empleado where ID_Grupo_o_comite in (select ID_Grupo_o_comite from grupo_o_comite where ID_Grupo_o_comite='" . $idRes . "')))", $enlace);
                        while ($row = mysql_fetch_array($query2)) {
                            $NoIdent = $row['N_identidad'];
                            $nombre = $row['Primer_nombre'] . " " . $row['Segundo_nombre'] . " " . $row['Primer_apellido'] . " " . $row['Segundo_apellido'];
                            ?>
                            <option value="<?php echo $NoIdent; ?>"><?php echo $nombre; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </td>

        <td>
            <div >
                <input id="porcentaje" size="8" required>
            </div> 
        </td>
        <td>
            <div >
                <input id="costo"size="8"required>

            </div>
        </td>
        <td>
            <div>

                <textarea id="observacion" ></textarea>
            </div>
        </td>
    </tr>

</table>

<div class="modal-footer">
    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="button" id="guardarSubAct" class="btn btn-primary" data-dismiss="modal">Guardar</button>
</div>


<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div> 
<script language="javascript">
$('#MyModal').modal({
  show: true 
})
</script>