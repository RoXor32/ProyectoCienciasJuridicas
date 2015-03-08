    <?php
    
        if (isset($_POST['Id_Pais'])) {
            $id = $_POST['Id_Pais'];
            mysql_query("DELETE FROM pais WHERE Id_pais='$id'");
            echo mensajes('Pais"' . $id . '" Eliminado con Exito', 'verde');
        }
    ?>
