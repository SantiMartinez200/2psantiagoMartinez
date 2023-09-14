<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla</title>
</head>
<style>
  table {
    border: 1px solid;
  }
  tr,td,th {
    border: 1px solid;
  }
</style>
<body>
<?php                                       
require_once("../archivoConexion/conexion.php");
 $consultaJugadoras = "select * from jugadoras";
$stmnt = $connection->prepare($consultaJugadoras);
$stmnt->execute();
$jugadoras = $stmnt->fetchAll();
?>

<table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Club</th>
      <th>Edad</th>
    </tr>
    <?php
    foreach ($jugadoras as $cadaJugadora) {
      ?>
      <tr>
      <td><?php print_r($cadaJugadora["id"]); ?></td>
      <td><?php print_r($cadaJugadora["nombre"]); ?></td>
      <td><?php print_r($cadaJugadora["apellido"]); ?></td>
      <td><?php print_r($cadaJugadora["club"]); ?></td>
      <td><?php print_r($cadaJugadora["edad"]); ?></td>
      </tr>
      <?php
     }
     echo "<a href='indexHtml.php'>Volver a Actualizar ID</a>";
    ?>
    </table>
</body>
</html>
