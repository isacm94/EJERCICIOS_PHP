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
			
				<?php $Provincia = GetNombreProvincia($_GET['codprovincia'])
					 //guardamos en la variable el nombre de la provincia para guardar el nombre de la provincia ?>
					 
				¿Desea borrar la provincia <?php echo $Provincia?> ?		
				
				
				<input type="hidden" name="campooculto" value="<?php echo $_GET['codprovincia']?>"> 
					<!-- campooculto -> Guarda el cod de la provincia elegida -->
				
				<input type="hidden" name="NombreProvinciaHIDDEN" value="<?php echo $Provincia?>"> 
					<!-- campooculto -> Guarda el cod de la provincia elegida -->
				
				
				<!-- OTRA FORMA
				<?php $arr = v1_GetArrayProvincias(); 
												echo $arr[$_POST['provincia']]?> 		
												 -->
				<input type="submit" name="siborrar" value="Sí">
				<input type="submit" name="noborrar" value="No">
			</label>
	</form> 


</body>
</html>