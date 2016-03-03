<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 40</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<form action="" method="POST">
		<div>
			 <p id="titulo">CALCULADORA<p>
			 
			 <p>
			 	Operador 1: <input type="text" name="op1" value="<?=ValorPost('op1')?>">		
			 	<?php 
			  		if (isset($ArrayErrores['op1']))
						echo "<span style='color:red;'>".$ArrayErrores['op1']."</span>";	  					  		
			  	?>	  	
			 </p>
			 
			 <p>
			 	Operador 2: <input type="text" name="op2" value="<?=ValorPost('op2')?>">		
			 	<?php 
			  		if (isset($ArrayErrores['op2']))
						echo "<span style='color:red;'>".$ArrayErrores['op2']."</span>";	  					  		
			  	?>	  	
			 </p>
			 
			 <p>
			 	Operación: <input type="text" name="operacion" value="<?=ValorPost('operacion')?>" readonly >			  	
			 </p>
			 
			 <p>
			 	Resultado: <input type="text" name="result" value="<?=ValorPost('result')?>" readonly>			  	
			 </p>
			 
			 <p>
				 <input type="submit" name="suma" value="+ Sumar">
				 <input type="submit" name="resta" value="- Restar">
				 <input type="submit" name="multi" value="* Multiplicar">
				 <input type="submit" name="div" value="/ Dividir">
			 </p> 
			 
			
		 </div>
	</form>


</body>
</html>