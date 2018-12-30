
<?php
include('includes/stock.php');
date_default_timezone_set('America/Bogota');
foreach($_POST as $nombre_campo => $valor){
  $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
  eval($asignacion);
}




$connect->close();
 ?>
