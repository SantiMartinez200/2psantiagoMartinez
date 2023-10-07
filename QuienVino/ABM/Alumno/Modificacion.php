<?php
include("../../../QuienVino/BD/conn.php");
include("../../../QuienVino/Clases/Persona.php");
include("../../../QuienVino/Clases/Alumno.php");
?>
<?php
if (!$_POST) { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="../../../QuienVino/ABM/Alumno/CSS/styleAlumno.css">
    <link rel="stylesheet" href="../../../QuienVino/Resources/css/bootstrap.min.css" />
  </head>

  <body>
    <style>
      body {
        background-color: rgb(61, 61, 61);
      }
    </style>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
        <a href="../../../QuienVino/index.php">
          <div class="redondo">
            <img src="../../../QuienVino/Multimedia/logo.png" class="logo">
          </div>
        </a>
        <div class="d-flex justify-content-end">
          <h1 class="text-light"><b>Registros</b></h1>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">

          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Asistencias</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-dark" href="../../../QuienVino/Control/listarAsistencias.php">Listar
                    asistencias</a></li>
                <li><a class="dropdown-item text-dark" href="../../../QuienVino/Control/contarAsistencias.php">Contar
                    asistencias</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Registros</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-dark" href="./ABM_Alumno.php">Alumno</a></li>
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
    </nav>
    <div class="todo">
      <?php
      $dni = $_GET["dni"];
      //echo ($dni);
      $conectarDB = new Conexion();
      $sql = Alumno::getAlumno($dni);
      $ejecutar = $conectarDB->ejecutar($sql);
      $listado = $ejecutar;
      ?>
      <div class="container col-10 mt-5 rounded">
        <div id="textContainer" class="d-flex justify-content-center p-3 mb-2 bg-primary text-white rounded">
          <h2 class="container__title">Modificar Alumno</h2>
        </div>
        <form class="form text-center p-3 mb-2 bg-light text-black col-12" action="../Alumno/Modificacion.php"
          method="POST">
          <?php while ($row = mysqli_fetch_assoc($listado)) { ?>
            <div class="row d-flex justify-content-center p-3">
              <label hidden for="" class="container__label">DNI:</label>
              <div class="p-3"><input type="hidden" class="container__input" name="dniToCatch"
                  value="<?php print($row["dni"]); ?>"></div>
              <div class="col d-flex p-3"><label for="" class="p-2">Nombre:</label><input type="text"
                  class="container__input" name="nombre" value="<?php print($row["nombre"]); ?>"></div>
              <div class="col d-flex p-3"><label for="" class="p-2">Apellido:</label><input type="text"
                  class="container__input" name="apellido" value="<?php print($row["apellido"]); ?> "></div>
              <div class="col d-flex p-3"><label for="" class="p-2">Fecha de nacimiento:</label><input type="date"
                  class="container__input" name="fechaNacimiento"
                  value="<?php echo date("Y-m-d", strtotime($row['fecha_nacimiento'])); ?>"></div>
            </div>
          <?php }
          ?>
          <input type="submit" value="Modificar Alumno" class="btn btn-outline-dark">
        </form>
      </div>
      <script src="../../../QuienVino/Resources/js/bootstrap.bundle.min.js"></script>
    </div>
    <style>
      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
      }
    </style>
  </body>

  </html>
  <?php
  $conectarDB->killConn();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="../../../QuienVino/ABM/Alumno/CSS/styleAlumno.css">
    <link rel="stylesheet" href="../../../QuienVino/Resources/css/bootstrap.min.css" />
  </head>

  <body>
    <?php
    if (isset($_POST["dniToCatch"]) || isset($_POST["nombre"]) || isset($_POST["apellido"]) || isset($_POST["fechaNacimiento"])) {
      if (!empty($_POST["dniToCatch"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["fechaNacimiento"])) {
        ///////////////////////////////////////////////////////////
        if ((is_numeric($_POST["nombre"]) || is_numeric($_POST["apellido"]))) {
          echo "<script>alert('El nombre o apellido no pueden ser numéricos.');
                  window.location='../Alumno/ABM_Alumno.php'</script>";
        } elseif (($_POST["dniToCatch"]) < 0) {
          echo "<script>alert('El DNI no puede ser negativo.');
                  window.location='../Alumno/ABM_Alumno.php'</script>";
        } else {
          $fecha = $_POST["fechaNacimiento"];
          $cortarFecha = substr($fecha, -19, 4);
          $fechaInt = intval($cortarFecha);
          if (($fechaInt > 2023) || ($fechaInt < 1900)) {
            echo "<script>alert('La fecha no es válida.');
                  window.location='../Alumno/ABM_Alumno.php'</script>";
          } else {
            $caughtDNI = $_POST["dniToCatch"];
            $caughtName = $_POST["nombre"];
            $caughtSurname = $_POST["apellido"];
            $cuaghtDate = $_POST["fechaNacimiento"];
            $conectarDB = new Conexion();
            //echo $caughtDNI;
            $sql = '';
            $sql = Alumno::updateAlumno($caughtName, $caughtSurname, $caughtDNI, $cuaghtDate);
            $ejecutar = $conectarDB->ejecutar($sql);
            if ($ejecutar) {
              echo "<script>alert('Alumno actualizado correctamente.'); window.location='../Alumno/ABM_Alumno.php'</script>";
            } else {
              echo "<script>alert('Hubo un error al actualizar los datos...'); window.location='../Alumno/ABM_Alumno.php'</script>";
            }
          }
        }
      } else {
        echo "<script>alert('Existió algún vacio'); window.location='../Alumno/ABM_Alumno.php'</script>";
      }
    }

    $conectarDB->killConn(); ?>
    <style>
      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
      }
    </style>
  </body>
  <script src="../../../QuienVino/Resources/js/bootstrap.bundle.min.js"></script>

  </html>
  <?php
}

?>


</body>

</html>