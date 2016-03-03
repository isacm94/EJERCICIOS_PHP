<?php 
/*DATOS DE PRUEBA
 * INSERT INTO `tbl_provincias`(`cod`, `nombre`, `comunidad_id`) VALUES (54, 'Rociana', 20);
 * INSERT INTO `tbl_provincias`(`cod`, `nombre`, `comunidad_id`) VALUES (55, 'Villarrasa', 20);
 * INSERT INTO `tbl_provincias`(`cod`, `nombre`, `comunidad_id`) VALUES (56, 'Bollullos', 20);
 * INSERT INTO `tbl_provincias`(`cod`, `nombre`, `comunidad_id`) VALUES (57, 'Bonares', 20);
 * INSERT INTO `tbl_provincias`(`cod`, `nombre`, `comunidad_id`) VALUES (58, 'Almonte', 20);*/
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

function BorrarProvincia($cod){
	
	include 'bbdd_conexInicio.php';//Conecta bbdd
	
	// sql to delete a record
	$sql = "DELETE FROM tbl_provincias WHERE cod='$cod';";

		//si falla 
		if ($link->query($sql) === FALSE) 
			echo "<h2>Error borrando provincia: " . $Link->error."</h2>";
		
	
	include 'bbdd_conexFin.php';//Cierra bbdd
	
	include 'form3.php';
}

function ListadoProvincias(){

	$array = v1_GetArrayProvincias();
	
	foreach($array as $value=>$text){
		
		echo '<p>'.$text.' ';
			echo '<a href="formModificar.php?codprovincia='.$value.'">Modificar</a>';
			echo ' / ';
			echo '<a href="form2.php?codprovincia='.$value.'">Borrar</a>';
		echo '</p>';
	}

}
function Modificar($antiguoNombre, $nuevoNombre){

	include 'bbdd_conexInicio.php';//Conecta bbdd

	$sql = "UPDATE tbl_provincias
				SET nombre='$nuevoNombre'
					WHERE nombre = '$antiguoNombre'";

	if ($link ->query($sql) === FALSE)
		echo "<h2>Error actualizando: " . $conn->error. '</h2>';
	else
		include 'form4.php'; //Form fin de modificar --> confirma la modificación

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

