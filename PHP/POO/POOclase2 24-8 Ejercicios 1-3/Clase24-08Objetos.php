<?php
//Ejercicio: Sistema Bancario, 3 CLASES: Persona, Banco, CuentaBancaria
//Para la clase persona: Va a tener ATRIBUTOS; Nombre, Apellido, Edad, DNI.
//Clase Banco: ATRIBUTOS NombreBanco, Dirección, Lista de Cuentas Bancarias(Array) Y sus métodos: *Constructor para inicializar nombre y dirección. *AgregarCuenta(Cuenta Lista). *BuscarCuentaPorTitular(Nombre, Apellido) -> Devuelve la cuenta bancaria asociada a esa persona.
//Clase CuentaBancaria: ATRIBUTOS NumeroDeCuenta, Titular, Saldo. y METODOS: *Constructor para Inicializar el NumeroDeCuenta, Titular y Saldo. *Depositar(Cantidad), *Retirar(Cantidad) Siempre y cuando que el saldo sea suficiente

//LISTADO DE TAREAS
//1-) EJERCICIO 1 Crear al menos DOS instancias de la clase PERSONA. y DOS instancias o mas de la clase CUENTA BANCARIA.
//2-) EJERCICIO 2 Crear UNA instancia de la clase BANCO y agregar las cuentasBancarias a la lista del banco.
//3-) EJERCICIO 3 Realizar las siguientes 3 operaciones: OPERACION 1A: DEPOSITA DIFERENTES CANTIDADES EN LAS CUENTAS BANCARIAS. OPERACION 2B: REALIZA RETIROS DE DIFERENTES MONTOS DE LAS CUENTAS BANCARIAS, VERIFICANDO QUE HAYA SALDO SUFICIENTE. OPERACION 3C: BUSCA UNA CUENTA BANCARIA POR EL TITULAR (NOMBRE Y APELLIDO) UTILIZANDO EL METODO buscarCuentaPorTitular();

require_once "Persona.php";
require_once "Banco.php";
require_once "CuentaBancaria.php";

$persona1 = new Persona("Santiago","Martinez",45387761,19,"0001");
$persona2 = new Persona("Marcos","Martinez",44440531,20,"0002");
echo ("TAREA 1. Personas<br>");
print_r($persona1);
echo ("<br>");        //todo OK
var_dump($persona2);

//$bancoRio = new Banco("asas", "sdsdsd");
echo ("<br>");
echo ("<br>");
echo ("TAREA 1. Cuentas Bancarias<br>");
$cuenta1 = new cuentaBancaria($persona1->numeroDeCuenta, $persona1, 0);
$cuenta2 = new cuentaBancaria($persona2->numeroDeCuenta, $persona2, 0);
print_r($cuenta1);
echo ("<br>");
var_dump($cuenta2);


echo ("<br>");
echo ("<br>");
echo ("TAREA 2. Banco<br>");
$banco1 = new Banco("Santander Rio", "Sarmiento 1035");
$banco1->agregarCuenta($cuenta1);
$banco1->agregarCuenta($cuenta2);
var_dump($banco1);


echo ("<br>");
echo ("<br>");
echo ("TAREA NUMERO 3: Operacion A. Deposita diferentes cantidades en las cuentas Bancarias<br>");
echo ("Cuenta 1 <br>");
$cuenta1->Depositar(50000);
$cuenta1->Depositar(10000);   //da un total de 60k.
var_dump($cuenta1);
echo ("<br>");

echo ("Cuenta 2 <br>");
echo ("Error NULO<br>");
$cuenta2->Depositar(0);   
var_dump($cuenta2);
echo ("<br>");
echo ("error NEGATIVO<BR>");
$cuenta2->Depositar(-1000);   
var_dump($cuenta2); 
echo ("<br>");
echo ("Depósito Correcto.<br>");
$cuenta2->Depositar(1000);   
var_dump($cuenta2); 

echo ("<br>");
echo ("<br>");
echo ("TAREA NUMERO 3: Operacion B. Retira diferentes cantidades en las cuentas Bancarias<br>");
$cuenta1->Retirar(5000);
echo ("Cuenta 1 <br>");
var_dump($cuenta1);
echo ("<br>Cuenta 1 con saldo Insuficiente<br>");
$cuenta1->Retirar(600000);
var_dump($cuenta1);
echo ("<br>Cuenta 2<br>");
$cuenta2->Retirar(999.1);
var_dump($cuenta2);

echo ("<br>");
echo ("<br>");

echo ("TAREA NUMERO 3: Operación C. Busca una cuenta Bancaria por Titular, mediante el metodo buscarCuentaPorTitular()<br>");
$banco1->buscarCuentaPorTitular("Santiago","Martinez");
?>