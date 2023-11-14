<?php
require("../BD/conn.php");
require("../Clases/Persona.php");
require("../Clases/Alumno.php");
$conectarDB = new Conexion();
$conectarDB->connect();
$alumnos = Alumno::deleteAll();
$ejecutar = $conectarDB->ejecutar($alumnos);
if ($ejecutar) {
  $conectarDB->killConn();
  echo "<script>window.location='parametros.php?err=deletedAlumnos'</script>";
} else {
  $conectarDB->killConn();
  echo "<script>window.location='parametros.php?err=alreadydeleted'</script>";
}
?>