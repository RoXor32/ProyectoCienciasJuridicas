var id;
var data;
var x;
    x=$(document);
    x.ready(inicio);

    function inicio(){

        var x;
        x=$("#nueva_organizacion");
        x.click(nueva_organizacion);
       
    }

        function nueva_organizacion() {
            data={
                Organizacion:$("#Insertar_NombreOrganizacion").val(),
                Ubicacion:$("#Insertar_Ubicacion").val(),
                tipoProcedimiento:"insertar"
            };

            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_organizacion.php", 
                success:NuevaOrganizacion,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function quitarModal(){

            $("#compose-modal").modal('hide');
        }

        function NuevaOrganizacion(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_organizacion.php',data);
        }
        function problemas(){

            $("#div_contenido").text('Problemas en el servidor.');
        }
