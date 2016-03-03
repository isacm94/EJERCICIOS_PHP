<?php

$numeros = array(99, 7, 9, 4, 2, 1, 8, 11, 14, 23, 33, 45, 76, 65, 77);

echo "<h1>El maximo de ";

$longitud = count($numeros);

for($i = 0; $i < $longitud; $i++){
	
	if($i < ($longitud -1))
		echo " ".$numeros[$i].", ";

	else
		echo " ".$numeros[$i];
}

echo " es : ".max($numeros)." </h1>";