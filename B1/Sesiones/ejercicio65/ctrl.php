<?php 
session_start(); 

if (!isset($_SESSION["cont"])){ 
   	$_SESSION["cont"] = 1; 
}else{ 
   	$_SESSION["cont"]++; 
}
?> 

<html> 
<head> 
<title>Contador páginas</title> 
</head> 

<body> 
<?php
echo "Desde que entraste has visto " . $_SESSION["cont"] . " páginas"; 
?> 
</body> 
</html>
