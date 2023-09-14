<?php
class cuentaBancaria{
  use Impuesto;
  public $numeroDeCuenta;
  public $titular; //instnacia de la persona pasas el objeto
  public $saldo;
  const SOBRE_GIRO = 1000;
  public $tieneSobregiro = false;
  private $debePersona = 0;

  public function __construct($numeroDeCuenta,$titular,$saldo){
    $this->numeroDeCuenta=$numeroDeCuenta;
    $this->titular=$titular;
    $this->saldo=$saldo;
  }

  

  public function Depositar($cantidadDepositada){
    $this->saldo += $cantidadDepositada + self::depositoAumento($cantidadDepositada);
    $textoDeposito = "Has depositado ".$cantidadDepositada." Su saldo actual es de: ".$this->saldo;
    return print_R($textoDeposito);
  }

  static function depositoAumento($montoDepositado){
      if ($montoDepositado>500){
      return 100;
      }else{
      return 0;
      }
  }

  public function Retirar($montoRetirado){
    $saldoAnterior = $this->saldo;
    $montoConImpuestos = $montoRetirado + $this->impuestoRetiros($montoRetirado);

    if ($montoConImpuestos <= $this->saldo){
        $this->saldo -= $montoConImpuestos;
      $textoRetiro = "<br>Has retirado: " . $montoRetirado . " Con el impuesto aplicado a tu retiro fue: " . $this->impuestoRetiros($montoRetirado) . " Tu saldo actual es de: " . $this->saldo."<br>";
      return print_r($textoRetiro);
    }elseif (($montoConImpuestos>$this->saldo) && $montoConImpuestos<($this->saldo + self::SOBRE_GIRO) && ($this->tieneSobregiro == false || $this->tieneSobregiro == true)){
      
      $this->debePersona = ( $this->saldo - $montoConImpuestos)*-1;
      $saldoConSobregiro = $this->saldo + self::SOBRE_GIRO;
      $this->saldo = $saldoConSobregiro - $montoConImpuestos;
      //echo($this->saldo);
      $this->tieneSobregiro = true;

      $textoRetiroSobregiro = "<br>Has retirado: ".$montoRetirado." de tu saldo anterior de: ".$saldoAnterior.", se aplicó un impuesto de retiro de: ".($this->impuestoRetiros($montoRetirado))." por lo que el monto total finalizó en: ".$montoConImpuestos." requeriste del sobregiro por lo que se te prestó y debes: ".($this->debePersona)." Y tu saldo restante actual en sobregiro es: ".($this->saldo)."<br>";

      return print_r($textoRetiroSobregiro);
    }elseif($montoConImpuestos > ($this->saldo) && $this->tieneSobregiro == true){
      echo ("<br>Quieres retirar una cantidad mas grande que tu saldo actual y ya has superado el limite prestado.<br>");
    }else{
      return "Ha ocurrido un error inesperado";
    }
      
  }

  public function Transferir($montoATransferir,$cuentaOrigen,$cuentaDestino){
    $saldoAnterior = $this->saldo;
    $montoATransferirConImpuestos = $montoATransferir + $this->impuestoTransferencias($montoATransferir);
    if ($montoATransferir <= $this->saldo){
       $saldoOrigen = $cuentaOrigen->saldo -= ($montoATransferir + $this->impuestoTransferencias($montoATransferir));
      $saldoDestino = $cuentaDestino->saldo += $montoATransferir;
      $cuentaOrigen->titular->saldo = $saldoOrigen;
      $cuentaDestino->titular->saldo = $saldoDestino;
      var_dump("Transferencia de: ".$montoATransferir." realizada correctamente, se ha aplicado un impuesto de: " . $this->impuestoTransferencias($montoATransferir) . " Al saldo del remitente de la transferencia ".$cuentaOrigen->titular->saldo.", el saldo del receptor es: ".$cuentaDestino->titular->saldo);
    echo ("<br><br>");
    }elseif (($montoATransferir>$this->saldo) && $montoATransferirConImpuestos<($this->saldo + self::SOBRE_GIRO) && ($this->tieneSobregiro == false || (($this->tieneSobregiro == true) && $montoATransferirConImpuestos<$this->saldo ))){
      
      $this->debePersona = ( $this->saldo - $montoATransferirConImpuestos)*-1;
      $saldoConSobregiro = $this->saldo + self::SOBRE_GIRO;
      $this->saldo = $saldoConSobregiro - $montoATransferirConImpuestos;
      //echo($this->saldo);
      $this->tieneSobregiro = true;
      $saldoDestino = $cuentaDestino->saldo += $montoATransferir;
      $cuentaOrigen->titular->saldo = $this->saldo;
      $cuentaDestino->titular->saldo = $saldoDestino;

      $textoTransferenciaSobregiro = "Has Transferido: ".$montoATransferir." de tu saldo anterior de: ".$saldoAnterior.", se aplicó un impuesto de Transferencia de: ".($this->impuestoTransferencias($montoATransferir))." por lo que el monto total finalizó en: ".$montoATransferirConImpuestos." requeriste del sobregiro por lo que se te prestó y debes: ".($this->debePersona)." Y tu saldo restante actual en sobregiro es: ".$this->saldo.", El saldo de la cuenta receptora es: ".$saldoDestino."<br>";

      return print_r($textoTransferenciaSobregiro);
    }elseif($montoATransferirConImpuestos > ($this->saldo) && $this->tieneSobregiro == true){
      echo ("Quieres Transferir una cantidad mas grande que tu saldo actual y ya has superado el limite prestado.<br>");
    }else{
      return "Ha ocurrido un error inesperado";
    }
  }
}
?>