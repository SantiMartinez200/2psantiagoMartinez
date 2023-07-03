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
<h3>Colocale una ID nueva.</h3>
<input type="number" name="id">                 <!--Entro una nueva ID-->
<input type="submit" value="id" onclick="miConsulta()">
</form>
<?php
  }else{
$nombre = $_POST["nombreSelect"];
$id = $_POST["id"];
$updateQuery = "UPDATE jugadoras SET id=$id
WHERE nombre='$nombre'";
if ($connection->query($updateQuery)) {
  echo '<p>ID actualizado con éxito</p>';
} else {
        echo '<p>Hubo un error al actualizar el cliente: </p>';
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