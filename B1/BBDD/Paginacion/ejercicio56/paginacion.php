<?php
/** 
 * EJEMPLO GENERICO SOBRE COMO PAGINAR UN CONJUNTO DE RESULTADOS EN PHP
 * 
 * solo nos centraremos en la p�ginaci�n. El resto del c�digo depender� de lo que estemos realizando
 * 
 * Utilizaremos paginaci�n indicando el n�mero de p�gina por $_GET
 * 
 * La URl tendr� el siguiente formato: lista.php?pag=X
 *  
 **/


$tabla_a_listar="paises";

// Ruta URL desde la que ejecutamos el script
$myURL='procesa.php'; 

//
// --SENTENCIAS PHP -- Sentencias PHP de incio - Las que se precisen
include 'bbdd_conexInicio.php';
//

$nElementosxPagina=10;

// Calculamos el n�mero de p�gina que mostraremos
if (isset($_GET['pag']))
{
	// Leemos de GET el n�mero de p�gina
	$nPag=$_GET['pag'];
}
else 
{
	// Mostramos la primera p�gina
	$nPag=1;
}

//
// --SENTENCIAS PHP -- Leemos resultado en $reg
// Calculamos el total de registros que tenemos
$query = "select count(*) as total from $tabla_a_listar";

$result = mysqli_query($link, $query) 
	or die('Consulta fallida: ' . mysqli_error($link));

$reg = mysqli_fetch_array($result);//guardamos en el array

$totalRegistros=$reg['total'];
$totalPaginas=floor($totalRegistros/$nElementosxPagina);


// Calculamos el registro por el que se empieza en la sentencia LIMIT
$nReg=($nPag-1)*$nElementosxPagina;


$sqlTotal="select nombre from $tabla_a_listar LIMIT $nReg, $nElementosxPagina";


//
// --SENTENCIAS PHP -- Mostramos los elementos de la consulta como deseemos
$resultado = mysqli_query($link, $sqlTotal) 
	or die('Consulta fallida: ' . mysqli_error($link));


while ($line = mysqli_fetch_array($resultado)) {

	echo "<p>";
	echo $line['nombre'];
	echo "</p>";
}
//

MuestraPaginador($nPag, $totalPaginas, $myURL);


//
// --SENTENCIAS PHP -- Cerramos la p�gina
include 'bbdd_conexFin.php';
//

// -----------------------------------------------------------------------

/**
 * Muestra un paginador para una lista de elementos
 * 
 * @param int $pag_actual
 * @param unknown $nPags
 * @param unknown $url
 */
function MuestraPaginador($pag_actual, $nPags, $url)
{
	// Mostramos paginador
	echo '<div style="text-align=center">';
		echo EnlaceAPagina($url, 1, 'Inicio');
		echo EnlaceAPagina($url, $pag_actual-1, 'Anterior', $pag_actual>1);
		
			
		echo EnlaceAPagina($url, $pag_actual+1, 'Siguiente', $pag_actual<$nPags);
		echo EnlaceAPagina($url, $nPags, 'Fin');
		
		echo '<br>'; //Siguiente linea
		for($pag=1; $pag<=$nPags; $pag++)
		{
			echo EnlaceAPagina($url, $pag, $pag, $pag_actual!=$pag);
		}
	echo "</div>";
}

/**
 * Devuelve el texto de un enlace (etiqueta <a>) a la p�gina $url si el enlace est� activo,
 * en otro caso solo devuelve el texto 
 * 
 * @param string $url		URL de la p�gina que muestra la lista
 * @param int $pag			N� de p�gina al cual enlazamos
 * @param string $texto		Texto del enlace
 * @param bool $activo		Se muestra enlace (true) o no (false)	
 * @return string
 */
function EnlaceAPagina($url, $pag, $texto, $activo=true)
{
	if ($activo)
		return '  <a href="'.$url.'?pag='.$pag.'">'.$texto.'</a>  ';
	else 
		return $texto;
}