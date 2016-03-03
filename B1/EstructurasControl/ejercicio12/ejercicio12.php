<?php
$rnd = rand(1, 100);

echo "<h1>Tabla de multiplicar del $rnd</h1>";

$i = 0;
while($i <= 10){
	echo "$rnd x $i = ".($rnd*$i)."<br>";
	$i++;
}