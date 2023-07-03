<?php
require_once("../archivoConexion/conexion.php");

If ($_SERVER["REQUEST_METHOD"] == "POST"){
  $nombreJugadoras = $_POST["nombreJugadora"];
  $apellidoJugadoras = $_POST["apellidoJugadora"];
  $clubJugadoras = $_POST["clubJugadora"];
  $edadJugadoras = $_POST["edadJugadora"];
  /////////Segundo IF/////////////
  if (($nombreJugadoras && $apellidoJugadoras && $clubJugadoras && $edadJugadoras)<>null){
    echo "datos no vacios :)";
    $query = "INSERT INTO jugadoras (nombre,apellido,club,edad) values (:nombre,:apellido,:club,:edad)";
    $miConsulta = $connection -> prepare($query);

    $miConsulta -> bindParam(":nombre", $nombreJugadoras);
    $miConsulta -> bindParam(":apellido", $apellidoJugadoras);
    $miConsulta -> bindParam(":club", $clubJugadoras);
    $miConsulta -> bindParam(":edad", $edadJugadoras);
    $miConsulta -> execute();
  }else{
    echo "Hubo algun dato vacio";
  }



}else {
  echo "Error Post";
}
?>