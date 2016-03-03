<?php

$letras = array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q',
		'V', 'H', 'L', 'C', 'K', 'E', 'T');
		
//PRUEBAS
$miDniNum = "44248212";
$miDniLetra = "f";

CompruebaDNI($letras, $miDniNum, $miDniLetra);

$miDniNum = "9999999999999";
$miDniLetra = "f";

CompruebaDNI($letras, $miDniNum, $miDniLetra);

$miDniNum = "44248212";
$miDniLetra = "h";

CompruebaDNI($letras, $miDniNum, $miDniLetra);



//FUNCIONES
function CompruebaDNI($letras, $num, $letra){
	
	echo "<h1>DNI: $num $letra</h1>";
	
	
	if($num < 0 || $num > 99999999)//INCORRECTO
		echo "<h2>ERROR Numero proporcionado incorrecto</h2>";
	
	else {//CORRECTO
	
		$resto = $num % 23;
	
		if($letras[$resto] == strtoupper($letra))
			echo "<h2>Los datos proporcionados son correctos</h2>";
		else
			echo "<h2>Los datos proporcionados NO son correctos</h2>";
	}
	
}