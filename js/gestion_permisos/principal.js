/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	var y;
	y=$(document);
	y.ready(inicio);

	function inicio()
	{
		var x;
		x=$("#solicitud");
		x.click(Solicitud);
		
		var x1;
		x1=$("#motivos");
		x1.click(Motivos);
	  
	  
		var x2;
		x2=$("#edificios");
		x2.click(Edificios);
		
		var x3;
		x3=$("#unidad");
		x3.click(Unidad);
		
		var x4;
		x4=$("#revision");
		x4.click(Revision);
	}


	function Solicitud()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/Solicitud.php",    
			// url:"../solicitudes.php",  
			beforeSend:inicioEnvio,
			success:llegadaSolic,
			timeout:4000,
			error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }  
		}); 
		return false;
	}

	function Motivos()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/motivo.php",    
			// url:"../Motivos.php",  
			beforeSend:inicioEnvio,
			success:llegadaMotivos,
			timeout:4000,
			error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }
		}); 
		return false;
	}

	function Edificios()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/Edificios.php",    
			// url:"../Edificios.php",  
			beforeSend:inicioEnvio,
			success:llegadaEdificios,
			timeout:4000,
			error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }
		}); 
		return false;
	}

	function Unidad()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/Unidad_Academica.php",    
			// url:"../Unidad_Academica.php",  
			beforeSend:inicioEnvio,
			success:llegadaUnidad,
			timeout:4000,
			error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }
		}); 
		return false;
	}
	
	function Revision()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/Revision.php",    
			// url:"../Revision.php",  
			beforeSend:inicioEnvio,
			success:llegadaRevision,
			timeout:4000,
			error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }
		}); 
		return false;
	}

	function inicioEnvio()
	{
		var x=$("#contenedor");
		x.html('Cargando...');
	}
	function llegadaSolic()
	{
		$("#contenedor").load('pages/permisos/Solicitud.php');
		 //$("#contenedor").load('../permisos/solicitudes.php');
	}
	function llegadaMotivos()
	{
		$("#contenedor").load('pages/permisos/motivo.php');
		 //$("#contenedor").load('../permisos/motivo.php');
	}
	function llegadaEdificios()
	{
		$("#contenedor").load('pages/permisos/Edificios.php');
		 //$("#contenedor").load('../permisos/Edificios.php');
	}
	function llegadaUnidad()
	{
		$("#contenedor").load('pages/permisos/Unidad_Academica.php');
		 //$("#contenedor").load('../permisos/Unidad_Academica.php');
	}
	function llegadaRevision()
	{
		$("#contenedor").load('pages/permisos/Revision.php');
		 //$("#contenedor").load('../permisos/Revision.php');
	}
	function problemas()
	{
		$("#contenedor").text();
	}