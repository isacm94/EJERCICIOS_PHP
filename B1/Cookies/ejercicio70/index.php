<?php 

if (! isset($_COOKIE["cont"])){ //PRIMERA VEZ
   	$_COOKIE["cont"] = 1; 
   	setcookie('cont', $_COOKIE["cont"]);

   	include_once 'primeravez.php';
}else{ 
   	$_COOKIE["cont"]++; 
   	setcookie('cont', $_COOKIE["cont"]);

   	include_once 'hora.php';
}
?> 