<?php
/*sistema bancario

3 clases 
	persona
	banco
	cuentaBancaria

persona: nombre,apellido,edad,dni,numeroCuenta
metodo:-constructor->(nombre,apellido,edad,dni,numeroCuenta)

banco: nombreBanco,dirección,listaCuentaBancaria(array) 
Metodos: -constructor->(nombre,direccion)
	 -agregarCuenta->(cuenta)(lista)
	 -buscarCuentaTitular->(nombre,apellido) return(cuentaBancariaAsociadaPersona)

cuentaBancaria: numeroCuenta,titular(instancia clas persona),saldo
Metodos: -cnstructor->(inicializarNroCuenta,titular,saldo)
	 -depocitar(cantidad)
	 -retirar(cantidad) //si y solo si tiene saldo 
	 
Ejercicios 
1. Crear al menos dos instancias  de la clase persona y dos instancias de la clase cuenta bancaria
2. Crear una instancia de la clase banco y agregar las cuentas bancarias a la lista del banco
3. Realizar las siguientes operaciones
	a.depocita diferentes cantidades en las cuentas banacarias
	b.Realiza retiros de diferentes montos de las cuentas bancarias revisando si se puede
	c.busca una cuenta bancaria por el titular utilizando el metodo buscarcuenta por el titular

Ejercicios 2
4.Crear una funcion trasferir ($monto,$cuentaOrigen,$cuentaDestino) en la clase cuenta bancaria que permita
  transferir un monto de una cuenta a la otra, actualizar los saldos y mostrar mensaje de "transferencia exitosa"
5.Añade una verificacion en el constructor persona para que la edad sea  un numero positivo y mayor a cero
  si la edad no cumple estas condiciones asignar valor predeterminado pj 18
6.Modifica el metodo retirar en la clase CB para permitir retiro incluso si no hay saldo, pero con un
  limite de sobre giro, con una constante que se llame "limite sobre giro" para controlar el limite 

Ejercicio 3
1. Hacer un trait que calcule el 0,6% de transferencia, y un inpuesto de 2% retiro
   Cada vez que hay un retiro o una transferencia al saldo aplicarle el inpuesto
2. Una funcion statica que sume 100 pe' cuando el deposito es mayor a 500 pe'
   Aplicarlo en el saldo

TRABAJO GRUPO
Sistema de toma de asistencia 
	Utilizar
php:Objetos
	->herencia
	->trait
	->encapsulamiento
	->statico
html 
	+Boostrap
	+JavaScript
mysql
	->Persista(Todo se guarda)

Hacer
	-Alta baja modificacion de alumnos (Nombre,apellido,dni,fecha nacimiento)
	-Interfaz grafica
	-Cargar asistencia
	-Porcentaje de asistencias(Promociona si o no)
	-Validacion(Si hay duplicado avisar)
	-Listado alfabeticamente por apellido
*/
require("Impuestos_Trait.php");
require("Objetos/Persona.php");
require("Objetos/CuentaBancaria.php");
require("Objetos/Banco.php");
echo ("------------------Registro de objetos----------------<br>");
$Persona1 = new Persona("Santiago", "Martinez", 45387761, 19, 0001);
$Persona2 = new Persona("Marcos", "Martinez", 44440531, 20, 0002);
$Banco1 = new Banco("Banco EntreRios", "Juan O'Dwayer 203");
$Cuenta1 = new cuentaBancaria($Persona1->numeroDeCuenta, $Persona1, 5000);
$Cuenta2 = new cuentaBancaria($Persona2->numeroDeCuenta, $Persona2, 7000);
$Banco1->agregarCuenta($Cuenta1);
$Banco1->agregarCuenta($Cuenta2);
print_r($Persona1);
echo ("<br>");
print_r($Persona2);
echo ("<br>");
print_r($Cuenta1);
echo ("<br>");
print_r($Cuenta2);
echo ("<br>");
print_r($Banco1);
echo ("<br>");
echo ("------------------------------------------------------------<br><br>");
//var_dump($cuenta1);


echo("<mark>Ejercicio 1.A de Impuestos: Retiro con Impuestos.</mark><br>");
echo ("<b>Sin Sobregiro: </b>");
$Cuenta1->Retirar(500);
echo ("<b>Con Sobregiro: </b>");
$Cuenta1->Retirar(5000);
echo ("<b>Sobrepasa las capacidades: </b>");
$Cuenta1->Retirar(202221311111111111);

?><pre hidden><?php $Cuenta1->Depositar(4510); ?></pre><?php
  $Cuenta1->tieneSobregiro = false;
echo ("<br><br>");
echo ("<mark>Ejercicio 1.B de Impuestos: Transferencias con Impuestos.</mark><br>");
  echo ("<u>Se ha reseteado el valor del saldo y del sobregiro de la cuenta 1 en</u>: ");
  print_r($Cuenta1->saldo);
  echo(" Para poder ejecutar varias opciones.");
  echo("<br><br><b>Sin Sobregiro:</B> ");
  $Cuenta1->Transferir(500, $Cuenta1, $Cuenta2);
  echo ("<b>Con Sobregiro:</b> ");
  $Cuenta1->Transferir(4500, $Cuenta1, $Cuenta2);
  echo ("<br><b>Transferencia otra vez luego de tener sobregiro:</b> ");
  $Cuenta1->Transferir(500, $Cuenta1, $Cuenta2);
  echo ("<b>Transferencia excedida de monto y sobregiro:</b> ");
  $Cuenta1->Transferir(50000000, $Cuenta1, $Cuenta2);

echo ("<mark>Ejercicio 2 de impuestos: depósito con Static Function</mark><br>");
echo ("En cuenta 1 aplica la funcion: ");
$Cuenta1->Depositar(600);
echo ("<br>En cuenta 2 NO aplica la funcion: ");
$Cuenta2->Depositar(200);
//var_dump($Cuenta1);

?>