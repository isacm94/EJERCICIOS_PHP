<?php

/**
 * Función que comprueba que el formato de una fecha sea correecto
 * Formato --> dd-mm-aaaa
 * @param String $fecha Fecha a comprobar
 * @return boolean True si es correcto
 */
function FormatoFechaCorrecto($fecha) {
    $DIA = 2;
    $MES = 1;
    $YEAR = 0;

    $array_fecha = explode("-", $fecha);

    if (count($array_fecha) != 3)
        return FALSE;

    else {
        $dia = $array_fecha[$DIA];
        $mes = $array_fecha[$MES];
        $year = $array_fecha[$YEAR];

        return checkdate($mes, $dia, $year);
    }
}

function ValorPost($nombreCampo, $valorPorDefecto='')
{
	if (isset($_POST[$nombreCampo]))
		return $_POST[$nombreCampo];
	else
		return $valorPorDefecto;
}
