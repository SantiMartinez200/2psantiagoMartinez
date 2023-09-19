<?php
require("../../TRABAJO_PRACTICO/Objetos/Alumno.php");
//primer pantalla: indexhtml con una cajita para poner el DNI y poner CONSULTAR
//Un menú que diga ALUMNO y otro PROFESOR, que lleven a sus pantallas correspondientes y dar un ABM de cada uno.
//Usar BoostStrap
//ABM : Alta-Baja-Modificacion
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABM ALUMNO</title>
  <link rel="stylesheet" href="../../TRABAJO_PRACTICO/Alumno/CSS/styleABM.css">
  <link rel="stylesheet" href="../../TRABAJO_PRACTICO/css/bootstrap.css" />
</head>

<body>
  <div class="p-3 mb-2 bg-light text-dark">
    <h1 class="h1title">Esta es la sección del ABM alumno.</h1>
    <h3 class="h3title">Puedes elegir dar de alta un alumno nuevo, o eliminar/actualizar uno ya existente en la tabla
      debajo.</h3>
  </div>

  <div class="container-add">
    <h2 class="container__title">Registrar Alumno</h2>
    <form class="container__form" action="../Alumno/Alta.php" method="POST"><label for=""
        class="container__label">Nombre:</label><input type="text" class="container__input" name="nombre"><label for=""
        class="container__label">Apellido:</label><input type="text" class="container__input" name="apellido"><label
        for="" class="container__label">DNI:</label><input type="number" class="container__input" name="dni"><label
        for="" class="container__label">Fecha de nacimiento:</label><input type="date" class="container__input"
        name="fechaNacimiento">
      <input type="submit" value="Registrar Alumno" class="btn btn-outline-dark">
    </form>
  </div>

  <!--//////////////////////////////////////////////////////////////////////-->
  <div class="container-tableAlumnos">
    <div class="table-title">Alumnos</div>
    <div class="table-header">DNI</div>
    <div class="table-header">NOMBRE</div>
    <div class="table-header">APELLIDO</div>
    <div class="table-header">FECHA DE NACIMIENTO</div>
    <div class="table-header">OPERACION</div>
    <?php
    require_once("../../TRABAJO_PRACTICO/BD/conexion.php");
    $selectQuery = "SELECT * FROM alumno";
    $myQuery = $connection->prepare($selectQuery);
    $myQuery->execute();
    $divGenerator = $myQuery->fetchAll();
    foreach ($divGenerator as $cadaAlumno) {
      ?>
      <div class="table-item">
        <?php print($cadaAlumno["dni"]); ?>
      </div>
      <div class="table-item">
        <?php print($cadaAlumno["nombre"]); ?>
      </div>
      <div class="table-item">
        <?php print($cadaAlumno["apellido"]); ?>
      </div>
      <div class="table-item">
        <?php print($cadaAlumno["fecha_nacimiento"]); ?>
      </div>
      <div class="table-item">
        <a href="../../TRABAJO_PRACTICO/Alumno/Modificacion.php?dni=<?php echo ($cadaAlumno["dni"]) ?>" class="table__item__modify">Actualizar</a>

        <a href="../../TRABAJO_PRACTICO/Alumno/Baja.php?dni=<?php echo ($cadaAlumno["dni"]) ?>"
          class="table__item__link">Eliminar</a>
      </div>
      <?php
    }
    ?>

  </div>
  <div class="regresar-container">
    <button type="button" class="btn btn-light"><a href="../../TRABAJO_PRACTICO/Index.html">Volver al
        inicio</a></button>
    <div>
      <script src="../../TRABAJO_PRACTICO/Alumno/JS/confirmDelete.js"></script>
</body>

</html>