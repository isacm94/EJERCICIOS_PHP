<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 54 - Form 1</title>
		<meta charset="UTF-8">
		<!-- <link rel="stylesheet" type="text/css" href="estilos.css">  -->
</head>
<body style="font-family: 'verdana';">
	<form action="" method="POST">
	
			<h1>COMUNIDADES Y PROVINCIAS</h1>
			
			<!-- SELECT -->					
			<label>Provincia: <?php echo v1_CreaSelect('provincia', v1_GetArrayProvincias())?>		
						
			<label>
				<input type="submit" name="borrar" value="Borrar">			 			
			</label>
			
			<p>
				<input type="submit" name="verprovincias" value="Ver todas las provincias">
			</p>
	</form> 


</body>
</html>