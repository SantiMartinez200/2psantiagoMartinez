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
require_once "Persona.php";
require_once "Banco.php";
require_once "CuentaBancaria.php";

$persona1 = new Persona("Santiago","Martinez",45387761,19,"0001");
$persona2 = new Persona("Marcos","Martinez",44440531,20,"0002");
/*echo ("TAREA 1. Personas<br>");
print_r($persona1);
echo ("<br>");        //todo OK
var_dump($persona2);*/

//$bancoRio = new Banco("asas", "sdsdsd");
/*echo ("<br>");
echo ("<br>");
echo ("TAREA 1. Cuentas Bancarias<br>");*/
$cuenta1 = new cuentaBancaria($persona1->numeroDeCuenta, $persona1, 0);
$cuenta2 = new cuentaBancaria($persona2->numeroDeCuenta, $persona2, 0);
/*print_r($cuenta1);
echo ("<br>");
var_dump($cuenta2);*/


/*echo ("<br>");
echo ("<br>");
echo ("TAREA 2. Banco<br>");*/
$banco1 = new Banco("Santander Rio", "Sarmiento 1035");
$banco1->agregarCuenta($cuenta1);
$banco1->agregarCuenta($cuenta2);
//var_dump($banco1);


/*echo ("<br>");
echo ("<br>");
echo ("TAREA NUMERO 3: Operacion A. Deposita diferentes cantidades en las cuentas Bancarias<br>");
echo ("Cuenta 1 <br>");*/
$cuenta1->Depositar(1000);
//$cuenta1->Depositar(10000);   //da un total de 60k.
/*var_dump($cuenta1);
echo ("<br>");*/

/*echo ("Cuenta 2 <br>");
echo ("Error NULO<br>");*/
//$cuenta2->Depositar(0);   
/*var_dump($cuenta2);
echo ("<br>");
echo ("error NEGATIVO<BR>");*/
//$cuenta2->Depositar(-1000);   
/*var_dump($cuenta2); 
echo ("<br>");
echo ("Depósito Correcto.<br>");*/
$cuenta2->Depositar(1000);   
//var_dump($cuenta2); 

/*echo ("<br>");
echo ("<br>");
echo ("TAREA NUMERO 3: Operacion B. Retira diferentes cantidades en las cuentas Bancarias<br>");*/
//$cuenta1->Retirar(5000);
/*echo ("Cuenta 1 <br>");
var_dump($cuenta1);
echo ("<br>Cuenta 1 con saldo Insuficiente<br>");*/
//$cuenta1->Retirar(600000);
/*var_dump($cuenta1);
echo ("<br>Cuenta 2<br>");*/
//$cuenta2->Retirar(999.1);
//var_dump($cuenta2);

/*echo ("<br>");
echo ("<br>");

echo ("TAREA NUMERO 3: Operación C. Busca una cuenta Bancaria por Titular, mediante el metodo buscarCuentaPorTitular()<br>");*/
//$banco1->buscarCuentaPorTitular("Santiago","Martinez");

//                        EJERCICIOS 31-08-2023

echo ("TAREA 4<BR>");
echo ("<br>----------------------------FUERA DE LA FUNCION----------------------------------------------------------------------------------------------------------------------------------------------------------<br>");
var_dump($cuenta1);
echo ("<br><br><br>");
var_dump($cuenta2);
echo ("<br><br><br>");
$cuenta1->Transferir(50, $cuenta1, $cuenta2);
echo ("<br><br><br>");

echo ("TAREA 5<BR>");
$persona3 = new Persona("Nicolas", "Bender", 44556000, -15, 0006);
echo ("<br>");
var_dump($persona3);

echo ("<br><br>TAREA 6: RETIRO");
$cuenta1->Retirar(100);
$cuenta1->Retirar(1300);
$cuenta1->Retirar(50);





//var_dump($cuenta1);
?>