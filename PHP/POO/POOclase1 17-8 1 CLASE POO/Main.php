<?php
    require_once("Persona.php");
    $persona1=new Persona("Santiago","Martinez",45387761);
    $persona2=new Persona("Marcos","Martínez",444401531);
    echo $persona1->nombre." ".$persona1->apellido;

?>