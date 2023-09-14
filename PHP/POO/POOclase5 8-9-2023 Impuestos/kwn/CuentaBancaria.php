<?php

class CuentaBanco
{
    use Impuestos;
    public $numeroCuenta;
    public $titular;
    public $saldo;
    const SOBREGIRO = 1000;
    private $debe;

    public function __construct($numeroCuenta, $titular, $saldo)
    {
        $this->numeroCuenta = $numeroCuenta;
        $this->titular = $titular;
        $this->saldo = $saldo;
        $this->debe = 0;
    }
    public function depositar($monto)
    {
        $this->saldo += $monto + self::depocitoAumento($monto);
        $resultado = "Se ha depositado $" . $monto . ", su saldo actual es de $" . $this->saldo;
        return $resultado;
    }
    public function retirar($monto)
    {
        if ($monto <= ($this->saldo - $this->impuestoRetiro($monto))) {
            $this->saldo -= $monto;
            $this->saldo -= $this->impuestoRetiro($monto);

            $resultado = "Se ha retirado $" . $monto . ", su saldo actual es de $" . $this->saldo;
            return $resultado;
        }elseif ($monto >= $this->saldo && $monto <= $this->saldo + self::SOBREGIRO && (($this->debe + ($monto - $this->saldo)) <= self::SOBREGIRO)) {
            if($this->debe <= self::SOBREGIRO){
                $total = $monto - ($this->saldo - $this->impuestoRetiro($monto));
                $this->debe += $total;
                $this->saldo = 0;
                $resultado = "Se ha retirado $" . $monto . ", su saldo actual es de $" . $this->saldo . ", estas en sobregiro su deuda es: " . $this->debe;
                return $resultado;
            }
        }
    }
    public function transferenciaCuentas($monto, $cuentaOrigen, $cuentaDestino)
    {
        $inpuestoTransferecia = $cuentaOrigen->impuestoTransferencia($monto);
        $retiro = $cuentaOrigen->saldo - $monto - $inpuestoTransferecia;
        $deposito = $cuentaDestino->saldo + $monto;
        $cuentaOrigen->saldo = $retiro;
        $cuentaDestino->saldo = $deposito;
        echo "Transferencia exitosa";
    }

    private static function depocitoAumento($monto){
        if($monto > 500 ){
            return 100;
        } else{
            return 0;
        }
    }
}
