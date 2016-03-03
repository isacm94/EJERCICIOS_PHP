<?php
echo "<h1>MULTIPLOS DE 3</h1>";

$i = 1;

while($i <= 1000){
	
	if($i % 3 == 0)//es multiplo de 3
		echo "$i - ";

	$i++;
}

echo "<h1>MULTIPLOS DE 4</h1>";

$i = 1;

while($i <= 1000){

	if($i % 4 == 0)//es multiplo de 4
		echo "$i - ";
	
	$i++;
}