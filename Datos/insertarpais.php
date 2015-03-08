<?php

  $root = \realpath($_SERVER["DOCUMENT_ROOT"]);

   include "$root\curriculo\Datos\conexion.php";	

    if (isset($_POST['Pais'])) 
    {
        $Pais = $_POST['Pais']; 
        
        $query = "INSERT INTO pais(Nombre_pais) VALUES('$Pais')";
        
        mysql_query($query); 

    }   
    
    
    
    include "$root\curriculo\Datos\cargaPais.php";
    
?>
