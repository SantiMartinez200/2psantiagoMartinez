<?php
Class Parametro{
  public static function traerParametros(){
    $queryParametros = ("SELECT * FROM parametros");
    return $queryParametros;
  }

  public static function updateValues($dias_clases,$edad_minima,$promocion,$regularidad){
    $queryEditar = ("UPDATE parametros SET dias_clases='$dias_clases', edad_minima='$edad_minima',promedio_promocion='$promocion',promedio_regularidad='$regularidad' WHERE clave_ajuste='1'");
    return $queryEditar;
  }
}

?>