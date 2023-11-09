<?php
include("../../../QuienVino/BD/conn.php");
include("../../../QuienVino/Clases/Persona.php");
include("../../../QuienVino/Clases/Alumno.php");
?>
<script src="../../Resources/js/sweetalert2.all.min.js"></script>
<?php
$conectarDB = new Conexion();
$conectarDB->connect();
$dni = $_GET["dni"];
$date = $_GET["date"];
$consulta = Alumno::getAlumno($dni);
$traerAlumno = $conectarDB->ejecutar($consulta);
$alumnos = $traerAlumno->fetch_all(); //acomodar en array
$n = $alumnos[0][1];
$a = $alumnos[0][2];
$consulta = Alumno::insertarAsistencia($dni, $date);
$cargarAsistencia = $conectarDB->ejecutar($consulta);
$birthday = Alumno::cumple($date, $dni);
$execBirthday = $conectarDB->ejecutar($birthday);
$listBirthday = $execBirthday->fetch_all();
if ($listBirthday != NULL) {
  $cumple = true;
  if ($cargarAsistencia) {
    ?>
    <script>
    var birthday = <?php echo $cumple; ?>;
    window.location.href='ABM_Alumno.php?var=fireSweetAlert()' + '&birthday=' + birthday;
    </script>;
    <?php
  }
  $conectarDB->killConn();
}else{
  if ($cargarAsistencia) {
    echo "<script>window.location.href='ABM_Alumno.php?var=fireSweetAlert()'</script>";
  }
  $conectarDB->killConn();
}





?>