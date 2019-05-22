<?php
include('header.php');
include('archives/connection.php'); 
include('archives/authorization.php'); // archivo de autorizacion para restringir acceso
?>
<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
			      "sSearch": "Buscador: _INPUT_",
			      "zeroRecords": "No se encontro el registro",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Los registros no estan disponibles"
			      // "sPrevious": "Previo",
			      //"sNext":"Siguiente"
        },
        "lengthMenu": [10, 25, 50, 500]
    });			
});
</script>

<?php
if(isset($_SESSION['m'])){
	 if($_SESSION['m'] === 'exito'){
	      echo "<div id='alerta' class='exito'>
                <div>
                  <a id='cerrar' title='Cerrar'></a>
                </div>
                Se ha eliminado con exito el <b>Anexo</b>!
                <br><br>
                <input type='submit' onclick=\"location.href='telefonos.php'\" value='Aceptar' class='btn' />
              </div>";
	      unset($_SESSION['m']);
	 }
	 elseif($_SESSION['m'] === 'error'){
	      echo "<div id='alerta' class='error'><div><a id='cerrar' title='Cerrar'>X</a></div>Ocurrio un error y no se pudo eliminar!</div>";  
	      unset($_SESSION['m']);
	 }
	 
}
?> 


<?php

$result = mysql_query("SELECT id, nombre, direccion, cargo, anexo FROM anexos_muni ORDER BY nombre ASC") or die ("Falla de Conexion");
                      //seleccionamos la informacion de la base de datos y de la tabla. 
?>
   <table id="example" class="tabla display" cellspacing="0" width="100%">
     <thead>
       <tr class="fila">
         <th class="celda-title" title="Ordenar por Nombre">Nombre</th>
         <th class="celda-title" title="Ordenar por Dirección">Dirección/Departamento</th>
         <th class="celda-title" title="Ordenar por Cargo">Cargo/Función</th>
         <th class="celda-title" title="Ordenar por Anexo">Anexo</th>
         <th class="celda-title" width="150px">Acciones</th>         
       </tr>	
       </thead>
       <tbody>	
<?php
   while ($row = mysql_fetch_array($result)){
?>   
    <tr class="fila">	
    <td class="celda"><?php echo $row['nombre'] ?></td>
    <td class="celda"><?php echo $row['direccion'] ?></td>	
    <td class="celda"><?php echo $row['cargo'] ?></td>
    <td class="celda"><?php echo $row['anexo'] ?></td>
    <td class="celda"><a href="editar-anexo.php?id=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a> <a href="eliminar-anexo.php?id=<?php echo $row['id'] ?>" id="eliminar" onclick="return confirm('Esta seguro que desea eliminar el anexo?')"><span class="glyphicon glyphicon-remove"></span></a></td>    
    </tr>
	
<?php
	}
?>
</tbody>
  </table>
  

<?php
include ('footer.php');
?>