<?php
$num = 5;

echo "<h1>Multiplicando por 2</h1>";

for($i = 0; $i < 10; $i++){
	
	EstNoSeDebeHacer();
}

//FUNCIONES
//sin par�metros, que har� uso de la palabra reservada global- que modifica la variable $num asign�ndole el doble de su valor.
// La variable est� iniciada fuera de la funci�n. Crea una p�gina que cree y pruebe el funcionamiento de la funci�n.

function EstNoSeDebeHacer(){
	
	global $num;
	
	$suma = $num * 2;
	echo "<p>".$suma."</p>";
	
	$num = $suma;
	
} 