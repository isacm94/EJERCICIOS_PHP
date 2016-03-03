<?php
include_once 'mdl_ciudades.php';
// Ruta URL desde la que ejecutamos el script
$myURL = 'index.php';

$nElementosxPagina = 30;

// Calculamos el n�mero de p�gina que mostraremos
if (isset($_GET['pag'])) {
    // Leemos de GET el n�mero de p�gina
    $nPag = $_GET['pag'];
} else {
    // Mostramos la primera p�gina
    $nPag = 1;
}

// Calculamos el registro por el que se empieza en la sentencia LIMIT
$nReg = ($nPag - 1) * $nElementosxPagina;

$ciudades = array();
$ciudades = GetCiudades($nReg, $nElementosxPagina);

$totalRegistros = GetNumRegistrosCiudades();

$totalPaginas = $totalRegistros / $nElementosxPagina;

if (is_float($totalPaginas)) {
    $totalPaginas = intval($totalPaginas);
    $totalPaginas++;
}
include_once 'pantalla1.php';



//
// --SENTENCIAS PHP -- Cerramos la p�gina
//
// -----------------------------------------------------------------------

/**
 * Muestra un paginador para una lista de elementos
 * 
 * @param int $pag_actual
 * @param unknown $nPags
 * @param unknown $url
 */
function MuestraPaginador($pag_actual, $nPags, $url) {
    // Mostramos paginador
    echo EnlaceAPagina($url, 1, 'Inicio');
    echo EnlaceAPagina($url, $pag_actual - 1, 'Anterior', $pag_actual > 1);
//    for ($pag = 1; $pag <= $nPags; $pag++) {
//        echo EnlaceAPagina($url, $pag, $pag, $pag_actual != $pag);
//    }
    echo EnlaceAPagina($url, $pag_actual + 1, 'Siguiente', $pag_actual < $nPags);
    echo EnlaceAPagina($url, $nPags, 'Fin');
 
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
function EnlaceAPagina($url, $pag, $texto, $activo = true) {
    if ($activo)
        return ' <a href="' . $url . '?pag=' . $pag . '">' . $texto . '</a> ';
    else
        return $texto;
}
