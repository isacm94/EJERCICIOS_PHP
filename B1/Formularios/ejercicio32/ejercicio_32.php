<?php
$nombre = $_POST['nombre'];

$ape = $_POST['ape'];

echo "<h3>";
	echo strtoupper($nombre)." ".strtoupper($ape);
echo "</h3>";


echo "<a href='ejercicio_32.html' title='volver'>Volver al formulario</a>";