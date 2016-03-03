<?php
//SELECT de inserccion de la nueva tabla --> INSERT INTO `tbl_comunidadesautonomas`(`id`, `nombre`) VALUES (20, 'NuevaProvincias')
function AñadeProvincia($provincia){
	
	include 'bbdd_conexInicio.php';//Conecta bbdd

		//Codigo de la provincia insertada
		$numProv =  GetNumProvinciasTotal();
		$numProv += 1;
		
		$sql = "INSERT INTO `tbl_provincias`(cod , nombre, comunidad_id) 
										VALUES ($numProv, '$provincia', 20)";
		
		if ($link->query($sql) === TRUE) {
		    echo "<h3>La provincia $provincia ha sido añadida correctamente</h3>";
		} else {
		    echo "Error: " . $sql . "<br>" . $link->error;
		}
	
	include 'bbdd_conexFin.php';//Cierra bbdd	
}

function GetNumProvinciasTotal() {
	
	include 'bbdd_conexInicio.php';//Conecta bbdd	
	
	
	// Realizar una consulta MySQL sobre el número de provincias q tiene cada comunidad
	$query_numProv = 'SELECT COUNT(cod) as numProvincias 
						FROM tbl_provincias';
	
	$result = mysqli_query($link, $query_numProv)
		or die('Consulta fallida: ' . mysqli_error($link));
	
	
	//Guarda en el array los datos del select anterior
	$numProvincias = Array();
	while ($fila = mysqli_fetch_array($result, MYSQL_ASSOC)){
	
		$numProvincias = $fila;
	}

	
	include 'bbdd_conexFin.php';//Cierra bbdd
	
	return $numProvincias['numProvincias'];
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


function ExisteProvincia($provinciaBuscada){
	
	$provinciaBuscada = strtolower($provinciaBuscada);//lo cambiamos a minusculas para bsucarlo todo en minusculas
	
	include 'bbdd_conexInicio.php';//Conecta bbdd

	// Realizar una consulta MySQL sobre el número de provincias q tiene cada comunidad
	$query = 'SELECT nombre as nom
				FROM tbl_provincias';

	$result = mysqli_query($link, $query)
	or die('Consulta fallida: ' . mysqli_error($link));


	//Guarda en el array los datos del select anterior
	$provincias = Array();
	$i = 0;
	while ($fila = mysqli_fetch_array($result, MYSQL_ASSOC)){

		$provincias[$i] = strtolower($fila['nom']);//Lo guardamos en minusculas
		$i++;
	}
	include 'bbdd_conexFin.php';//Cierra bbdd

	/*
	 echo '<pre>';
	 print_r($provincias);
	 echo '</pre>';*/

	if(in_array($provinciaBuscada, $provincias))
		return true;
	else
		return false;
}

function ContieneAlgunDigito($provincia){
	
	$provincia = strtolower($provincia);//lo cambiamos a minusculas para bsucarlo todo en minusculas
	
	$arrayProvincia = str_split($provincia);
		
	$correcto = FALSE;

	foreach ($arrayProvincia as $caracter) {
		
		if (is_numeric($caracter)) //es un digito
			$correcto = TRUE;		
	}
	
	return $correcto;
}