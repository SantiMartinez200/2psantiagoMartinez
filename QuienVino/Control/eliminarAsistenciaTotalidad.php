<?php
require("../BD/conn.php");
require("../Clases/Asistencia.php");
$conectarDB = new Conexion();
$conectarDB->connect();
$asis = Asistencia::deleteALL();
$ejecutar = $conectarDB->ejecutar($asis);
if ($ejecutar){
  $reset = Asistencia::resetID();
  $ejecutar = $conectarDB->ejecutar($reset);
  $conectarDB->killConn();
  echo "<script>window.location='parametros.php?err=deletedall'</script>";
}else{
  $conectarDB->killConn();
  echo "<script>window.location='parametros.php?err=alreadydeleted'</script>";
}
?>