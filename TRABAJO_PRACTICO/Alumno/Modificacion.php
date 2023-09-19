<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar</title>
  <link rel="stylesheet" href="../../TRABAJO_PRACTICO/Alumno/CSS/styleABM.css">
  <link rel="stylesheet" href="../../TRABAJO_PRACTICO/css/bootstrap.css" />
</head>

<body>
  <?php
  if (!$_POST) { ?>
    <div class="p-3 mb-2 bg-light text-dark">
    <h1 class="h1title">Modificar registro alumno.</h1>
    <h3 class="h3title">Modifica los campos que requieras, los demás dejalos tal cual.</h3>
  </div>
  <?php
  $dni = $_GET["dni"];
  //echo ($dni);
  $traerDatos = "SELECT * FROM alumno WHERE dni='$dni'";
  include("../../TRABAJO_PRACTICO/BD/conn.php");
  $database = Conexion::connect();
  $resultadoDatos = mysqli_query($database, $traerDatos);
  ?>
  <div class="container-add">
    <h2 class="container__title">Modificar Alumno</h2>
    <form class="container__form" action="../Alumno/Modificacion.php" method="POST">
      <?php while ($row = mysqli_fetch_assoc($resultadoDatos)) { ?>
        <label hidden for="" class="container__label">DNI:</label><input type="hidden"  class="container__input" name="dniToCatch" value="<?php print($row["dni"]); ?>">
          <label for="" class="container__label">Nombre:</label><input type="text" class="container__input" name="nombre" value="<?php print($row["nombre"]); ?>">
        <label for="" class="container__label">Apellido:</label><input type="text" class="container__input"
        name="apellido" value="<?php print($row["apellido"]);?> ">
        <label for="" class="container__label">Fecha de nacimiento:</label><input type="date" class="container__input" name="fechaNacimiento" value="<?php echo date("Y-m-d", strtotime($row['fecha_nacimiento'])); ?>">  
        <?php }
      mysqli_free_result($resultadoDatos);
      ?>
      <input type="submit" value="Modificar Alumno" class="btn btn-outline-dark">
    </form>
  </div> <?php
  }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
    $caughtDNI = $_POST["dniToCatch"];
    $caughtName = $_POST["nombre"];
    $caughtSurname = $_POST["apellido"];
    $cuaghtDate = $_POST["fechaNacimiento"];
    //echo $caughtDNI;
    $updateData = "UPDATE alumno SET nombre='$caughtName', apellido='$caughtSurname', fecha_nacimiento='$cuaghtDate' WHERE dni='$caughtDNI'";
    include("../../TRABAJO_PRACTICO/BD/conn.php");
    $database = Conexion::connect();
    $resultadoDatos = mysqli_query($database, $updateData);
      if ($resultadoDatos){
      echo "<script>alert('Alumno actualizado correctamente.'); window.location='../Alumno/ABM_Alumno.php'</script>";
      }else{
      echo "<script>alert('Hubo un error al actualizar los datos...'); window.location='../Alumno/ABM_Alumno.php'</script>";
      }
      
    }

  ?>
  <div class="regresar-container">
    <button type="button" class="btn btn-light"><a href="../../TRABAJO_PRACTICO/Index.html">Volver al
        inicio</a></button>
    <button type="button" class="btn btn-light"><a href="../../TRABAJO_PRACTICO/Alumno/ABM_Alumno.php">Volver a los
        registros.
      </a></button>
    <div>
</body>

</html>