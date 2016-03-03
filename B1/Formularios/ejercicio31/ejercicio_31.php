<?php
$num = $_POST['num'];

echo "<h1> Tabla de multiplicar del $num </h1>"; 
for($i = 1; $i <= 10; $i++){
	
	echo "<p>$num x $i = ".($num*$i)."</p>";
	
}