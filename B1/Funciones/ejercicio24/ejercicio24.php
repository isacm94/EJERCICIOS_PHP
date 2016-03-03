<?php
$fechaActual = date('d/m/Y');
$horaActual = date('G:i:s');

echo "<h1>Fecha actual " . $fechaActual."</h1>";
echo "<h1>Hora actual " . $horaActual."</h1>";

$_50segundos = time() + (50);
					// 7 días; 24 horas; 60 minutos; 60 segundos

echo '<h1>50 segundos despues... FECHA '. date('d/m/Y', $_50segundos)." - HORA ".date('G:i:s', $_50segundos) ."</h1>";

//OTRO CALCULO

echo '<h1>2 horas, 4 minutos y 3 segundos despues... ';

$horaDespues = new DateTime($horaActual);
$horaDespues->add(new DateInterval('PT2H4M3S'));

$fechaDespues = new DateTime($horaActual);
$fechaDespues->add(new DateInterval('PT2H4M3S'));

echo "FECHA ".$fechaDespues->format('d/m/Y');

echo " - HORA ".$horaDespues->format('H:i:s');

echo "</h1>";
