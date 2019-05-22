<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="ico.ico">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script src="fancybox/jquery.fancybox.js"></script>
<script src="fancybox/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.font.css"/>
<title>Guia Telefónica | Municipalidad de La Florida</title>
</head>
<script>
$(document).ready( function() { // funcion para ocultar notificaciones emergentes.
	$("#cerrar").click( function() {
    $("#alerta").ready( function() {
      setTimeout( function() { 
        $("#alerta").remove();
      },5000);
    });
  });
});
</script>
<body>
<div class="header">
	<div class="logo">
		<img src="images/logo-lf.png" alt=""/>
    </div>
    <h1>GUIA TELEFONICA MUNICIPAL</h1>
</div>


    <div class="wrap-menu">

         <!-- menu cargado izquierda --> 
        <ul class="menu pull-left">
          <li><a href="telefonos.php">Lista de Anexos</a></li>
          <li><a href="agregar-anexo.php">Agregar Anexo</a></li>           
        </ul>
    
        <ul class="menu pull-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuario <span class="caret"></span></a>
                <ul class="sub-menu">
                  <li><a href="cambioContrasena.php"><span class="glyphicon glyphicon-lock"></span> Cambio de Contraseña </a></li>
                  <li><a href="cerrar-sesion.php"><span class="glyphicon glyphicon-off"></span> Cerrar Sesión</a></li>
                </ul>
            </li>
        </ul>
    
    </div>

<div class="site">