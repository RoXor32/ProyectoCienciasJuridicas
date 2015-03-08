/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var x;
x=$(document);
x.ready(inicio);
function inicio()
{
    var x;
    x=$("#crear");
    x.click(crear);
    
    var x;
    x=$("#poas");
    x.click(poas);
  
  
  var y;
    y=$("#ajustes");
    y.click(ajustes);
   
    
}

function ajustes()
{
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/mantenimiento.php",    
        // url:"../cargarPOAs.php",  
        beforeSend:inicioEnvio,
        success:llegadaAjuste,
        timeout:4000,
        error:problemas
    }); 
    return false;
}
function poas()
{
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/poas.php",    
        // url:"../cargarPOAs.php",  
        beforeSend:inicioEnvio,
        success:llegadaPoas,
        timeout:4000,
        error:problemas
    }); 
    return false;
}

function crear()
{
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/crearPOA.php",    
        // url:"../cargarPOAs.php",  
        beforeSend:inicioEnvio,
        success:llegadaCrear,
        timeout:4000,
        error:problemas
    }); 
    return false;
}


function inicioEnvio()
{
    var x=$("#contenedor");
    x.html('Cargando...');
}
function llegadaAjuste()
{
    $("#contenedor").load('pages/mantenimiento.php');
     //$("#contenedor").load('../cargarPOAs.php');
}
function llegadaPoas()
{
    $("#contenedor").load('pages/poas.php');
     //$("#contenedor").load('../cargarPOAs.php');
}
function llegadaCrear()
{
    $("#contenedor").load('pages/crearPOA.php');
     //$("#contenedor").load('../cargarPOAs.php');
}

function problemas()
{
    $("#contenedor").text('Problemas en el servidor.');
}