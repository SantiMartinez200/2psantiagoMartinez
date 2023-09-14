<?php
require_once("Persona.php");
require_once("Saludar_Trait.php");
require_once("Argentino.php");
$persona1 = new Argentino("Marcos", "Martinez");
var_dump($persona1->getNombre());
var_dump($persona1->Saludar());
var_dump($persona1->Nacionalidad());


?>