<?php 
include('header.php');
include('archives/connection_aborted().php'); 
include('archives/authorization.php'); // archivo de autorizacion para restringir acceso
?>

<?php
if(isset($_REQUEST['cambiar'])){

     if(strlen($_REQUEST['contrasena1']) > 15){
         $error[] = "La clave debe tener menos 15 caracteres";
     }
	 elseif(empty($_REQUEST['contrasena1'])){
		 $error[] = "El campo esta vacio.";	 
	 }	
	 // elseif(strpos($_REQUEST['contrasena1'], " ")){
		//  $error[] = "La contraseña no debe tener espacios en blanco.";
	 // }
  //    elseif(!preg_match('/[a-z]/',$_REQUEST['contrasena1'])){
  //        $error[] = "La contraseña debe tener letras Minusculas";
  //    }	 
  //    elseif(!preg_match('/[A-Z]/',$_REQUEST['contrasena1'])){
  //        $error[] = "La contraseña debe tener al menos una letra Mayuscula";
  //    }
  //    elseif(!preg_match('/[0-9]/',$_REQUEST['contrasena1'])){
  //        $error[] = "La contraseña debe tener al menos un Numero";
     
     /* elseif(preg_match('/[0-9]{2}/',$_REQUEST['contrasena1'])){
         $error[] = "La contraseña no debe tener numeros consecutivos";
     }*/
	 elseif ($_REQUEST['contrasena1'] != $_REQUEST['contrasena2']) {
		 $error[] = "Las contraseñas no coinciden"; 
	 }
	 
	 $contrasena1 = $_REQUEST['contrasena1'];
	 $contrasena2 = $_REQUEST['contrasena2'];
	 
	 if(!isset($error)){

		
		 $fecha_cam_pass = date("Y-m-d");

         $fecha_exp_pass = strtotime ('+30 day' ,strtotime ($fecha_cam_pass)) ;
         $fecha_exp_pass = date ('Y-m-j' , $fecha_exp_pass);
				
		 $query = mysqli_query($conn, "UPDATE usuario SET clave = '$contrasena1' WHERE id = '".$id."'");
		   if($query) { //si esta ok se registra al nuevo usuario									
				echo   "<div id='alerta' class='exito'>
							<div>
								<a id='cerrar' title='Cerrar'></a>
							</div>
							<p>Su contraseña se ha cambiado con exito!</p>
							<input type='submit' onclick=\"location.href='telefonos.php'\" value='Aceptar' class='btn' />
						</div>"; 	
				$contrasena1 = "";
           }else {    //si ocurre error se arroja mensaje
                echo    "<div id='alerta' class='error'>
                			<div>
                				<a id='cerrar' title='Cerrar'></a>
                			</div>
                			<p>Ha ocurrido un error y no se pudo cambiar la contraseña.</p>
                			<input type='submit' onclick=\"location.href='telefonos.php'\" value='Aceptar' class='btn2' />
                		</div>"; 
           }
		 
	 }
	 if(isset($error)){ // comprobamso si existen errores en los campos, si lo hay los mostrara en pantalla
			  echo "<div id='alerta' class='error'>";
			  echo "<div><a id='cerrar' title='Cerrar'><input type='submit' onclick=\"location.href='cambioContrasena.php'\" value='Cerrar' class='btn2' /></a></div>";
              foreach($error as $errores){
                 echo $errores."<br>";
              }
			  echo "</div>";
		  }
}
?>

<div class="site2">

<div class="recuperar">

<h3>Cambiar Contrase&ntilde;a</h3>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal">

     <div class="formulario">
      <label class="control-label col-sm-2">Contraseña Nueva</label>
      <div class="col-3">
<input type="password" id="contrasena1" name="contrasena1" value="<?php echo @$contrasena1; ?>" class="input-text">
      </div>
     </div>
     <div class="formulario"> 
      <label class="control-label col-sm-2" for="pwd">Repetir Contrase&ntilde;a</label>
      <div class="col-3">          
  <input type="password" id="contrasena2" name="contrasena2" class="input-text">
      </div>
      
   </div>

     <div class="formulario">
     <div class="col-2"></div>
     <div class="col-2">
		<input type="submit" name="cambiar" class="input-btn" value="Guardar cambios">
     </div>
     </div>
     
     
 </form>    
<?php include('footer.php')?>


Notice: Undefined variable: conn in C:\xampp\htdocs\mmm\admin\cambioContrasena.php on line 46

Notice: Undefined variable: id in C:\xampp\htdocs\mmm\admin\cambioContrasena.php on line 46

Warning: mysqli_query() expects parameter 1 to be mysqli, null given in C:\xampp\htdocs\mmm\admin\cambioContrasena.php on line 46