<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABM PROFESOR</title>
  <link rel="stylesheet" href="../../../QuienVino/ABM/Profesor/CSS/styleABMProfesor.css">
  <link rel="stylesheet" href="../../../QuienVino/Resources/css/bootstrap.min.css" />
</head>

<body>
  <div class="p-3 mb-2 bg-light text-dark">
    <h1 class="h1title">ABM del Profesor.</h1>
    <p><b>A</b>lta <b>B</b>aja <b>M</b>odificación.</p>
  </div>

  <div class="container col-10">
    <div id="textContainer" class="d-flex justify-content-center p-3 mb-2 bg-success text-white rounded">
      <h2 class="container__title">Registrar Profesor</h2>
    </div>
    <form class="form text-center p-3 mb-2 bg-light text-black col-12" action="../Profesor/Alta.php" method="POST">
      <div class="row">
        <div class="col">
          <label for="" class="container__label">Nombre:</label>
          <div class="d-flex justify-content-center"><input type="text" class="container__input" name="nombre"></div>
        </div>
        <div class="col">
          <label for="" class="container__label">Apellido:</label>
          <div class="d-flex justify-content-center"><input type="text" class="container__input" name="apellido"></div>
        </div>
        <div class="col">
          <label for="" class="container__label">Titulación:</label>
          <div class="d-flex justify-content-center"><input type="text" class="container__input" name="titulacion">
          </div>
        </div>
</div>
        <div class="row">
          <div class="col">
            <label for="" class="container__label">DNI:</label>
            <div class="d-flex justify-content-center"><input type="number" class="container__input" name="dniProfesor">
            </div>
          </div>
          <div class="col">
            <label for="" asdasd>Fecha de
              nacimiento:</label>
            <div class="d-flex justify-content-center"><input type="date" class="container__input"
                name="fechaNacimiento">
            </div>
          </div>
          <div class="col">
          </div>
        </div>
        <div class="col-12 text-center mt-3">
          <input type="submit" value="Registrar Profesor" class="btn btn-outline-success">
        </div>
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
    require_once("../../../QuienVino/BD/conexion.php");
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
        <a href="../../../../QuienVino/ABM/Profesor/Modificacion.php?dni=<?php echo ($cadaProfesor["dni_profesor"]) ?>"
          class="table__item__modify">Actualizar</a>

        <a href="../../ABM/Profesor/Baja.php?id=<?php echo ($cadaProfesor["id"]) ?>"
          class="table__item__link">Eliminar</a>

      </div>

      <?php
    }
    ?>

  </div>
  <div class="p-3">
    <button type="button" class="btn btn-light"><a href="../../../QuienVino/index.php">Volver al
        inicio</a></button>
    <div>
      <?php
      ?>

      <script src="../../../QuienVino/ABM/Profesor/JS/confirmDelete.js"></script>
</body>

</html>