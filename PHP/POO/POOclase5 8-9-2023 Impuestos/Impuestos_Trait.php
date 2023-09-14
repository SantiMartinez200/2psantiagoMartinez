<?php
/*
Ejercicio 3
1. Hacer un trait que calcule el 0,6% de transferencia, y un inpuesto de 2% retiro
   Cada vez que hay un retiro o una transferencia al saldo aplicarle el inpuesto
2. Una funcion statica que sume 100 pe' cuando el deposito es mayor a 500 pe'
   Aplicarlo en el saldo
*/

trait Impuesto
{
  private $impuestoTransferencia = 0.6;
  private $impuestoRetiro = 2;

  public function impuestoTransferencias($montoTransferido){
    $calculoImpuestoTransferencia = ($this->impuestoTransferencia / 100) * $montoTransferido;
    return $calculoImpuestoTransferencia;
  }

  public function impuestoRetiros($montoRetirado){
    $calculoImpuestoRetiro = ($this->impuestoRetiro / 100) * $montoRetirado;
    return $calculoImpuestoRetiro;
  }

}





?>