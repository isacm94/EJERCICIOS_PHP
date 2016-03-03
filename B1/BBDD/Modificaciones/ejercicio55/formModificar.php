<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 55 - Modificar</title>
		<meta charset="UTF-8">
		<!-- <link rel="stylesheet" type="text/css" href="estilos.css">  -->
</head>
<body style="font-family: 'verdana';">
	<form action="procesa.php" method="GET">
	
			<h1>MODIFICAR PROVINCIA</h1>
			
			<label>Nuevo Nombre:
				<input type="text" name="nuevonombre"> 	
				<input type="submit" name="modificar" value="Modificar">
				
				<!--  <?= $codprovincia = $_GET['codprovincia'];?>   -->
				<input type="hidden" name="campooculto" value="<?= $_GET['codprovincia'];?>">
				
				
				<?php //error input-text
			  		if (isset($ArrayErrores['nuevonombrevacio']))
						echo "<span style='color:red;'>".$ArrayErrores['nuevonombrevacio']."</span>";	
			  		  
			  		else if (isset($ArrayErrores['nuevonombrecondigitos']))
			  			echo "<span style='color:red;'>".$ArrayErrores['nuevonombrecondigitos']."</span>";				  		
			  	?>		 			
			</label>
	</form> 


</body>
</html>