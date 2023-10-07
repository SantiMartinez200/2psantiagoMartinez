<?php
include("../BD/conn.php");
include("../Clases/Persona.php");
include("../Clases/Alumno.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contabilidad de asistencias</title>
  <link rel="stylesheet" href="../../../QuienVino/Resources/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../../QuienVino/styleIndex.css">
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a href="../../QuienVino/index.php">
        <div class="redondo">
          <img src="../Multimedia/logo.png" class="logo">
        </div>
      </a>
      <div class="d-flex justify-content-end">
        <h1 class="text-light"><b>Asistencias</b></h1>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Asistencias</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-dark" href="./listarAsistencias.php">Listar asistencias</a></li>
              <li><a class="dropdown-item text-dark" href="contarAsistencias.php">Contar asistencias</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Registros</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-dark" href="../ABM/Alumno/ABM_Alumno.php">Alumno</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Contacto</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-dark" href="#">Instagram</a></li>
              <li><a class="dropdown-item text-dark" href="#">Facebook</a></li>
              <li><a class="dropdown-item text-dark" href="#">Linkedin</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="nav-item dropstart">
      <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <img src="../../../QuienVino/Multimedia/config.png" alt="" class="img-fluid config" style="margin-right: 5px;">
      </a>
      <ul class="dropdown-menu text-dark">
        <li><a class="dropdown-item text-dark" href="../../../QuienVino/Control/parametros.php">Parámetros</a></li>
        <li><a class="dropdown-item text-dark" href="../../../QuienVino/Control/logOut.php">Cerrar Sesión(NoDisp)</a></li>
      </ul>
    </div>
  </nav>
  <?php

  //var_dump($alumnos);
  ?>
  <div class="d-flex justify-content-center">
    <div class="col-10">
      <div class="container m-2">
        <!--<form action="listarAsistencias.php" method="POST">
          <label for="campo">
            <h3 class="text-light">Filtrar por alumno</h3>
          </label>
          <div class="d-flex "><input id="campo" class="form-control form-control-lg" type="text" name="dni">
          </div>
        </form>-->
        <table class="table table-hover text-center">
          <thead>
            <tr>
              <th colspan="6" class="bg-primary text-white ">
                <h4>Cuenta de asistencias</h4>
              </th>
            </tr>
            <tr>
              <th scope="col">DNI</th>
              <th scope="col">Apellido</th>
              <th scope="col">Nombre</th>
              <th scope="col">Rol</th>
              <th scope="col">Cantidad Asistencias</th>
              <th scope="col">Promedio</th>
            </tr>
          </thead>
          <tbody id="tableInfo">
            <?php
            $conectarDB = new Conexion();
            $consulta = Alumno::contarAsistencias();
            $traerDatos = $conectarDB->ejecutar($consulta);
            $resultado = $traerDatos->fetch_all();
            foreach ($resultado as $eachResult => $value) {
              ?>
              <tr>
                <td>
                  <div class="mt-3">
                    <?php echo ($value[0]); ?>
                  </div>
                </td>
                <td>
                  <div class="mt-3">
                    <?php echo ($value[2]); ?>
                  </div>
                </td>
                <td>
                  <div class="mt-3">
                    <?php echo ($value[1]); ?>
                  </div>
                </td>
                <td>
                  <div class="mt-3">
                    <?php echo ($value[3]); ?>
                  </div>
                </td>
                <td>
                  <div class="mt-3">
                    <?php echo ($value[4]); ?>
                  </div>
                </td>
                <td>
                  <?php
                  $asistencia = $value[4];
                  $traerDias = Alumno::traerParametroAsistencias();
                  $ejecutar = $conectarDB->ejecutar($traerDias);
                  $dias_de_clase = $ejecutar->fetch_all();
                  //var_dump($dias_de_clase[0][0]);
                  $dia = intval($dias_de_clase[0][0]);
                  //var_dump($dia);
                  //cant_asistencias * 100 / dias_clases
                  $promedioAlumno = round($asistencia * 100 / $dia);
                  if ($promedioAlumno >= 80) {
                    echo "<div class='alert alert-success mt-1'> $promedioAlumno% </div>";
                  } elseif (($promedioAlumno < 80) && ($promedioAlumno >= 60)) {
                    echo "<div class='alert alert-warning mt-1'> $promedioAlumno% </div>";
                  } else {
                    echo "<div class='alert alert-danger'> $promedioAlumno% </div>";
                  }
                  ?>
                </td>
              </tr>

              <?php
            }
            ?>
          </tbody>
        </table>
        <?php
        ?>

      </div>

    </div>
  </div>
  <style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
    }
  </style>
  <script src="../../QuienVino/Resources/js/bootstrap.bundle.min.js"></script>
</body>

</html>