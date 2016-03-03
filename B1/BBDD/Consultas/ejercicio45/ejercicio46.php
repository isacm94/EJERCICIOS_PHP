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
$query = 'SELECT * FROM `tbl_provincias`';

$result = mysqli_query($link, $query) 
	or die('Consulta fallida: ' . mysqli_error());

// Imprimir los resultados en HTML
echo "<h1>Provincias: </h1>\n";
while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
	
	//foreach ($line as $col_value) {
		echo "<p>".$line['cod']." ".$line['nombre']."</p>\n";
	//}
}

// Liberar resultados
mysqli_free_result($result);

// Cerrar la conexión
mysqli_close($link);
include_once 'pie.html';