<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 52</title>
		<meta charset="UTF-8">
		<!-- <link rel="stylesheet" type="text/css" href="estilos.css">  -->
</head>
<body style="font-family: 'verdana';">
	<form action="" method="POST">
	
			<h1>COMUNIDADES Y PROVINCIAS</h1>
			
			<!-- SELECT -->		
			<?php echo CreaSelect();?>
			
			<label>Nuevo Nombre:
				<input type="text" name="nuevonombre"> 	
				<input type="submit" name="cambiar" value="Cambiar">
				
				<?php //error input-text
			  		if (isset($ArrayErrores['nuevonombrevacio']))
						echo "<span style='color:red;'>".$ArrayErrores['nuevonombrevacio']."</span>";	
			  		  
			  		else if (isset($ArrayErrores['nuevonombrecondigitos']))
			  			echo "<span style='color:red;'>".$ArrayErrores['nuevonombrecondigitos']."</span>";				  		
			  	?>			 			
			</label>
			
			<p>
				<input type="submit" name="verprovincias" value="Ver todas las provincias">
			</p>
	</form> 


</body>
</html>