<?php
//Form.php Formulario
//borrar.php borra los diarios
session_start();
if(! $_POST){
    include_once 'form.php';
    $_SESSION['diarios'] = Array();
}
else
{
    if(isset($_POST['anhadir']))
    {
        $_SESSION['diarios'][] = $_POST['nuevodiario'];
        
    }    
    if(isset($_POST['aleatorio']))
    {
        $rnd = rand (0, count($_SESSION['diarios']) - 1);
        
        $_SESSION['diarioseleccionado'] =$_SESSION['diarios'][$rnd] ;
        
    }  
    
include_once 'form.php';
}

