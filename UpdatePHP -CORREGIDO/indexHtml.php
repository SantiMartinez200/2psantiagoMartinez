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
  <input type="submit" value="consultar">
  <select name="nombreSelect">
  <?php

  $listQuery = "SELECT * FROM jugadoras";
  $listStatement = $connection->prepare($listQuery); //traigo todos los datos
  $listStatement->execute();
  $listadoJugadoras = $listStatement->fetchAll();
  print_r($listadoJugadoras);
  foreach ($listadoJugadoras as $cadaJugadora) {
    ?>
    <option value="<?php print($cadaJugadora['nombre']); ?>"><?php print_r($cadaJugadora['nombre']); ?></option>          
    <?php
  } //lleno el menú select
  ?>
</select>

</form>
<?php
  }else{
$nombre = $_POST["nombreSelect"];
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
    ?>
    <form action="cambiarDatos.php" method="post">
    <h3>Cambia sus datos.</h3>
    <input type="text" name="nombre" placeholder="NOMBRE" value="<?php echo ($nombreOriginal); ?>">  
    <input type="text" name="apellido" placeholder="APELLIDO" value="<?php echo ($apellidoOriginal); ?>">  
    <input type="text" name="club" placeholder="CLUB" value="<?php echo ($clubOriginal); ?>">                 <!--Entro una nueva ID-->
    <input type="number" name="edad" placeholder="EDAD" value="<?php echo ($edadOriginal); ?>"> 
    <input type="number" name="id" hidden value="<?php echo ($idOriginal); ?>"> 
    <input type="submit" value="Cambiar datos">
    </form>
    <?php
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