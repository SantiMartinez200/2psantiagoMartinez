<?php
class cuentaBancaria{
  public $numeroDeCuenta;
  public $titular; //instnacia de la persona pasas el objeto
  public $saldo;
  const SOBRE_GIRO = 1000;
  public $SOBRE_BOOLEAN = false;
  public $cont = 0;

  public function __construct($numeroDeCuenta,$titular,$saldo){
    $this->numeroDeCuenta=$numeroDeCuenta;
    $this->titular=$titular;
    $this->saldo=$saldo;
  }

  public function Depositar($cantidad){
    if ($cantidad>0){
      $this->saldo=$this->saldo += $cantidad;
    }else if($cantidad==0){
      echo ("La función indicó que se quiso ingresar un valor NULO   ");
      
    }else{
      echo ("La función indicó que se quiso ingresar un valor NEGATIVO   ");
    }
    
  }

  public function Retirar($cantidad){
    
      if (($this->saldo)>=$cantidad) {
      echo ("<br>Retiro de: " . $cantidad . " realizado con éxito.<br>El saldo actual es de: " . ($this->saldo-$cantidad)."<br>");
       $this->saldo=$this->saldo -= $cantidad;
      }else{
      $cuentas = $this->saldo -= $cantidad;
      echo ("<br><br>");
        if (($cuentas*-1)>self::SOBRE_GIRO){
        echo ("<br>El saldo a retirar supera al sobre giro<br>");
        }elseif ($this->SOBRE_BOOLEAN==false){
          echo ("Se ha realizado un retiro con SOBRE GIRO de: " . ($cuentas * -1)."<br><br>");
          echo ("EL total retirado es de: ".$cantidad. " Siendo el saldo anterior de: ".$this->saldo+$cantidad);
          $this->saldo = $this->saldo + self::SOBRE_GIRO;
          echo ("<br>Su saldo actual en cuenta es de: ".$this->saldo. " Restantes del SOBRE GIRO");
          $this->SOBRE_BOOLEAN = true;
      } else {
        echo ("<br>Usted ya ha realizado un sobre giro, el retiro de: ".$cantidad." No es posible de realizar puesto que supera su saldo de: ".$this->saldo+$cantidad."<br>");
      }
        
      }
        
    //Revisar el saldo.    
  }

  public function Transferir($monto,$cuentaOrigen,$cuentaDestino){
    $saldoOrigen = $cuentaOrigen->saldo -= $monto;
    $saldoDestino = $cuentaDestino->saldo += $monto;
    $cuentaOrigen->titular->saldo = $saldoOrigen;
    $cuentaDestino->titular->saldo = $saldoDestino;
    echo ("<br>----------------------------TRANSFERENCIA EXITOSA----------------------------------------------------------------------------------------------------------------------------------------------------------<br>");
    var_dump($cuentaOrigen);
    echo ("<br><br>");
    var_dump($cuentaDestino);
      echo ("<br>----------------------------TRANSFERENCIA EXITOSA----------------------------------------------------------------------------------------------------------------------------------------------------------<br>");
  }
}
?>