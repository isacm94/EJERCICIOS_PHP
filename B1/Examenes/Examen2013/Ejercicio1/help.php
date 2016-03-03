<?php

/**
 * Función que comprueba que el formato de una fecha sea correecto
 * Formato --> dd-mm-aaaa
 * @param String $fecha Fecha a comprobar
 * @return boolean True si es correcto
 */
function FormatoFechaCorrecto($fecha) {
    $DIA = 0;
    $MES = 1;
    $YEAR = 2;

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

function Edad($fechanacimiento) {
    $DIA = 0;
    $MES = 1;
    $YEAR = 2;

    $array_fecha = explode("-", $fechanacimiento);

    $dia = $array_fecha[$DIA];
    $mes = $array_fecha[$MES];
    $year = $array_fecha[$YEAR];


    $edad = date("Y") - $year;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
        $edad--;
    return $edad;
}

/**
 * Función que crea un select con el campo por defecto vacío
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string Código HTML generado
 */
function CreaSelect($name, $opciones, $valorDefecto = '', $tamanho = '') {
    $valorElegido = '';

    if (isset($_POST[$name]))
        $valorElegido = $_POST[$name]; //Si se ha elegido ya una provincia que lo muestre

    $html = "\n" . '<select class="form-control" name="' . $name . '" ' . $tamanho . ' >';

    $html.= "\n\t<option value='defecto' selected></option>";

    foreach ($opciones as $key => $text) {
        if ($valorElegido == $key)
            $select = 'selected="selected"';
        else
            $select = "";

        $html.= "\n\t<option value=$key $select>$text</option>";
    }

    $html.="\n</select>";

    return $html;
}

/**
 * Función que crea RadioButtons
 * @param String $name Nombre del campo
 * @param Array $values Datos de los RadioButtons
 * @return String Código HTML generado
 */
function CreaRadio($name, $values) {
    $valorGuardado = "";
    if (isset($_POST[$name]))
        $valorGuardado = $_POST[$name];

    $html = '';

    $numRespuestas = count($values);

    foreach ($values as $value => $text) {
        $html.= '<label class="radio-inline">';
        $html.= '<input type="radio" name="' . $name . '" value="' . $value . '" ';
        $html.= $text == $valorGuardado ? ' checked ' : '';
        $html.='>' . $text . '</label>';
    }

    return $html;
}

function CreaCheckBox($name, $datos) {

    $html = "";

    foreach ($datos as $value => $text) {


        $html.= '<label>';

        $html.= ' <input ';
        $html.= ' type="checkbox"';
        $html.= " name= $name" . "[]";
        $html.= " value = '$value' ";
        $html.= CheckIfValueInArray($name, $value);
        $html .= '></input>';

        $html.= $text;

        $html.= '</label>';
    }

    return $html;
}

function CheckIfValueInArray($nombreCampoArray, $valor) {

    //Si existe el campo
    if (isset($_POST[$nombreCampoArray]) && in_array($valor, $_POST[$nombreCampoArray])) {
        return ' checked ';
    } else {
        return '';
    }
}
function GetImporte($examenes){
            
    $importe = 0;
    
    foreach ($examenes as $key => $value ){
        if($examenes[$key]=='Practico')
            $importe += 90;
        else if($examenes[$key]=='Teorico')
            $importe += 60;
    }
    return $importe;
}