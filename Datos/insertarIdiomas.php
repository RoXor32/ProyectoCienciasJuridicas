<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\ProyectoIS\ModuloCurricular\Datos\Conexion.php";

if (isset($_POST['nombreIdioma'])) {
    $Language = $_POST['nombreIdioma'];

    $query = "INSERT INTO idioma(Idioma) VALUES('$Language')";

    mysql_query($query);
}

include "$root\ProyectoIS\ModuloCurricular\Datos\cargarIdiomas.php";
?>