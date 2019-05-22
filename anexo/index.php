<?php
include "header.php";
?>

<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
			 "sSearch": "Buscador: _INPUT_",
			 "zeroRecords": "No se encontro el registro",
             "info": "Mostrando pagina _PAGE_ de _PAGES_",
             "infoEmpty": "Los registros no estan disponibles",
			// "sPrevious": "Previo",
			 //"sNext":"Siguiente"
        }
    });			
});
</script>

<?php
include "archives/connection.php";

$result = mysql_query("SELECT nombre, direccion, cargo, anexo FROM anexos_muni ORDER BY nombre ASC") or die ("Falla de Conexion");
                      //seleccionamos la informacion de la base de datos y de la tabla. 
?>
   <table id="example" class="tabla display" cellspacing="0" width="100%">
   <thead>
   <tr class="fila">
     <th class="celda-title" title="Ordenar por Nombre">Nombre</th>
     <th class="celda-title" title="Ordenar por Dirección">Dirección/Departamento</th>
     <th class="celda-title" title="Ordenar por Dirección">Cargo/Función</th>
     <th class="celda-title" title="Ordenar por Anexo">Anexo</th>
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
    </tr>
	
<?php
	}
?>
   </tbody>
  </table>




<div class="telefonos">
<h2>Teléfonos Actualmente en Uso</h2>
      <div class="telefono">
    <h3>Modelo 5312</h3>
     <a id="single" href="images/5312_INST.jpg" title="Como Usar Guia Telefonica Modelo 5312"><img src="images/5312_v2.jpg" width="220" height="220"  alt=""/></a>
     <h3><a href="pdf/5312_QRG_SP.pdf" target="_blank">Ver Manual</a></h3>
   </div>
   
      <div class="telefono">
    <h3>Modelo 5320</h3>
     <a id="single" href="images/5320_INST.jpg" title="Como Usar Guia Telefonica Modelo 5320"><img src="images/5320.jpg" width="220" height="220"  alt=""/></a>
     <h3><a href="pdf/5320_QRC_MCD6.0_SPL.pdf" target="_blank">Ver Manual</a></h3>
   </div>
   
      <div class="telefono">
    <h3>Modelo 5324</h3>
     <a id="single" href="images/5324_INST.jpg" title="Como Usar Guia Telefonica Modelo 5324"><img src="images/5324.jpg" width="220" height="220"  alt=""/></a>
     <h3><a href="pdf/5324_QRG_SP.pdf" target="_blank">Ver Manual</a></h3>
   </div>
      <div class="telefono">
    <h3>Modelo 5360</h3>
     <a id="single" href="images/5360_INST.jpg" title="Como Usar Guia Telefonica Modelo 5360"><img src="images/5360_2.jpg" width="220" height="220"  alt=""/></a>
     <h3><a href="pdf/5360_QRC_SPL.pdf">Ver Manual</a></h3>
   </div>
   
    
</div>

<?php
include "footer.php";
?>