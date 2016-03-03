<?php
include_once 'cabecera.html';

// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost', 'root', '')
or die('No se pudo conectar: ' . mysqli_error($link));
	
echo 'Connected successfully';

mysqli_set_charset($link, "utf8");

mysqli_select_db($link, 'bdprovincias')
or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = 'SELECT COUNT(cod) as num, c.nombre as nombre
			FROM `tbl_provincias` p, `tbl_comunidadesautonomas` c
		    	WHERE p.comunidad_id = c.id
		    		GROUP BY p.comunidad_id';
		    		
$result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysqli_error($link));

// Imprimir los resultados en HTML
echo "<h1>Provincias: </h1>\n";
echo "<table>\n";
	echo "<tr><th>Número de provincias</th><th>Comunidad</th></tr>";
	
	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		echo "\t<tr>\n";	
		 	echo "<td>".$line['num']."</td> ";
		 	echo "<td>".$line['nombre']."</td>\n";		
		echo "\t</tr>\n";
	}
echo "</table>\n";

// Liberar resultados
mysqli_free_result($result);

// Cerrar la conexión
mysqli_close($link);

include_once 'pie.html';