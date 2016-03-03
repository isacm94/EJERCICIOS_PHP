<?php

if(isset($_POST['borrar'])){
    $_POST['palabras'] = "";
    include_once "index.php";
}

if(isset($_POST['contar'])){
    $palabras = preg_split("/[\s,.;\n\t]+/", $_POST['palabras']);
    include_once "index.php";
    
    //array_pop($palabras);
    echo "Nº palabras: ". count($palabras)."<br>";
    
    echo implode(" | ", $palabras);
}



