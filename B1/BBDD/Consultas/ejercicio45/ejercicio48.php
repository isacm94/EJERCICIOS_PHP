<?php

include_once 'cabecera.html';

// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost', 'root', '')
	or die('No se pudo conectar: ' . mysql_error());

echo 'Connected successfully';

mysqli_set_charset($link, "utf8");

mysqli_select_db($link, 'bdprovincias')
or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = 'SELECT c.nombre as nombreCom,  p.nombre as nombreProv
			FROM `tbl_provincias` p, `tbl_comunidadesautonomas` c
				WHERE p.comunidad_id = c.id
					ORDER BY c.nombre';

$result = mysqli_query($link, $query) 
	or die('Consulta fallida: ' . mysql_error());


// Imprimir los resultados en HTML
echo "<h1>Provincias: </h1>\n";

$com = "";

while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
	
	if($line['nombreCom'] != $com){
		
		$com = $line['nombreCom'];
		
		echo "<br>".$line['nombreCom'].": ".$line['nombreProv'];
		
	}
	else 
		echo ", ". $line['nombreProv'];
	
}
// Liberar resultados
mysqli_free_result($result);

// Cerrar la conexión
mysqli_close($link);
include_once 'pie.html';