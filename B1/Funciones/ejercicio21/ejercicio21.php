<?php
$num = 5;

echo "<h1>Multiplicando por 2</h1>";

for($i = 0; $i < 10; $i++){
	
	EstNoSeDebeHacer();
}

//FUNCIONES
//sin parámetros, que hará uso de la palabra reservada global- que modifica la variable $num asignándole el doble de su valor.
// La variable está iniciada fuera de la función. Crea una página que cree y pruebe el funcionamiento de la función.

function EstNoSeDebeHacer(){
	
	global $num;
	
	$suma = $num * 2;
	echo "<p>".$suma."</p>";
	
	$num = $suma;
	
} 