<?php 
include('header-ini.php');
include('archives/connection.php'); 
?>

<?php	 
if (isset($_POST['enviar'])) { // se comprueba el submit 
  
  if(empty($_POST['user'])) { // comprobamos que el campo email no esté vacío 
             $error[] = "El campo <b>Email</b> es requerido."; 
  }      
  if(empty($_POST['password'])) { // comprobamos que el campo clave no esté vacío 
             $error[] = "El campo <b>Clave</b> es requerido."; 
  }
  
  $user = addslashes($_POST['user']); // se limpia el campo
  $pass = addslashes($_POST['password']);	
  
  if(!isset($error)){
  
		$query = mysql_query("SELECT id FROM usuario WHERE nombre = '$user' AND clave = '$pass'"); // comprobamos nombre de usuario y contraseña
		
		if(mysql_num_rows($query) > 0){  // si encuentra el usuario generamos las variables de sesion a utilizar en el sitio
			$row = mysql_fetch_array($query);
			$_SESSION['sesion_user'] = $row['id']; // variable de sesion principal con la cual restringiremos el acceso a algunas paginas (ej: mi-cuenta.php)
			header("location: telefonos.php"); // redireccionamos al index pero ahora con las llaves de acceso
		}
		else{
	        echo "<div id='alerta' class='error'>
                  <div>
                    <a id='cerrar' title='Cerrar'></a>
                  </div>
                  <p>Usuario no existe!</p>
                  <input type='submit' onclick=\"location.href='index.php'\" value='Aceptar' class='btn2' />
                </div>";
          // header('location: index.php');
	    }
    
  }
	
  if(isset($error)){
		echo "<div id='alerta' class='alerta'>";
		echo "<div><a id='cerrar' title='Cerrar'>x</a></div>";
              foreach($error as $errores){
                 echo $errores."<br>";
              }
			  echo "</div>";
  }  
}

if(@$_REQUEST['m'] === "error"){ 
	  echo "<div id='alerta' class='error'><div><a id='cerrar' title='Cerrar'>x</a></div>Debe Iniciar Sesión para ingresar a esta Página</div>";
    header('location:index.php');
	}
?>  

<div class="site2">

<div class="recuperar">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
     		<h2>Acceso</h2>
            <div class="formulario">
            <div class="label col-1">Usuario</div>
            <div class="col-3"> 
            <input type="text" name="user" class="input-text" autocomplete="off">
            </div>
            </div>
            
            <div class="formulario">
            <div class="label col-1">Contraseña</div>
            <div class="col-3"> 
			<input type="password" name="password" class="input-text" autocomplete="off">
            </div>
            </div>
            
            <div class="formulario">
            <div class="col-2">
			<input type="submit" name="enviar" class="input-btn" value="Ingresar">
            </div>
            </div>             
        </form>
</div>        
        
</div>

 
<?php include('footer.php')?>