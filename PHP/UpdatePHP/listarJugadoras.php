<?php                                       
require_once("../archivoConexion/conexion.php");
echo "<p>------------------------------------------</p>";
 $consultaJugadoras = "select * from jugadoras";
$stmnt = $connection->prepare($consultaJugadoras);
$stmnt->execute();
$jugadoras = $stmnt->fetchAll();

 foreach ($jugadoras as $cadaJugadora) {
  print_r($cadaJugadora["id"]);
  echo " ";
  print_r($cadaJugadora["nombre"]);
  echo " ";
  print_r($cadaJugadora["apellido"]);
  echo " ";
  print_r($cadaJugadora["club"]);
  echo " ";
  print_r($cadaJugadora["edad"]);
  echo "<br>";
 }
  echo "<p>------------------------------------------</p>";
echo "<a href='indexHtml.php'>Volver a Actualizar ID</a>";
?>