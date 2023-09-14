<?php
class Persona{
  Public $nombre;
  Public $apellido;
  Public $dni;
  public $edad;
  public $numeroDeCuenta;

  public Function __construct($nombre,$apellido,$dni,$edad,$numeroDeCuenta){
    if (!defined('EDAD_PREDETERMINADA')) define('EDAD_PREDETERMINADA', 18);
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->numeroDeCuenta=$numeroDeCuenta;
    $this->edad=$edad;
    $this->dni = $dni;
      if ($this->edad>=0){
        echo ("Edad correcta");
        
      }else{
        $this->edad = 18;
        echo ("<br>La edad ha sido seteada en 18 años por defecto<br>");
      }
  }

  public function getNombre(){
    return $this->nombre;
  }

  
  public function setNombre($nuevoNombre){
     $this->nombre=$nuevoNombre;
  }
}
?>