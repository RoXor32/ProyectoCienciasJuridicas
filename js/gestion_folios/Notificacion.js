var id;
var data;
var x;
    x=$(document);
    x.ready(inicio);

    function inicio(){

        var x;
        x=$("#notificacion");
        x.click(enviar_notificacion);
       
    }

        function enviar_notificacion() {
            data={
                NroFolio:$("#NroFolio").val(),
                idEmisor:$("#Insertar_Emisor").val(),
                Titulo:$("#Insertar_Titulo").val(),
                Cuerpo:$("#Insertar_Mensaje").val(),
                FechaCreacion:$("#FechaCreacion").val(),
                tipoProcedimiento:"insertar"
            };

            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/Notificaciones.php", 
                success:EnviarNotificacion,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function quitarModal(){

            $("#compose-modal").modal('hide');
        }

        function EnviarNotificacion(){

            $("#div_contenido").load('pages/gestion_folios/Notificaciones.php',data);
        }
        function problemas(){

            $("#div_contenido").text('Problemas con el servidor.');
        }