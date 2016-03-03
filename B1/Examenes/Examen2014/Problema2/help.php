<?php


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
