<?php session_start();
include('archives/connection.php'); 
//include('archives/authorization.php'); 
?>

<?php	
	 
     if(isset($_REQUEST['id'])){
		 $id = $_REQUEST['id'];
		 
		 $query = mysql_query("DELETE FROM anexos_muni WHERE id = '$id'");
			 if($query){
				$_SESSION['m'] = "exito";
				header("Location: telefonos.php");
				 }
			 else{
				$_SESSION['m'] = "error";
				header("Location: telefonos.php");
				 }	
	 }else{
		 header("Location: telefonos.php");
	 }
?>