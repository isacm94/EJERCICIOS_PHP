<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 54 - Form 3</title>
		<meta charset="UTF-8">
		<!-- <link rel="stylesheet" type="text/css" href="estilos.css">  -->
</head>
<body style="font-family: 'verdana';">
	<form action="" method="POST">
	
			
			<label>
				Se ha procedido a borrar la provincia <?php echo $_POST['campooculto']?>	
				<br><br>
				<input type="submit" name="borrarotra" value="Borrar otra provincia">
				<input type="submit" name="verprovincias" value="Ver todas las provincias">
			</label>
	</form> 


</body>
</html>