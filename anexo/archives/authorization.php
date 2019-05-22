<?php
// el archivo authorization.php se puede agregar a las paginas que quieras restringir.
$user_check = $_SESSION['sesion_user']; // utilizamos la variables de sesion del acceso para comprobar que el usuario este logeado.
echo $user_check;

$query = mysql_query("SELECT * FROM usuario WHERE id = '$user_check'"); // comprobamos que existe el usuario con el id
$row = mysql_fetch_array($query); 
$id_session = $row['id']; // nuevamente agregamos a una variable el id, el cual esta comprobado en la base de datos

//if(!isset($id_session)) // si no esta logeado o no existe, se redirecciona a la pagina de login o acceso.
//{
//header("location: acceso.php");
//}
?>