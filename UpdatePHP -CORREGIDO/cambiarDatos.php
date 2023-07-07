<?php
require_once("../archivoConexion/conexion.php");
$id = $_POST["id"];
$queryAntigua = "SELECT * from jugadoras where id=$id;";
    $queryAntiguaStmt = $connection->prepare($queryAntigua);
    $queryAntiguaStmt->execute();
    $datosOriginales = $queryAntiguaStmt->fetchall();
    $idOriginal = $datosOriginales[0]['id'];
    $nombreOriginal = $datosOriginales[0]['nombre'];
    $apellidoOriginal = $datosOriginales[0]['apellido'];        //datos originales del registro
    $clubOriginal = $datosOriginales[0]['club'];
    $edadOriginal = $datosOriginales[0]['edad'];


$nombreNuevo = $_POST["nombre"];
$apellidoNuevo = $_POST["apellido"];
$clubNuevo = $_POST["club"];
$edadNueva = $_POST["edad"];

//echo ($nombreNuevo . $apellidoNuevo . $clubNuevo . $edadNueva);
if ((empty($nombreNuevo) && empty($apellidoNuevo) && empty($clubNuevo) && empty($edadNueva))){
    echo "<h1>Debes editar algun dato</h1>";
    ?>
    <a href="indexHtml.php">Volver a editar datos.</a>
    <?php
}else{
    if ($nombreNuevo==$nombreOriginal && $apellidoNuevo==$apellidoOriginal && $clubOriginal==$clubNuevo && $edadOriginal == $edadNueva){
            ?>
            <h1>Todos los datos ingresados fueron iguales. no se cambiaron.</h1>
            <a href="indexHtml.php">Volver al inicio</a>
            <?php
    }
    if ($nombreNuevo<>$nombreOriginal && empty($nombreNuevo)<>true){
        $updateQuery = "UPDATE jugadoras SET nombre='$nombreNuevo' WHERE id='$idOriginal'";
        if ($connection->query($updateQuery)) {
             echo '<p>NOMBRE actualizado con éxito</p>';
        }
    }else{
        echo '<p>El campo de NOMBRE esta VACIO</p>';
    }
    if ($apellidoNuevo<>$apellidoOriginal && empty($apellidoNuevo)<>true){
        $updateQuery = "UPDATE jugadoras SET apellido='$apellidoNuevo' WHERE id='$idOriginal'";
        if ($connection->query($updateQuery)) {
             echo '<p>APELLIDO actualizado con éxito</p>';
        }
    }
    if ($clubNuevo<>$clubOriginal && empty($clubNuevo)<>true){
      $updateQuery = "UPDATE jugadoras SET club='$clubNuevo' WHERE id='$idOriginal'";
      if ($connection->query($updateQuery)) {
             echo '<p>CLUB actualizado con éxito</p>';
        }
    }
    if ($edadNueva<>$edadOriginal && empty($edadNueva)<>true){
      $updateQuery = "UPDATE jugadoras SET edad='$edadNueva' WHERE id='$idOriginal'";
      if ($connection->query($updateQuery)) {
             echo '<p>EDAD actualizado con éxito</p>';
        }
    }
}
?>
<a href="listarJugadoras.php">Mostrar tabla actualizada</a>
<?php

?>