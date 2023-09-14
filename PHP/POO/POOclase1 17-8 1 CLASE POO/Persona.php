<?php
class Persona{ //Clases van en MAYUSCULA (primer letra) y Singular. es una Convención, si tiene dos palabras o màs es un camelCase
    public $nombre;
    public $apellido;               //Atributos
    public $dni;

    //Una funcion public function saludar (){}    //Funciones/metodos
    public function __construct($nombre,$apellido,$dni){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->dni=$dni;
    }


}       //Cada archivo representa una clase, este archivo se va a llamar PERSONA.php 
        //instanciar -> inicializar/Crear

?>