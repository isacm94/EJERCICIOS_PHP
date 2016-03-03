<?php
$v1=5;
$v2=7;

echo "<p>Variable 1: $v1</p>";
echo "<p>Variable 2: $v2</p>";

echo "<p>Intercambiando variables...</p>";

Intercambia($v1, $v2);

echo "<p>Variable 1: $v1</p>";
echo "<p>Variable 2: $v2</p>";
//FUNCIONES
function Intercambia(&$v1, &$v2){
	
	$temp = $v1;//v1
	$v1 = $v2;//v2
	$v2 = $temp; //v1	
}