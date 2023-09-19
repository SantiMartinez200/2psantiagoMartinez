<?php
require("../../TRABAJO_PRACTICO/Objetos/Profesor.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABM PROFESOR</title>
  <link rel="stylesheet" href="../../TRABAJO_PRACTICO/Profesor/CSS/styleABMProfesor.css">
  <link rel="stylesheet" href="../../TRABAJO_PRACTICO/css/bootstrap.css" />
</head>

<body>
  <div class="p-3 mb-2 bg-light text-dark">
    <h1 class="h1title">Esta es la sección del ABM Profesor.</h1>
    <h3 class="h3title">Puedes elegir dar de alta un Profesor nuevo, o eliminar/actualizar uno ya existente en la tabla
      debajo.</h3>
  </div>

  <div class="container-add">
    <h2 class="container__title">Registrar Profesor</h2>
    <form class="container__form" action="../Profesor/Alta.php" method="POST"><label for=""
        class="container__label">Nombre:</label><input type="text" class="container__input" name="nombre"><label for=""
        class="container__label">Apellido:</label><input type="text" class="container__input" name="apellido"><label
        for="" class="container__label">DNI:</label><input type="number" class="container__input"
        name="dniProfesor"><label for="" class="container__label">Fecha de nacimiento:</label><input type="date"
        class="container__input" name="fechaNacimiento">
      <label for="" class="container__label">Titulación:</label><input type="text" class="container__input"
        name="titulacion">
      <input type="submit" value="Registrar Profesor" class="btn btn-outline-dark">
    </form>
  </div>

  <!--//////////////////////////////////////////////////////////////////////-->
  <div class="container-tableAlumnos">
    <div class="table-title">Profesores</div>
    <div class="table-header">DNI</div>
    <div class="table-header">NOMBRE</div>
    <div class="table-header">APELLIDO</div>
    <div class="table-header">TITULACIÓN:</div>
    <div class="table-header">FECHA DE NACIMIENTO</div>
    <div class="table-header">OPERACION</div>
    <?php
    require_once("../../TRABAJO_PRACTICO/BD/conexion.php");
    $selectQuery = "SELECT * FROM profesor";
    $myQuery = $connection->prepare($selectQuery);
    $myQuery->execute();
    $divGenerator = $myQuery->fetchAll();
    foreach ($divGenerator as $cadaProfesor) {
      ?>
      <div class="table-item">
        <?php print($cadaProfesor["dni_profesor"]); ?>
      </div>
      <div class="table-item">
        <?php print($cadaProfesor["nombre"]); ?>
      </div>
      <div class="table-item">
        <?php print($cadaProfesor["apellido"]); ?>
      </div>
      <div class="table-item">
        <?php print($cadaProfesor["titulo"]); ?>
      </div>
      <div class="table-item">
        <?php print($cadaProfesor["fecha_nacimiento"]); ?>
      </div>
      <div class="table-item">
        <a href="../../TRABAJO_PRACTICO/Profesor/Modificacion.php?dni=<?php echo($cadaProfesor["dni_profesor"]) ?>" class="table__item__modify">Actualizar</a>
        
        <a href="../../TRABAJO_PRACTICO/Profesor/Baja.php?id=<?php echo ($cadaProfesor["id"])?>" class="table__item__link"  >Eliminar</a>
    
      </div>

      <?php
    }
    ?>

  </div>
  <div class="regresar-container">
    <button type="button" class="btn btn-light"><a href="../../TRABAJO_PRACTICO/Index.html">Volver al
        inicio</a></button>
    <div>
      <?php
      ?>

      <script src="../../TRABAJO_PRACTICO/Profesor/JS/confirmDelete.js"></script>
</body>

</html>