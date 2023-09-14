<?php
class cuentaBancaria{
  public $numeroDeCuenta;
  public $titular; //instnacia de la persona pasas el objeto
  public $saldo;

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
      if (($this->saldo)>$cantidad) {
       $this->saldo=$this->saldo -= $cantidad;
      }else{
      echo ("Saldo Insuficiente  ");
      }
        
    //Revisar el saldo.    
  }
}
?>