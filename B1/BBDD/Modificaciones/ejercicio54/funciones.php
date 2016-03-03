<?php 
function v1_GetArrayProvincias(){//Crea el array de provincias desde BBDD

	include 'bbdd_conexInicio.php';

	// Realizar una consulta MySQL
	$query = 'SELECT cod, nombre as nom
				FROM `tbl_provincias`';

	$result = mysqli_query($link, $query)
	or die('Consulta fallida: ' . mysqli_error($link));


	// Guardamos los datos en el array
	$NombresProvincias = Array();

	while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {

		$NombresProvincias[$line['cod']] = $line['nom'];
	}

	include 'bbdd_conexFin.php';

	return $NombresProvincias; //Indexados por el codigo de provincia

}

function GetNombreProvincia($cod){ 
	
	$array = v1_GetArrayProvincias();
	
	return $array[$cod];
}
/**
 *
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
function v1_CreaSelect($name, $opciones, $valorDefecto='')
{
	$html="\n".'<select name="'.$name.'">';
	foreach($opciones as $value=>$text)
	{
		if ($value==$valorDefecto)
			$select='selected="selected"';
		else
			$select="";
		$html.= "\n\t<option value=\"$value\" $select>$text</option>";
	}
	$html.="\n</select>";

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


function BorrarProvincia($provincia){
	
	include 'bbdd_conexInicio.php';//Conecta bbdd
	
	// sql to delete a record
	$sql = "DELETE FROM tbl_provincias WHERE nombre='$provincia';";

		//si falla 
		if ($link->query($sql) === FALSE) 
			echo "<h2>Error borrando provincia: " . $Link->error."</h2>";
		
	
	include 'bbdd_conexFin.php';//Cierra bbdd
}