<?php
include("../BD/conn.php");
include("../Clases/Parametro.php");
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  if (isset($_POST["0"]) && isset($_POST["1"]) && isset($_POST["2"]) && isset($_POST["3"]) && isset($_POST["4"]) && isset($_POST["5"])) {
    if (!empty($_POST["0"]) && !empty($_POST["1"]) && !empty($_POST["2"]) && !empty($_POST["3"]) && !empty($_POST["4"]) && !empty($_POST["5"])) {
      $dias_de_clase = $_POST["1"];
      $libre = $_POST["2"];
      $promocion = $_POST["3"];
      $regular = $_POST["4"];
      $zona_horaria = $_POST["5"];
      //hacer un ajax con la CLAVE del ajuste, para cargar ajustes predeterminados.
      $sql = Parametro::updateValues($dias_de_clase, $zona_horaria, $promocion, $regular, $libre, 1);
      $conectarDB = new Conexion();
      $conectarDB->connect();
      $ejecutar = $conectarDB->ejecutar($sql);
      if ($ejecutar) {
        echo "<script>alert('Se han actualizado los parámetros'); window.location='../Control/parametros.php'</script>";
      }
    } else {
      echo "<script>alert('Existió algún vacio'); window.location='../Control/parametros.php'</script>";
    }
  }
}else{
  echo "<script>alert('Existió un error desconocido en el formulario.'); window.location='../Control/parametros.php'</script>";
}
?>