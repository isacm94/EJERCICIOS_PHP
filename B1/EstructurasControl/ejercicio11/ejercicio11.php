<?php

$num = 1;
while($num <= 10){
	echo "<h1>Tabla de multiplicar del $num</h1>";
	
	$i = 0;
	while($i <= 10){
		echo "$num x $i = ".($num*$i)."<br>";
		$i++;
	}
	$num++;
}