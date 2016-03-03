<?php 
function GetArrayProvincias(){//Crea el array de provincias desde BBDD

	include 'bbdd_conexInicio.php';

	// Realizar una consulta MySQL
	$query = 'SELECT nombre as nom
				FROM `tbl_provincias`';

	$result = mysqli_query($link, $query)
		or die('Consulta fallida: ' . mysqli_error($link));


	// Guardamos los datos en el array
	$NombresProvincias = Array();
	$cont = 0;

	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {

		$NombresProvincias[$cont] = $line['nom'];
		$cont++;
	}

	include 'bbdd_conexFin.php';

	return $NombresProvincias;

}
function CreaSelect(){

	$Provincias = array();
	$Provincias = GetArrayProvincias();
		
	$html = '';

		$numProv = count($Provincias);
	
		$html.=	'<label>';
	
			$html.= 'Provincia: ';
		
				$html.= '<select name="provincias">';
			
				for($i = 0;$i < $numProv; $i++){
			
					$html.= '<option  ';
					$html.= ' value= "'.$Provincias[$i].'"> ';
					$html.= $Provincias[$i];
					$html.= '</option>';
			
				}
			
				$html.= '</select>';
	
		$html.= '</label>';

	return $html;
}

function VerTodasLasProvincias(){
	include 'bbdd_conexInicio.php';//Conecta bbdd

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

	include 'bbdd_conexFin.php';//Cierra bbdd
}

function ContieneAlgunDigito($provincia){

	$provincia = strtolower($provincia);//lo cambiamos a minusculas para bsucarlo todo en minusculas

	$arrayProvincia = str_split($provincia);//lo convierte a array

	$correcto = FALSE;

	foreach ($arrayProvincia as $caracter) {

		if (is_numeric($caracter)) //es un digito
			$correcto = TRUE;
	}

	return $correcto;
}

function CambiarNuevoNombre($antiguoNombre, $nuevoNombre){
	
	include 'bbdd_conexInicio.php';//Conecta bbdd
	
		$sql = "UPDATE tbl_provincias 
					SET nombre='$nuevoNombre' 
						WHERE nombre = '$antiguoNombre'";
		
		if ($link ->query($sql) === TRUE) 
			echo "<h2>Provincia $nuevoNombre actualizada correctamente</h2>";
		else 
			echo "<h2>Error actualizando: " . $conn->error. '</h2>';
		
		
	
	include 'bbdd_conexFin.php';//Cierra bbdd
	
	
}