<?php 

if (! isset($_COOKIE["cont"])){ 
   	$_COOKIE["cont"] = 1; 
   	setcookie('cont', $_COOKIE["cont"]);
}else{ 
   	$_COOKIE["cont"]++; 
   	setcookie('cont', $_COOKIE["cont"]);
}
?> 

<html> 
<head> 
<title>Contador páginas</title> 
</head> 

<body> 
<?php
echo "Desde que entraste has visto " . $_COOKIE["cont"] . " páginas"; 
?> 
</body> 
</html>
