<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);

include "$root\curriculo\Datos\conexion.php";

 $query = mysql_query("SELECT * FROM empleado inner join persona on empleado.N_identidad=persona.N_identidad inner join departamento_laboral on departamento_laboral.Id_departamento_laboral=empleado.Id_departamento");

?>


<html>
    
    <head>
        
        
    </head>

    <body>
        
             <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Lista de Empleados</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
        
        
        
        
         <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>                                            
                                            <th>No empleado</th>
                                            <th>No identidad</th>
                                            <th>nombre</th>
                                            <th>Apellido</th>
                                            <th>Departamento</th>
                                                                                        
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
				while($row = mysql_fetch_array($query))
				{
					$id = $row['No_Empleado'];
					?>
					<tr>
                                            <td><?php echo $row['No_Empleado']?></td>
                        <td><div class="text" id="definicion-<?php echo $id ?>"><?php echo $row['N_identidad']?></div></td>
                        <td><div class="text" id="area-<?php echo $id ?>"><?php echo $row['Primer_nombre']?></div></td>
                        <td><div class="text" id="resultado-<?php echo $id ?>"><?php echo $row['Primer_apellido']?></div></td>
                        <td><div class="text" id="campo-<?php echo $id ?>"><?php echo $row['nombre_departamento']?></div></td>
                        <td><a class="elimina btn btn-success">ver</a></td>
                        
                    </tr>
					<?php
				}
				 ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
    
    
    
</html>