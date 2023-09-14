<?php
class Banco{
  public $nombreBanco;
  public $direccionBanco;
  public $listadoCuentas = [];
  public function __construct($nombreBanco,$direccionBanco){
    $this->nombreBanco = $nombreBanco;
    $this->direccionBanco = $direccionBanco;
  }

  public function agregarCuenta($numeroDeCuenta){
    $this->listadoCuentas[] = $numeroDeCuenta;
  }

  public function buscarCuentaPorTitular($a,$b){
    /*if ($a==($this->listadoCuentas[1]->titular->nombre)){
      //echo ("Dentro");
      var_dump($this->listadoCuentas[1]);
    }*/
   
    foreach ($this->listadoCuentas as $cadaCuenta) {
      //var_dump($cadaCuenta->titular->nombre,$cadaCuenta->titular->apellido);
      if ((($cadaCuenta->titular->nombre) == $a) && (($cadaCuenta->titular->apellido) == $b) ){
        echo("Cuenta Encontrada<br>");
        var_dump($cadaCuenta);
      }
    }
   

  }
}
?>