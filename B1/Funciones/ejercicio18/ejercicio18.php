<?php

for($i = 0; $i < 100; $i++){

	if(EsPrimo($i))
		echo " $i ";
}

//Funciones
function EsPrimo($num){
	
	$cont_div = 0; //contador de multiplos
	
	for($i = 1;$i <= $num; $i++)
	{
		if($num % $i == 0) //Es div
			$cont_div++;
	}
	
	
	if($cont_div == 2) //si tiene dos divisores es primo
		return true;
	else 
		return false;
}