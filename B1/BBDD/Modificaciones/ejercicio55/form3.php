<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 55 - Borrar</title>
		<meta charset="UTF-8">
		<!-- <link rel="stylesheet" type="text/css" href="estilos.css">  -->
</head>
<body style="font-family: 'verdana';">
	<form action="procesa.php" method="GET">
	
			
			<label>
				Se ha procedido a borrar la provincia <?php echo $_GET['NombreProvinciaHIDDEN']?>	
				<br><br>
				<input type="submit" name="borrarmodificarotra" value="Modificar o borrar otra provincia">
			</label>
	</form> 


</body>
</html>