<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 51</title>
		<meta charset="UTF-8">
		<!-- <link rel="stylesheet" type="text/css" href="estilos.css">  -->
</head>
<body style="font-family: 'verdana';">
	<form action="" method="POST">
	
			 <h1>COMUNIDADES Y PROVINCIAS</h1>
			<label>Provincia:
				<input type="text" name="provincia"> 								
			
				<input type="submit" name="anhadir" value="Añadir">
			 	<input type="submit" name="verprovincias" value="Ver todas las provincias">
		 	
		 		<?php //error input-text
			  		if (isset($ArrayErrores['provinciavacia']))
						echo "<span style='color:red;'>".$ArrayErrores['provinciavacia']."</span>";	
			  		  
			  		else if (isset($ArrayErrores['provinciacondigitos']))
			  			echo "<span style='color:red;'>".$ArrayErrores['provinciacondigitos']."</span>";
			  		
			  		else if (isset($ArrayErrores['existeprovincia']))
						echo "<span style='color:red;'>".$ArrayErrores['existeprovincia']."</span>";					  		
			  	?> 	
			</label>
	</form> 


</body>
</html>