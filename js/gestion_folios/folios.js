var id;
var data;
var x;
    x=$(document);
    x.ready(inicio);

    function inicio(){
        
        var x;
        x=$("#nuevo_folio");
        x.click(nuevo_folio);
       
    }

    $(".table-striped").find('tr[data-id]').on('click', function () {
        id = $(this).data('id');
        data ={ idFolio:id};     
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/datos_folio.php", 
                success:llegadaVer,
                timeout:4000,
                error:problemas
            }); 
            return false;
    });
         
        function nuevo_folio() {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/nuevo_folio.php", 
                success:llegadaNuevoFolio,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function llegadaVer(){

            $("#div_contenido").load('pages/gestion_folios/datos_folio.php',data);
        }
        function llegadaNuevoFolio(){

            $("#div_contenido").load('pages/gestion_folios/nuevo_folio.php');
        }
        function problemas(){

            $("#div_contenido").text('Problemas en el servidor.');
        }