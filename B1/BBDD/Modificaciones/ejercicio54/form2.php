<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 54 - Form 2</title>
		<meta charset="UTF-8">
		<!-- <link rel="stylesheet" type="text/css" href="estilos.css">  -->
</head>
<body style="font-family: 'verdana';">
	<form action="" method="POST">
			
			<label>
				¿Desea borrar la provincia <?php echo GetNombreProvincia($_POST['provincia'])?> ?
				
				<?php $Provincia = GetNombreProvincia($_POST['provincia'])
					 //guardamos en la variable el nombre de la provincia para usarlo en el campor oculto?>
				
				<input type="hidden" name="campooculto" value="<?php echo $Provincia?>"> 
					<!-- campooculto -> Guarda el nombre de la provincia elegida -->
				
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