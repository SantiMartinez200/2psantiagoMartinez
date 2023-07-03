<?php

/*


//$aux = 33;
//var_dump($aux); //es un método, hay montones.
$semana = array('Lunes','Martes','Miercoles','Jueves','Viernes');
//var_dump($semana);
//echo ($semana[1]);
//print_r($semana);
//$cosas = array('Piedra', 35, true);
//var_dump($cosas);

$planetas = array();
$planetas[] = 'Urano';
$planetas[] = 'Tierra';                   //CONSIGNA: suma de elementos: escribir una funcion que reciba un array
$planetas[] = 'Saturno';                //numérico y calcule la suma de todos los elementos.
$planetas[] = 'Neptuno';
$planetas[] = 'Venus'; 

//var_dump($planetas);

//foreach ($planetas as $planeta) {
  //echo $planeta, " ";
//}

$arrayNumerico = array(1, 2, 3, 4, 5);

function sumarNumeros($parametro) {
  $auxNumerico = 0;
  foreach ($parametro as $cadanumero) {
    $suma = $auxNumerico + $cadanumero;
    $auxNumerico = $suma;
  }
  return $suma;
}                                                   //EJERCICIO 1
echo "Una forma de sumar un array";
echo "<br>";
echo sumarNumeros($arrayNumerico);
echo "<br>";

$otroArray = array(1, 2, 3, 4, 5,6,7,8,9,10);
function otraSuma($parametros) {
  $ssuma = 0;
  foreach ($parametros as $numero) {
    $ssuma = $ssuma + $numero;
  }
  return $ssuma;
}
echo "otra forma de sumar un array";
echo "<br>";
echo otraSuma($otroArray);
echo "<br>";


//ORDENAMIENTO ASCENDENTE, CREAR UNA FUNCION QUE ORDENE UN ARRAY NUMÉRICO DE MENOR A MAYOR
echo "Ordenando arrays ascendentemente";
echo "<br>";
  $arrayDesordenado = array(123,4431,1231,1,3123,56,12,2,4);
  $arrayOrdenado = array();
  asort($arrayDesordenado);
  foreach ($arrayDesordenado as $numerosOrdenados) {                                            //EJERCICIO 2
    $arrayOrdenado[] = $numerosOrdenados;
  }
  print_r($arrayOrdenado);
echo "<br>";
  //Escribe una funcion que elimine los elementos duplicados de un array
  $arrayNoRepetido = array();
  $arrayRepetido = array(1,3,4,4,4,2,1,2,4,7,8,9,132,2,5);
  function eliminarRepetido($arrayRepetido) {                                                   //EJERCICIO 3
   $arrayNoRepetido = array_unique($arrayRepetido);
   print_r($arrayNoRepetido);
  }
 eliminarRepetido($arrayRepetido);

 //EJERCICIO BUSQUEDA DE ELEMENTOS:
 //crear una funcion que reciba un array y un valor a buscar y devuelva un NUEVO array con los indices de todas las ocurrencias de valor en el array original.
 //ayuda: método/función array_keys()
$arrayAbuscar = array(2, 5, 9, 8, 2, 4, 2);
function buscar($arrayAbuscar,$valor) {
  //$indicesEncontrados = array();
  echo "<br>";
  echo "Indices encontrados ";                                                                       ///EJERCICIO 4
  print_r(array_keys($arrayAbuscar, $valor));

}
echo buscar($arrayAbuscar, 2);
*/


//ESCRIBE UNA FUNCION QUE COMBINE 2 ARRAYS EN UNO SOLO, BUSCAR EN EL ARRAY RESULTANTE
//LOS NUMEROS IMPARES
//[1,5,8,4] Y [2,5,6,7]                                                                              //EJERCICIO 5
/*$array1 = array(1, 5, 9, 4);
$array2 = array(2, 5, 6, 7);
$arrayResultado = array();
function combinArray($array1,$array2){
  $arrayResultado = array_merge($array1, $array2);
  $arrayImpares = array();
  $arrayPares = array();
  foreach ($arrayResultado as $cadaNumero) {
    if ($cadaNumero % 2 <> 0) {
      $arrayImpares[] = $cadaNumero;
    }else{
      $arrayPares[] = $cadaNumero;
    }
  }
  print_r($arrayImpares);
  echo ("<br>");
  print_r($arrayPares);
}
combinArray($array1,$array2);*/

//          ARRAYS ASOCIATIVOS        //
//Se declara como cualquier array.
$clubes = array(
  'San Lorenzo' => array('Jugadores' => array('Nahuel Barrios','Adam Barreiro','Augusto Batalla')),
  'Independiente' => array('Jugadores' => array('Rey','Cauterucho','Marcone'))
);
/*


*/ 
/*print_r($clubes['San Lorenzo']);
echo ("<br>");
print_r($clubes['San Lorenzo']['Jugadores']);
echo ("<br>");

echo ("<br>");*/

//EJERCICIO 1: Hacer una función que diga si El jugador fernando galetto juega en san lorenzo?
//EJERCICIO 2: Que diga EN QUE CLUB juega "Marcone"

if (in_array('Fernando Galetto', $clubes['San Lorenzo']['Jugadores'])){
  echo "Fernando Galetto juega en san lorenzo.";
  print_r($clubes['San Lorenzo']['Jugadores']);
}else {                                                                   //EJERCICIO 1
  echo "Fernando Galetto NO juega en san lorenzo.";
  echo "<br>";
  print_r($clubes['San Lorenzo']['Jugadores']);
}
echo "<br>";
echo "-------------------------------------------------------------------------------------------------------------------------";
echo "<br>";
function buscarMarcone($clubes){
  foreach ($clubes as $cadaClub => $jugadores) {
    /*$busqueda = array_search('Marcone', $cadaClub['Jugadores']);
    print_R($busqueda);
    print_r($clubes);*/
    /*echo $cadaClub;
    print_r($jugadores['Jugadores']);*/                                                   //EJERCICIO 2
    if ((in_array('Marcone',$jugadores['Jugadores'])) == True ) {
      $club = $cadaClub;
      echo "Marcone juega en: ", $club;
      break;
    }
  }
   
}
echo buscarMarcone($clubes);


?>