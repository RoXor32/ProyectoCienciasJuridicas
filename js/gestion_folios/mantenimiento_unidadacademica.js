var id;
var data;
var x;
    x=$(document);
    x.ready(inicio);

    function inicio(){

        var x;
        x=$("#nueva_unidadacademica");
        x.click(nueva_unidadacademica);
       
    }

        function nueva_unidadacademica() {
            data={
                UnidadAcademica:$("#Insertar_NombreUnidadAcademica").val(),
                Ubicacion:$("#Insertar_UbicacionUnidadAcademica").val(),
                tipoProcedimiento:"insertar"
            };

            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_unidadacademica.php", 
                success:NuevaUnidadAcademica,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function quitarModal(){

            $("#compose-modal").modal('hide');
        }

        function NuevaUnidadAcademica(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_unidadacademica.php',data);
        }
        function problemas(){

            $("#div_contenido").text('Problemas en el servidor.');
        }
