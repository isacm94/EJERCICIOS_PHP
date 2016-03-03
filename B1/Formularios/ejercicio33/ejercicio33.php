<html>
<head>
	<title>Me llamo a mi mismo...</title>
</head>

<body>
	<h3>Formulario</h3>
<?php
if (!$_POST){//Si no recibo datos, muestro formulario
	
	//FORMULARIO
	include "form.php";
}
else{//Muestro datos recibidos
	
	//muestro formulario
	include "form.php";
	
	echo "<h3>";
		echo strtoupper($_POST['nombre'])." ".strtoupper($_POST['ape']);
	echo "</h3>";
	
	
} 
?> 
</body> 
</html>