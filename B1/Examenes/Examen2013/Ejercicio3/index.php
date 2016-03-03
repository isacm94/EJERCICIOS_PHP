<?php

if (!isset($_COOKIE["cont"])) { //PRIMERA VEZ
    $_COOKIE["cont"] = 1;
    setcookie('cont', $_COOKIE["cont"]);
    setcookie('fecha', date('d/m/Y'));
    setcookie('hora', date('h:i:s'));

    include_once 'primeravez.php';
} else {
    $_COOKIE["cont"] ++;
    setcookie('cont', $_COOKIE["cont"]);
    setcookie('fecha', date('d/m/Y'));
    setcookie('hora', date('h:i:s'));
    include_once 'restodeveces.php';
}
?> 