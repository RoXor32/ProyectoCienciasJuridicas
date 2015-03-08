var id;
var data;
var x;
    x=$(document);
    x.ready(inicio);

    function inicio(){

        var x;
        x=$("#nueva_prioridad");
        x.click(nueva_prioridad);
       
    }

        function nueva_prioridad() {
            data={
                DescripcionPrioridad:$("#Insertar_DescripcionPrioridad").val(),
                tipoProcedimiento:"insertar"
            };

            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_prioridad.php", 
                success:NuevaPrioridad,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function quitarModal(){

            $("#compose-modal").modal('hide');
        }

        function NuevaPrioridad(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_prioridad.php',data);
        }
        function problemas(){

            $("#div_contenido").text('Problemas en el servidor.');
        }
