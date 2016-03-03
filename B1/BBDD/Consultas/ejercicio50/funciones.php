<?php
function GetArrayComunidades(){//Crea el array de Comunidades desde BBDD
	
	// Conectando, seleccionando la base de datos
	$link = mysqli_connect('localhost', 'root', '')
		or die('No se pudo conectar: ' . mysqli_error($link));
	
	//echo 'Connected successfully';
	mysqli_set_charset($link, "utf8");
	
	mysqli_select_db($link, 'bdprovincias')
		or die('No se pudo seleccionar la base de datos');
	
	// Realizar una consulta MySQL
	$query = 'SELECT nombre as nombreCom
				FROM `tbl_comunidadesautonomas`;';
	
	$result = mysqli_query($link, $query) 
		or die('Consulta fallida: ' . mysqli_error($link));
	
	
	// Guardamos los datos en el array	
	$NombresComunidades = Array();
	$cont = 0;
	
	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
	
		$NombresComunidades[$cont] = $line['nombreCom'];
		$cont++;
	}
	
	// Liberar resultados
	mysqli_free_result($result);
	
	// Cerrar la conexión
	mysqli_close($link);
	
	return $NombresComunidades;
	
}
function CreaSelect(){

	$Comunidades = array();	
	$Comunidades = GetArrayComunidades();
			
	$html = '';

	$numCom = count($Comunidades);

	$html.=	'<label>';

	$html.= 'Selecciona CCAA: ';

	$html.= '<select name="comunidades">';
		
		for($i = 0;$i < $numCom; $i++){
	
			$html.= '<option  ';
			$html.= ' value= "'.$Comunidades[$i].'"> ';
			$html.= $Comunidades[$i];
			$html.= '</option>';
	
		}
		
	$html.= '</select>';

	$html.= '</label>';

	return $html;
}
function MuestraProvincia($comunidad){
	
	// Conectando, seleccionando la base de datos
	$link = mysqli_connect('localhost', 'root', '')
		or die('No se pudo conectar: ' . mysqli_error());
	
	//echo 'Connected successfully';
	mysqli_set_charset($link, "utf8");
	

	mysqli_select_db($link, 'bdprovincias')
	or die('No se pudo seleccionar la base de datos');
	
	// Realizar una consulta MySQL sobre el número de provincias q tiene cada comunidad
	$query_numProv = 'SELECT COUNT(p.cod) as numProv, c.nombre as nombreCom
						FROM `tbl_provincias` p, `tbl_comunidadesautonomas` c
					    	WHERE p.comunidad_id = c.id
					    		GROUP BY p.comunidad_id
			                    	ORDER BY p.comunidad_id';

	$result2 = mysqli_query($link, $query_numProv)
		or die('Consulta fallida: ' . mysqli_error($link));
	
	
	//Guarda en el array los datos del select anterior
	$arrayNumProv = Array();
	$cont = 0;
	while ($fila = mysqli_fetch_array($result2, MYSQL_ASSOC)){
		
		$arrayNumProv[$fila['nombreCom']] = $fila['numProv'];
		$cont++;
	}
	
	// Realizar una consulta MySQL sobre las comunidades y sus pronvicias
	$query = 'SELECT c.nombre as nombreCom,  p.nombre as nombreProv
				FROM `tbl_provincias` p, `tbl_comunidadesautonomas` c
					WHERE p.comunidad_id = c.id
						ORDER BY c.nombre';
	
	$result = mysqli_query($link, $query) 
		or die('Consulta fallida: ' . mysqli_error($link));
	
	
	// Imprimir los resultados en HTML
	echo "<h1>Provincias: </h1>\n";
	
	$com = "";
	
	echo "<table border='1' style='border-collapse: collapse;'>\n";
		echo "<tr><th>CCAA</th><th>Provincias</th></tr>";
	
		while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			
			echo "\t<tr>\n";
			
				if($line['nombreCom']==$comunidad){
					if($line['nombreCom'] != $com){
				
						$com = $line['nombreCom'];
				
						echo "<td rowspan='".$arrayNumProv[$line['nombreCom']]."'>";
							echo $line['nombreCom'];
						echo "</td>";
						
						echo "<td>".$line['nombreProv'].'</td>';		
					}
					else
						echo "<td>".$line['nombreProv']."</td>";
				}
		
			echo "\t</tr>\n";
		}
		
		echo "</table>\n";
		
		// Liberar resultados
		mysqli_free_result($result);
		
		// Cerrar la conexión
		mysqli_close($link);
	
}