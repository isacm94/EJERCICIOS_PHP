<?php

include_once 'cabecera.html';

// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost', 'root', '')
	or die('No se pudo conectar: ' . mysql_error());

echo 'Connected successfully';

mysqli_set_charset($link, "utf8");

mysqli_select_db($link, 'bdprovincias')
	or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL sobre el número de provincias q tiene cada comunidad
$query_numProv = 'SELECT COUNT(cod) as num, c.nombre as nombreCom
					FROM `tbl_provincias` p, `tbl_comunidadesautonomas` c
				    	WHERE p.comunidad_id = c.id
				    		GROUP BY p.comunidad_id
		                    	ORDER BY p.comunidad_id';

$result2 = mysqli_query($link, $query_numProv)
	or die('Consulta fallida: ' . mysql_error());


//Guarda en el array los datos del select anterior
$arrayNumProv = Array();
$cont = 0;
while ($fila = mysqli_fetch_array($result2, MYSQL_ASSOC)){
	
	$arrayNumProv[$fila['nombreCom']] = $fila['num'];
	$cont++;
}

// Realizar una consulta MySQL sobre las comunidades y sus pronvicias
$query = 'SELECT c.nombre as nombreCom,  p.nombre as nombreProv
			FROM `tbl_provincias` p, `tbl_comunidadesautonomas` c
				WHERE p.comunidad_id = c.id
					ORDER BY c.nombre';

$result = mysqli_query($link, $query) 
	or die('Consulta fallida: ' . mysql_error());


// Imprimir los resultados en HTML
echo "<h1>Provincias: </h1>\n";

$com = "";

echo "<table border='1' style='border-collapse: collapse;'>\n";
	echo "<tr><th>CCAA</th><th>Provincias</th></tr>";

	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		
		echo "\t<tr>\n";
		
			if($line['nombreCom'] != $com){
		
				$com = $line['nombreCom'];
		
				echo "<td rowspan='".$arrayNumProv[$line['nombreCom']]."'>";
					echo $line['nombreCom'];
				echo "</td>";
				
				echo "<td>".$line['nombreProv'].'</td>';		
			}
			else
				echo "<td>".$line['nombreProv']."</td>";
	
		echo "\t</tr>\n";
	}
	
	echo "</table>\n";
	
// Liberar resultados
mysqli_free_result($result);

// Cerrar la conexión
mysqli_close($link);
include_once 'pie.html';