<?php
include_once "help.php";
include_once "mdl.php";
$errores = Array();


$correcto = TRUE;
if(EMPTY($_POST['fecha']) || !FormatoFechaCorrecto($_POST['fecha'])){
    $errores['fecha'] = 'Fecha vacía o formato incorrecto';
    $correcto = FALSE;
}
if(EMPTY($_POST['anotacion'])){
    $errores['anotacion'] = 'Anotación vacía';
    $correcto = FALSE;
}

if($correcto){
    InsertaDiario(Array('fecha'=> $_POST['fecha'], 'anotacion'=> $_POST['anotacion']));
}
include_once "anhadir.php";
