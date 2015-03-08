var id;
var data;
var x;
    x=$(document);
    x.ready(inicio);

    function inicio(){

        var x;
        x=$("#nueva_ubicacion_archivofisico");
        x.click(nueva_ubicacion_archivofisico);
       
    }

        function nueva_ubicacion_archivofisico() {
            data={
                DescripcionUbicacionFisica:$("#Insertar_DescripcionUbicacionFisica").val(),
                Capacidad:$("#Insertar_Capacidad").val(),
				TotalIngresados:$("#Insertar_TotalIngresados").val(),
				HabilitadoParaAlmacenar:$("#Insertar_HabilitadoParaAlmacenar").val(),
                tipoProcedimiento:"insertar"
            };

            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_ubicacion_archivofisico.php", 
                success:NuevaUbicacionArchivoFisico,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function quitarModal(){

            $("#compose-modal").modal('hide');
        }

        function NuevaUbicacionArchivoFisico(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_ubicacion_archivofisico.php',data);
        }
        function problemas(){

            $("#div_contenido").text('Problemas en el servidor.');
        }
