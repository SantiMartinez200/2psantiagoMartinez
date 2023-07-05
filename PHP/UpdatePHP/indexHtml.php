<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>actualizarBD</title>
</head>
<body>
  <h1>Selecciona un nombre de una jugadora y cambiale su id. verás el cambio reflejado en la base de datos.</h1>
  <?php
  require_once("../archivoConexion/conexion.php");
  if (!$_POST) {
    ?>
<form method="POST" action="indexHtml.php">
  <select name="nombreSelect">
  <?php

  $listQuery = "SELECT * FROM jugadoras";
  $listStatement = $connection->prepare($listQuery); //traigo todos los datos
  $listStatement->execute();
  $listadoJugadoras = $listStatement->fetchAll();
  var_dump($listadoJugadoras);
  foreach ($listadoJugadoras as $cadaJugadora) {
    ?>
    <option value="<?php print($cadaJugadora['nombre']); ?>"><?php print_r($cadaJugadora['nombre']); ?></option>          
    <?php
  } //lleno el menú select
  ?>
</select>
<h3>Cambia sus datos.</h3>
<input type="text" name="nombre" placeholder="NOMBRE">  
<input type="text" name="apellido" placeholder="APELLIDO">  
<input type="text" name="club" placeholder="CLUB">                 <!--Entro una nueva ID-->
<input type="number" name="edad" placeholder="EDAD">  
<input type="submit" value="Cambiar datos">
</form>
<?php
  }else{
$nombre = $_POST["nombreSelect"];
$nombreNuevo = $_POST["nombre"];
$apellidoNuevo = $_POST["apellido"];
$clubNuevo = $_POST["club"];
$edadNueva = $_POST["edad"];
    //echo $nombreNuevo, $apellidoNuevo, $clubNuevo, $edadNueva;
$queryAntigua = "SELECT * from jugadoras where nombre='$nombre';";
    $queryAntiguaStmt = $connection->prepare($queryAntigua);
    $queryAntiguaStmt->execute();
    $datosOriginales = $queryAntiguaStmt->fetchall();
    $idOriginal = $datosOriginales[0]['id'];
    $nombreOriginal = $datosOriginales[0]['nombre'];
    $apellidoOriginal = $datosOriginales[0]['apellido'];        //datos originales del registro
    $clubOriginal = $datosOriginales[0]['club'];
    $edadOriginal = $datosOriginales[0]['edad'];

if ((empty($nombreNuevo) && empty($apellidoNuevo) && empty($clubNuevo) && empty($edadNueva))){
      echo "<h1>Debes editar algun dato</h1>";
      ?>
      <a href="indexHtml.php">Volver a editar datos.</a>
      <?php
}else{
      if ($nombreNuevo<>$nombreOriginal && empty($nombreNuevo)<>true){
          $updateQuery = "UPDATE jugadoras SET nombre='$nombreNuevo' WHERE id='$idOriginal'";
          if ($connection->query($updateQuery)) {
               echo '<p>NOMBRE actualizado con éxito</p>';
          }
      }
      if ($apellidoNuevo<>$apellidoOriginal && empty($apellidoNuevo)<>true){
          $updateQuery = "UPDATE jugadoras SET apellido='$apellidoNuevo' WHERE id='$idOriginal'";
          if ($connection->query($updateQuery)) {
               echo '<p>APELLIDO actualizado con éxito</p>';
          }
      }
      if ($clubNuevo<>$clubOriginal && empty($clubNuevo)<>true){
        $updateQuery = "UPDATE jugadoras SET club='$clubNuevo' WHERE id='$idOriginal'";
        if ($connection->query($updateQuery)) {
               echo '<p>CLUB actualizado con éxito</p>';
          }
      }
      if ($edadNueva<>$edadOriginal && empty($edadNueva)<>true){
        $updateQuery = "UPDATE jugadoras SET edad='$edadNueva' WHERE id='$idOriginal'";
        if ($connection->query($updateQuery)) {
               echo '<p>EDAD actualizado con éxito</p>';
          }
      }
}
}
?>
  <p>
    <a href="indexHtml.php">Actualizar un Registro</a>
  </p>
  <p>
    <a href="listarJugadoras.php">Listar jugadoras</a>
  </p>

<!--<p>qué id queres cambiar?:</p>
<input type="number" name="nuevaId">

<p>Nueva id:</p>
<input type="number" name="nuevaId">

<button name="boton">Editar ID <a href="update.php"></a></button>-->
</body>
</html>