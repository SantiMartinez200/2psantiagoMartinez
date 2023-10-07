<?php
include("../../../QuienVino/BD/conn.php");
include("../../../QuienVino/Clases/Persona.php");
include("../../../QuienVino/Clases/Alumno.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alta de Alumno</title>
  <link rel="stylesheet" href="../../QuienVino/css/bootstrap.min.css" />
</head>

<body>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["dni"]) || isset($_POST["nombre"]) || isset($_POST["apellido"]) || isset($_POST["fechaNacimiento"])) {
      if (!empty($_POST["dni"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["fechaNacimiento"])) {
        ///////////////////////////////////////////////////////////
        if ((is_numeric($_POST["nombre"]) || is_numeric($_POST["apellido"]))) {
          echo "<script>alert('El nombre o apellido no pueden ser numéricos.');
                  window.location='../Alumno/ABM_Alumno.php'</script>";
        } elseif (($_POST["dni"]) < 0) {
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
            $nombreInsertar = $_POST["nombre"];
            $apellidoInsertar = $_POST["apellido"];
            $dniInsertar = $_POST["dni"];
            $fechaNacimientoInsertar = $_POST["fechaNacimiento"];

            $database = new Conexion();
            $alumno = new Alumno($nombreInsertar, $apellidoInsertar, $dniInsertar, $fechaNacimientoInsertar);
            /*var_dump($alumno);
            print_r($alumno->nombre);*/
            $sql = Alumno::insertAlumno($alumno);
            $queryRol = Alumno::insertRol($alumno);
            //echo $sql;
            try {
              $traerAlumno = $database->ejecutar($sql);
              $queryRol = $database->ejecutar($queryRol);
            } catch (mysqli_sql_exception $e) {
              if (str_contains($e, 'Duplicate entry')) {
                echo "<script>alert('El DNI ya existe.');
                  window.location='../Alumno/ABM_Alumno.php'</script>";
              }
              die("Error inserting user details into database: " . $e->getMessage());
            }
            echo "<script>alert('Datos cargados con éxito');
              window.location='../Alumno/ABM_Alumno.php'</script>";
          }
        }
        //////////////////////////////////////////////////////////
  
        /*$myQuery->bindParam(":dni", $dniInsertar);
        $myQuery->bindParam(":nombre", $nombreInsertar);
        $myQuery->bindParam(":apellido", $apellidoInsertar);
        $myQuery->bindParam(":fecha_nacimiento", $fechaNacimientoInsertar);*/
        /*if ($database->errno == 1062) {
          echo "<script>alert('sos boludo?');
              window.location='../Alumno/ABM_Alumno.php'</script>";
        } else {
        }*/
      } else {
        echo "<script>alert('Existió algún vacio'); window.location='../Alumno/ABM_Alumno.php'</script>";
      }
      ?>
      <?php

    }
  }
  $database->killConn();
  ?>
</body>

</html>