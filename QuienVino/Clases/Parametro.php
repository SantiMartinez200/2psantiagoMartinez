<?php
Class Parametro{
  public static function traerParametros(){
    $queryParametros = ("SELECT * FROM parametros");
    return $queryParametros;
  }

  public static function updateValues($dias_clases,$zona_horaria,$promocion,$regularidad,$libre,$clave){
    $queryEditar = ("UPDATE parametros SET dias_clases='$dias_clases',zona='$zona_horaria',promedio_promocion='$promocion',promedio_regularidad='$regularidad',promedio_libre='$libre' WHERE clave_ajuste='1'");
    return $queryEditar;
  }
}

?>