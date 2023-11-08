<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
include("../BD/conn.php");
include("../Clases/Persona.php");
include("../Clases/Alumno.php");
include("../Clases/Parametro.php");
if (isset($_POST["dni"]) && isset($_POST["fecha_tardia"])) {
  if (!empty($_POST["dni"]) && !empty($_POST["fecha_tardia"])) {
    $fechaTardia = $_POST["fecha_tardia"];
    $dni = $_POST["dni"];
    $conectarDB = new Conexion;
    $conectarDB->connect();
    $queryVerificar = Alumno::verificarIngresoAsistencia($dni, $fechaTardia);
    if ($queryVerificar == false) {
      $caseTrue = "";
      $query = Alumno::insertarAsistencia($dni, $fechaTardia);
      $ejecutar = $conectarDB->ejecutar($query);
      ?>
      <script>
      var dni = <?php echo($dni) ?>;
      window.location="asistenciasTardiasIndex.php?conf=true" + "&dni=" + dni
      </script>
      <?php
    } else {
      ?>
            <script>
              var dni = <?php echo ($dni) ?>;
              window.location = "asistenciasTardiasIndex.php?conf=false" + "&dni=" + dni
            </script>
            <?php
    }
  } else {
    echo "<script>window.location='asistenciasTardiasIndex.php?conf=err1'</script>";
  }
} else {
  echo "<script>window.location='asistenciasTardiasIndex.php?conf=err2'</script>";
}
?>