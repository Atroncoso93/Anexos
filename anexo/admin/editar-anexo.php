<?php 
include('header.php');
include('archives/connection.php'); 
include('archives/authorization.php'); // archivo de autorizacion para restringir acceso
?>
<?php

    $id = $_GET['id'];

if (isset($_POST['modificar'])) {
	 
	 $nombre = $_POST['nombre'];
	 $direccion = $_POST['direccion']; 
	 $cargo = $_POST['cargo']; 
	 $anexo = $_POST['anexo'];
	 
	  $id_usuario = $_SESSION['sesion_user'];
	    
	  $quer = mysql_query("SELECT * FROM usuario WHERE id = '$id_usuario'"); // comprobamos que existe el usuario con el id
      $ro = mysql_fetch_array($quer); 
	  
	  $usuario = $ro['nombre'];
	  $fecha = date("Ymd h:i:s");
	
	  mysql_query("INSERT INTO info_muni (nombre, anexo, tipo, usuario, fecha_hora) VALUES ('$nombre','$anexo','Edito','$usuario','$fecha')"); 	  
	 	
     $query_update = mysql_query ("UPDATE anexos_muni SET nombre='$nombre', direccion='$direccion', cargo='$cargo', anexo='$anexo' WHERE id = '$id'");
	  if($query_update) { //si esta ok se registra al nuevo usuario
         echo "<div id='alerta' class='exito'>
                 <div>
                    <a id='cerrar' title='Cerrar'></a>
                 </div>
                 <p>Los datos fueron modificados correctamente.</p>
                 <input type='submit' onclick=\"location.href='telefonos.php'\" value='Aceptar' class='btn' />
               </div>";
      }else {    //si ocurre error se arroja mensaje
         echo "<div id='alerta' class='error'><div><a id='cerrar' title='Cerrar'></a></div>Ha ocurrido un error y no se pudo realizar la modificación.</div>"; 
      }
}
?> 

<?php
    	 
	 $query = mysql_query("SELECT * FROM anexos_muni WHERE id = '$id'"); 
     $row = mysql_fetch_array($query); // si la consulta encuentra el id, mostramos en pantalla el nombre de la "zona" y y su respectiva "imagen" 
?>

<h2>Modificar Anexo</h2>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="modificar">
  <div class="formulario"> 
  <div class="label col-1">Nombre</div>
  <div class="col-4"><input type="text" name="nombre" class="input-text" value="<?php echo $row['nombre']; ?>"/></div>
  </div>
  
  <div class="formulario"> 
  <div class="label col-1">Dirección</div>
  <div class="col-4"><input type="text" name="direccion" class="input-text" value="<?php echo $row['direccion']; ?>"/></div>
  </div>
  
  <div class="formulario"> 
  <div class="label col-1">Cargo/Función</div>
  <div class="col-4"><input type="text" name="cargo" class="input-text" value="<?php echo $row['cargo']; ?>"/></div>
  </div>  
  
  <div class="formulario"> 
  <div class="label col-1">Anexo</div>
  <div class="col-4"><input type="text" name="anexo" maxlength="4" class="input-text" value="<?php echo $row['anexo']; ?>"/></div>
  </div>
  
  <br />
  <br />
  
  <div class="formulario pull-center"> 
  <input type="submit" name="modificar" class="input-btn" value="Actualizar datos" /> 
  </div> 
</form>


<?php include('footer.php')?>