var id;
var data;
var x;
    x=$(document);
    x.ready(inicio);

    function inicio(){

        var x;
        x=$("#gestion_folios");
        x.click(gestion_folios);

        var x1;
        x1=$("#folios");
        x1.click(folios);
 
        var x2;
        x2=$("#alertas");
        x2.click(alertas);

        var x3;
        x3=$("#notificaciones");
        x3.click(notificaciones);

        var y;
        y=$("#mantenimiento_organizacion");
        y.click(mantenimiento_organizacion);
		
		var y1;
		y1=$("#mantenimiento_unidadacademica");
		y1.click(mantenimiento_unidadacademica);
		
		var y2;
		y1=$("#mantenimiento_prioridad");
		y1.click(mantenimiento_prioridad);
		
		var y3;
		y1=$("#mantenimiento_ubicacionArchivoFisico");
		y1.click(mantenimiento_ubicacion_archivofisico);
       
    }

        function gestion_folios() {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/gestion_de_folios.php", 
                success:GestionFolios,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function folios() {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/folios.php", 
                success:Folios,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function alertas() {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/alertas.php", 
                success:Aletas,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function notificaciones() {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/notificaciones.php", 
                success:Notificaciones,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function mantenimiento_organizacion() {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_organizacion.php", 
                success:MantenimientoOrganizacion,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
		
		function mantenimiento_unidadacademica() {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_unidadacademica.php", 
                success:MantenimientoUnidadAcademica,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
		
		function mantenimiento_prioridad() {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_prioridad.php", 
                success:MantenimientoPrioridad,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
		
		function mantenimiento_ubicacion_archivofisico() {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/mantenimientos_gestion_folios/mantenimiento_ubicacion_archivofisico.php", 
                success:MantenimientoUbicacionArchivoFisico,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }

        function GestionFolios(){

            $("#div_contenido").load('pages/gestion_folios/gestion_de_folios.php');
        }
        function Folios(){

            $("#div_contenido").load('pages/gestion_folios/folios.php');
        }
        function Alertas(){

            $("#div_contenido").load('pages/gestion_folios/alertas.php');
        }
        function Notificaciones(){

            $("#div_contenido").load('pages/gestion_folios/notificaciones.php');
        }
        function MantenimientoOrganizacion(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_organizacion.php');
        }
		function MantenimientoUnidadAcademica(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_unidadacademica.php');
        }
		function MantenimientoPrioridad(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_prioridad.php');
        }
		function MantenimientoUbicacionArchivoFisico(){

            $("#div_contenido").load('pages/mantenimientos_gestion_folios/mantenimiento_ubicacion_archivofisico.php');
        }
        function problemas(){

            $("#div_contenido").text('Problemas en el servidor.');
        }
