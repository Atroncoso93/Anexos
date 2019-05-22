<?php 
include('header.php');
include('archives/connection.php'); 
include('archives/authorization.php'); // archivo de autorizacion para restringir acceso
?>
<?php

if (isset($_POST['agregar'])) {
	 
	  if(empty($_POST['nombre'])) { // comprobamos que el campo rut no esté vacío 
			 $error[] = "El campo <b>Nombre</b> es requerido.";			  
             }
	  if(empty($_POST['direccion'])) { // comprobamos que el campo rut no esté vacío 
			 $error[] = "El campo <b>Direccion/Dpto</b> es requerido.";			  
             }
	  if(empty($_POST['cargo'])) { // comprobamos que el campo rut no esté vacío 
      if ($_POST{'cargo'==''}) {
        echo "campo vacio";
      }
      
			 $error[] = "El campo <b>Cargo/Función</b> es requerido.";			  
             }			 
	  if(empty($_POST['anexo'])) { // comprobamos que el campo rut no esté vacío 
			 $error[] = "El campo <b>Anexo</b> es requerido.";			  
             }
			 
      $nombre = $_POST['nombre'];
	  $direccion = $_POST['direccion']; 
	  $cargo = $_POST['cargo']; 
	  $anexo = $_POST['anexo'];
	       
	  
	  $id_usuario = $_SESSION['sesion_user'];
	    
	  $quer = mysql_query("SELECT * FROM usuario WHERE id = '$id_usuario'"); // comprobamos que existe el usuario con el id
      $ro = mysql_fetch_array($quer); 
	  
	  $usuario = $ro['nombre'];
	  $fecha = date("Ymd h:i:s");
	  
	  mysql_query("INSERT INTO info_muni (nombre, anexo, tipo, usuario, fecha_hora) VALUES ('$nombre','$anexo','Agrego','$usuario','$fecha')"); 
	  
	  if(!isset($error)){
	       // comprobamos que el usuario ingresado no haya sido registrado antes 
      $sql = mysql_query("SELECT anexo FROM anexos_muni WHERE anexo = '$anexo'"); 
             
  	  if(mysql_num_rows($sql) > 0) { //si existe se arroja el mensaje
  		    echo "<div id='alerta' class='alerta'><div><a id='cerrar' title='Cerrar'></a></div>El <b>anexo</b> elegido ya ha sido registrado anteriormente.</div>"; 
  	  } else { 
         // ingresamos los datos a la BD 
         $reg = mysql_query("INSERT INTO anexos_muni (nombre, direccion, cargo, anexo) VALUES ('$nombre', '$direccion', '$cargo', '$anexo')");

         if($reg) { //si esta ok se registra al nuevo usuario
            echo "<div id='alerta' class='exito'>
                    <div>
                    <a id='cerrar' title='Cerrar'></a>
                    </div>
                    <p>Elemento registrado correctamente.</p> 
                    <input type='submit' onclick=\"location.href='telefonos.php'\" value='Aceptar' class='btn' />
                  </div>";
         } else {    //si ocurre error se arroja mensaje
            echo "<div id='alerta' class='error'>
                    <div><a id='cerrar' title='Cerrar'></a>
                    </div>
                    <p>Ha ocurrido un error y no se pudo hacer el registro.</p> 
                    <input type='submit' onclick=\"location.href='agregar-anexo.php'\" value='Aceptar' class='btn2' />
                  </div>"; 
         }
       } 
	  }
		  if(isset($error)){ // comprobamso si existen errores en los campos, si lo hay los mostrara en pantalla
			  echo "<div id='alerta' class='error'>";
			  echo "<div><a id='cerrar' title='Cerrar'><input type='submit' onclick=\"location.href='agregar-anexo.php'\" value='Cerrar' class='btn2' /></a></div>";
              foreach($error as $errores){
                 echo $errores."<br>";
              }
			  echo "</div>";
		  }
}
?>

<h2>Agregar Anexo</h2>


<form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="modificar">
  <div class="formulario"> 
  <div class="label col-1">Nombre</div>
  <div class="col-4"><input type="text" name="nombre" class="input-text"/></div>
  </div>
  
  <div class="formulario"> 
  <div class="label col-1">Dirección/Dpto</div>
  <div class="col-4"><input type="text" name="direccion" class="input-text"/></div>
  </div>
  
  <div class="formulario"> 
  <div class="label col-1">Cargo/Función</div>
  <div class="col-4"><input type="text" name="cargo" class="input-text"/></div>
  </div>  
  
  <div class="formulario"> 
  <div class="label col-1">Anexo</div>
  <div class="col-4"><input type="text" name="anexo" maxlength="4" class="input-text"/></div>
  </div>
  
  <br />
  <br />
  
  <div class="formulario pull-center"> 
  <input type="submit" name="agregar" class="input-btn" value="Agregar Registro" /> 
  </div> 
</form>
<?php include('footer.php')?>