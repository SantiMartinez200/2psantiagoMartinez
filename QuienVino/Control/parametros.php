<?php
require("../BD/conn.php");
require("../Clases/Parametro.php");
?>
<!DOCTYPE html>
<html lang="en">
<!--  COUNT DE LAS ASISTENCIAS, HACER EL NUMERO PARAMETRIZABLE
Menú Configuración, que aparezca DIAS DE CLASE, guardarlos en la base de datos, comparamos porcentaje con el valor cargado y el valor de las asistencias. -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Parámetros</title>
  <link rel="stylesheet" href="../../../QuienVino/Resources/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../../QuienVino/styleIndex.css">
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a href="index.php">
        <div class="redondo">
          <img src="../Multimedia/logo.png" class="logo">
        </div>
      </a>
      <div class="d-flex justify-content-end">
        <h1 class="text-light"><b>Parámetros de control</b></h1>
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
              <li><a class="dropdown-item text-dark" href="./contarAsistencias.php">Contar asistencias</a></li>
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
      <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="../Multimedia/config.png" alt="" class="img-fluid config" style="margin-right: 5px;">
      </a>
      <ul class="dropdown-menu text-dark">
        <li><a class="dropdown-item text-dark" href="./parametros.php">Parámetros</a></li>
        <li><a class="dropdown-item text-dark" href="./logOut.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>
  <div class="container d-flex justify-content-center align-items-center w-75 bg-light text-center mt-5 rounded p-2">
    <form action="./actualizarParametros.php" class="form-control rounded  p-3" method="POST">
      <div class="row"><label for="dni">
          <h1>Parametros<h1>
        </label></div>
      <?php
      $conectarDB = new Conexion();
      $conectarDB->connect();
      $sql = Parametro::traerParametros();
      $ejecutar = $conectarDB->ejecutar($sql);
      $listadoParametros = $ejecutar->fetch_array();
      //var_dump($listadoParametros);
      $columns = "  SELECT `COLUMN_NAME` 
         FROM `INFORMATION_SCHEMA`.`COLUMNS` 
         WHERE `TABLE_SCHEMA`='sistemaasistencia' 
         AND `TABLE_NAME`='parametros'";
      $ejecutarCol = $conectarDB->ejecutar($columns);
      $listarColumnas = $ejecutarCol->fetch_all();
      ?>
      <div class="container">
        <?php
        $i = 0;
        foreach ($listarColumnas as $cadaColumna) {
          
          ?>
          <div class="d-flex row mt-3">
            <label for=' <?php echo ($i) ?>'>
              <h3>
                <?php
                echo $cadaColumna[0]
                  ?>
              </h3>
            </label>
            <?php
            if (is_numeric($listadoParametros[$cadaColumna[0]])) { ?>
              <div class="col">
                <input type='number' class="form-control-lg" value='<?php echo $listadoParametros[$cadaColumna[0]]?>' name = "<?php echo $i ?>">
              </div>
              <?php
            } elseif (is_string($listadoParametros[$cadaColumna[0]])) { ?>
              <div class="col">
                <input type='text' class="form-control-lg" value='<?php echo $listadoParametros[$cadaColumna[0]]?>' name = "<?php echo $i ?>">
              </div>
              <?php
            }
            ?>
          </div>
          <?php
          $i = $i += 1;
          ?>
          <input type="number" hidden value=" <?php echo $i ?>" name="setValue">
          <?php
        }
        ?>
      </div>
      <input type="submit" class="btn btn-dark mt-2" value="Aplicar cambios">
      <button id="reload" class="btn btn-dark mt-2">Descartar cambios</button>


    </form>
  </div>
  <style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
    }
  </style>
</body>
<script src="../Resources/js/bootstrap.bundle.min.js"></script>

</html>

<!--           primero, poner un nombre correcto al tp
               De 100 clases
              //ej; alumno vino 33 no pasa 30%
              Profesor falta 20 veces? entonces son 80 clases. 100-20
              Registrar las Inasistencias del profesor.
              ¿¿tabla asistencia profesor??

              
                  




-->