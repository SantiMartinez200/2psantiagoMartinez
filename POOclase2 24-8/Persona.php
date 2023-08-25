<?php
class Persona{
  Public $nombre;
  Public $apellido;
  Public $dni;
  public $edad;
  public $numeroDeCuenta;

  public Function __construct($nombre,$apellido,$dni,$edad,$numeroDeCuenta){
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->numeroDeCuenta=$numeroDeCuenta;
    $this->edad=$edad;
    $this->dni = $dni;
  }
}
?>