<?php

session_start();

$contenido = $_SESSION['contenido'];

if(isset($_GET['code']))
{
  $code = $_GET['code'];
  switch ($code) 
  {
      case 101:
	      session_unset();
        session_destroy(); // Destroying All Sessions
	   	  session_start();
          if($contenido == 'index')
          {
          echo '<script>window.top.location.href="login.php?error_code=5"</script>';
          exit();
          }
        echo '<script>window.top.location.href="login/login.php?error_code=5"</script>';
        //header("Location: login.php?error_code=5");
        exit();
        break;
      default:
	      session_unset();
        session_destroy(); // Destroying All Sessions
		    session_start();
        header("Location: login.php?error_code=0");
        exit();
        break;
  }
}
else
{  
  session_destroy(); // Destroying All Sessions
  header("Location: login.php"); // Redirecting To Home Page
}
?>