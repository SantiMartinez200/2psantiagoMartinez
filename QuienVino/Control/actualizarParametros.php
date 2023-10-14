<?php
include("../BD/conn.php");
include("../Clases/Parametro.php");
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  if (isset($_POST["1"]) && isset($_POST["2"]) && isset($_POST["3"]) && isset($_POST["4"])) {
    if (!empty($_POST["1"]) && !empty($_POST["2"]) && !empty($_POST["3"]) && !empty($_POST["4"])) {
      $dias_de_clase = $_POST["1"];
      $edad_minima = $_POST["2"];
      $promocion = $_POST["3"];
      $regular = $_POST["4"];
        if(($regular > $promocion)){
            echo "<script>alert('El promedio de la promoción no puede ser menor al del regular.');
            window.location='parametros.php'</script>";
        }elseif(($regular == $promocion)){
          echo "<script>alert('El promedio de la promoción no puede ser igual al del regular.');
          window.location='parametros.php'</script>";
        }else{
          $sql = Parametro::updateValues($dias_de_clase,$edad_minima,$promocion,$regular);
          $conectarDB = new Conexion();
          $conectarDB->connect();
          $ejecutar = $conectarDB->ejecutar($sql);
          if ($ejecutar) {
            echo "<script>alert('Se han actualizado los parámetros'); window.location='../Control/parametros.php'</script>";
        } else {
          echo "<script>alert('Existió algún vacio'); window.location='../Control/parametros.php'</script>";
        }
        }
      //hacer un ajax con la CLAVE del ajuste, para cargar ajustes predeterminados.
      
  }
}else{
  echo "<script>alert('Existió un error desconocido en el formulario.'); window.location='../Control/parametros.php'</script>";
}
}
?>