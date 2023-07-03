<?php                                       //esto solo se ejecuta
require_once("../archivoConexion/conexion.php");
$query = "select * from users";
$statement = $connection->prepare($query);
$statement->execute();                              //esto solo se ejecuta
$usuarios=$statement->fetchAll();

$acuUsers = 0;
$acuJugadoras = 0;
//var_dump($usuarios);
foreach ($usuarios as $cadaUsuario["id"]) {
  print_r($cadaUsuario["id"]["id"]);
  echo " ";
  print_r($cadaUsuario["id"]["nombre"]);
  echo " ";
  print_r($cadaUsuario["id"]["apellido"]);
  echo " ";
  print_r($cadaUsuario["id"]["edad"]);
  echo "<br>";
  $acuUsers = $acuUsers + $cadaUsuario["id"]["edad"];
  ///AGREGAR APELLIDOS Y MOSTRAR
  ////------------------------------------------------------------////
  ////Tabla de JUGADORAS, con ID, nombre, apellido, club.
  ////FTBL FEMENINO SELECCION MUNDIAL
}

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
  $acuJugadoras = $acuJugadoras + $cadaJugadora["edad"];
 }
  echo "<p>------------------------------------------</p>";
///CONSIGNA::: AGREGAR A LAS DOS TABLAS (USERS Y JUGADORAS) EL CAMPO """EDAD""" == INTEGER, CALCULAR QUE TABLA TIENE MAYOR EDAD SUMADA.
echo "-------------------calculos auxiliares---------------------" . "<br>";
echo "Edad total de la gurisada: ". $acuUsers . "<br>";
echo "Edad total de las pibas: ". $acuJugadoras . "<br>";
echo "-------------------calculos auxiliares---------------------". "<br><br>";
if ($acuUsers<$acuJugadoras) {
  echo "la tabla de las jugadoras es la que tiene mayor edad acumulada." . $acuJugadoras;
}else {
  echo "la tabla de los pibes es la que tiene mayor edad acumulada." . $acuUsers;
}



?>