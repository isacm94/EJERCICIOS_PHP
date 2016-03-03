<?php
echo "<h1>MULTIPLOS DE 3</h1>";

$i = 1;

while($i <= 1000){

	if($i % 3 == 0)//es multiplo de 3
		echo " $i ";
	
	if($i % 10 == 0)
		echo "<br>";//salto de línea

	$i++;
}

//------

echo "<h1>MULTIPLOS DE 5</h1>";

$i = 1;

while($i <= 1000){

	if($i % 5 == 0)//es multiplo de 5
		echo " $i  ";
	
	if($i % 10 == 0)
		echo "<br>";//salto de línea

	$i++;
}

//------

echo "<h1>MULTIPLOS DE 7</h1>";

$i = 1;

while($i <= 1000){

	if($i % 7 == 0)//es multiplo de 7
		echo " $i  ";
	
	if($i % 10 == 0)
		echo "<br>";//salto de línea

	$i++;
}