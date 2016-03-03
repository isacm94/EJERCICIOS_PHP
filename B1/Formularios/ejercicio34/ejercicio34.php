<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Tabla de multiplicar</title>
</head>
<body>

	<?php
	if (!$_POST){//Si no recibo datos, muestro formulario
		include "form.php";//muestra formulario	
		
	}else{//tratamos datos
		
		$num = $_POST['num'];//guardamos numero
		
		if(! is_numeric($num) || $num < 1 || $num > 10){ //tiene q ser numerico y estar entre 1 y 10
			//error
			
			echo "<h1> ERROR Intentelo de nuevo </h1>";
			include 'form.php';
		}
		else {//CORRECTO
			
				
			echo "<h1> Tabla de multiplicar del $num </h1>";
		
			for($i = 1; $i <= 10; $i++){
					
				echo "<p>$num x $i = ".($num*$i)."</p>";
					
			}
		}
	}
	?>

</body>
</html>