<?php
include 'funciones_fecha.php';+

$day = date('l'); //lo guarda en ingles
$numDia = date('d');
$num_mes = date('m');
$numYear = date('Y');

//dia _semana (lunes...), num_dia de nombre_mes de num_anyo
echo "<h1>".DiaSemana($day).", $numDia de ".NombreMes($num_mes)." de ".$numYear."</h1>";