<?php
$seg_actual = time();
$i = 0;
$cont_mult = 0; //Contador de multiplos
$cont_linea = 0; //Contador de lineas

echo "<h1>Segundos actual: $seg_actual </h1>";

echo "<h2>Multiplos de 5 </h2>";

do{
	if($i % 5 == 0){//es multiplo de 5
		echo " $i ";
		$cont_mult++;
	}
	
	if($cont_mult == 10){ //que muestre solo 10 números por linea
		echo "<br>";
		$cont_mult = 0;
		$cont_linea++;
	}	
	
	if($cont_linea == 10){ //cada 10 líneas muestra separador
		echo "_________________________________________________________<br>";
		$cont_linea = 0;
	}
		
	$i++;
}while (!($seg_actual + 5 == time()));//que muestre los multiplos de 5 en 5 segundos 

echo "<h1>Segundos actual: ".time()."</h1>";
