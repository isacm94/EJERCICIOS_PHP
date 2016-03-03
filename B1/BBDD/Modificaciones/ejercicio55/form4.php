<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 55 - Modificar</title>
		<meta charset="UTF-8">
		<!-- <link rel="stylesheet" type="text/css" href="estilos.css">  -->
</head>
<body style="font-family: 'verdana';">
	<form action="procesa.php" method="GET">
			
			<label>
				Se ha procedido a modificar la provincia <?php echo GetNombreProvincia($_GET['campooculto'])?>	
				<br><br>
				<input type="submit" name="borrarmodificarotra" value="Modificar o borrar otra provincia">
			</label>
	</form> 


</body>
</html>