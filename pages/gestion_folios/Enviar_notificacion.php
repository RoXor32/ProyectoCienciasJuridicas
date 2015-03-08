 <?php

    try{


        $addNroFolio= $_POST['NroFolio'];
        $addUsuario= $_POST['idEmisor'];
        $addTitulo = $_POST['Titulo'];
        $addMensaje= $_POST['Cuerpo'];
        $addFechaCreacion= $_POST['FechaCreacion'];
        
        

        if($addTitulo == "" or $addTitulo == NULL){
            $mensaje = "Por favor introduzca el titulo de la notificacion";
            $codMensaje = 0;
        }elseif($addMensaje == "" or $addMensaje == NULL){
            $mensaje = "Por favor introduzca un mensaje";
            $codMensaje = 0;
        }

    }elseif($addNroFolio == "" or $addNroFolio== NULL){
            $mensaje = "Por favor introduzca Folio";
            $codMensaje = 0;
        }




        else{

        require_once("../../conexion/config.inc.php");
	
        $sql = "INSERT INTO notificaciones_folios Values(NULL,:addNroFolio,:addUsuario,:addTitulo,:addMensaje,:addFechaCreacion)";

        $query = $db->prepare($sql);

        $query ->bindParam(":addNroFolio",$addNroFolio);
        $query ->bindParam(":addUsuario",$addUsuario);
        $query ->bindParam(":addTitulo",$addTitulo);
        $query ->bindParam(":addMensaje",$addMensaje);
        $query ->bindParam(":addFechaCreacion",$addFechaCreacion);
        $query->execute();

		
	

      $rs = mysql_query("SELECT MAX(IdNotificacion) AS id FROM notificaciones_folios");
		if ($row = mysql_fetch_row($rs)) {
		$id = trim($row[0]);
		}
		
		$sql1 = "INSERT INTO usuario_notificados Values(NULL,$id,:addUsuario,2,:addFechaCreacion)";
        $query1 = $db->prepare($sql1);
        $query1 ->bindParam(":addUsuario",$addUsuario);		
		$query1 ->bindParam(":addFechaCreacion",$addFechaCreacion);
		
		
		
        $mensaje = "Notificacion enviada correctamente";
        $codMensaje = 1;

        }i

    }catch(PDOExecption $e){
        $mensaje = "Al tratar de enviar, por favor intente de nuevo";
        $codMensaje = 0;
    }