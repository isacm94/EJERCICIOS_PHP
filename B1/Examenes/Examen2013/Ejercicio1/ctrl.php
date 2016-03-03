<?php
session_start();

include_once 'help.php';

include_once 'mdl_provincias.php';
$Provincias = GetProvincias();

$errores = Array();
if ($_POST) {

    if (isset($_POST['comenzar'])) {
        include_once 'pantalla21.php';
    }

    //PANTALLA 2.1
    if (isset($_POST['siguiente_pant21'])) {

        if (!FormatoFechaCorrecto($_POST['fecha'])) {
            $errores['fecha'] = "¡ERROR! Formato de fecha incorrecto";
            include_once 'pantalla21.php';
        } else if (Edad($_POST['fecha']) < 18) {
            include_once 'pantalla4.php';
        } else {//Mayor que 18
            $_SESSION['Edad'] = $_POST['fecha'];
            include_once 'pantalla22.php';
        }
    }

    //PANTALLA 2.2
    if (isset($_POST['anterior_pant22'])) {
        include_once 'pantalla21.php';
    }

    if (isset($_POST['siguiente_pant22'])) {

        $correcto = TRUE;

        if (EMPTY($_POST['nombre'])) {
            $correcto = FALSE;
            $errores['nombre'] = "¡ERROR! Nombre vacío";
        }

        if ($_POST['provincia'] == 'defecto') {
            $correcto = FALSE;
            $errores['provincia'] = "¡ERROR! Elige una provincia";
            ;
        }

        if (!isset($_POST['sexo'])) {
            $correcto = FALSE;
            $errores['sexo'] = "¡ERROR! Elige un sexo";
        }

        if (!$correcto)
            include_once 'pantalla22.php';
        else {
            $_SESSION['Nombre'] = $_POST['nombre'];
            $_SESSION['Provincia'] = $_POST['provincia'];
            $_SESSION['Sexo'] = $_POST['sexo'];
            include_once 'pantalla23.php';
        }
    }

    //PANTALLA 2.3
    if (isset($_POST['anterior_pant23'])) {
        include_once 'pantalla22.php';
    }
    if (isset($_POST['siguiente_pant23'])) {
        //print_r($_POST);
        $bien = TRUE;
        if (isset($_POST['hapasadoporpantalla23'])) {

            if (! isset($_POST['examen'])) {
                $bien = FALSE;
                $errores['examen'] = "¡ERROR! No has elegido ningún examen";
                include_once 'pantalla23.php';
            }
            if ($bien) {
                $_SESSION['Examen'] = $_POST['examen'];
                include_once 'pantalla3.php';
                
            }
        }
    }
    
    //PANTALLA 4
    if (isset($_POST['inicio'])) {
        include_once 'index.php';
    }
}
if(isset($datos))
print_r($datos);
//print _r($_POST);
