<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);

include "$root\curriculo\Datos\conexion.php";

 $pame = mysql_query("SELECT * FROM pais ");


?>
<html lang="es">

<head>

    
    
       <script>

            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */

            var x;
            x = $(document);
            x.ready(inicio);
            
            function inicio()
            {
              
                 var x;
                x = $(".editarb");
                x.click(editarPais);
            }

                function editarPais()
            {
                var pid=$(this).parents("tr").find("td").eq(0).html();
                alert(pid);
                      //
                alert(pid);
                
                
                 data ={pid:pid}; 
                
                
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaEditarPais,
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
            
             function llegadaEditarPais()
            {
                $("#contenedor").load('Datos/modi_pais.php',data);
                //$("#contenedor").load('../cargarPOAs.php');
            }

            function problemas()
            {
                $("#contenedor2").text('Problemas en el servidor.');
            }



        </script>
    
    
    

    
</head>

<body>

    <form role="form" action="#" method='POST'>
    <div class="table-responsive">
        <table class="table">
            <thead>
        <tr>
            <th><strong>ID pais</strong></th>
            <th><strong>Nombre del Pais</strong></th>
            <th><strong>Eliminar</strong></th>
            <th><strong>Modificar</strong></th>

        </tr>
            </thead>


      <tbody>
        <?php
        while ($row = mysql_fetch_array($pame)) {
            $id = $row['Id_pais'];
         ?>
            
            <tr>
                <td id="id4">   <?php echo $id ?> </td>
                <td><div class="text" id="npais-<?php echo $id ?>"><?php echo $row['Nombre_pais'] ?></div></td>


                <td>
                   <center>
                   <button type="button" class="btn btn-danger" </button>
                   <i class="icon-cancel">X</i>

                   </center>
                </td> 

        <td>

        <center>

            <button   type="button"  id="editar" href="#" class="editarb btn btn-primary" >
                <i class="icon-edit">Editar</i>
            </button>
        </center>

        </td>


    </tr>

    <!-- aqui Omar -->



   <?php } ?>
 </tbody>
    </table>

    </div>
</form>


</body>

</html>

