 <?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 35</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<form action="" method="POST">
		<div>
			 <p id="titulo">DATOS PERSONAS<p>
			 
			 <p>Nombre: <input type="text" name="nombre" value="<?=ValorPost('nombre')?>"  
			 		style='<?php  if (isset($ArrayErrores['NombreVacio']))
			 						echo "border-color: #FE8484;"?>'>
			  	<?php 
			  		if (isset($ArrayErrores['NombreVacio']))
						echo "<span style='color:red;'>".$ArrayErrores['NombreVacio']."</span>";	  					  		
			  	?>
			  </p>
			 <p>Apellidos: <input type="text" name="ape" value="<?=ValorPost('ape')?>"
			 		style='<?php  if (isset($ArrayErrores['ApeVacio']))
			 						echo "border-color: #FE8484;"?>'>
			 	<?php 
			  		if (isset($ArrayErrores['ApeVacio']))
						echo "<span style='color:red;'>".$ArrayErrores['ApeVacio']."</span>";	  					  		
			  	?>
			 </p>
			 <p>
				Sexo: 
				Hombre <input type="radio" name="sexo" value="Hombre" <?=CheckIfValue('sexo', 'Hombre')?> checked>
																				 
				Mujer <input type="radio" name="sexo" value="Mujer" <?=CheckIfValue('sexo', 'Mujer')?>>
			 </p>
			
			 <p> Curso:
				 <select name="cursos" style='<?php  if (isset($ArrayErrores['cursos']))
			 											echo "border-color: #FE8484;"?>'>
				 	  <option value="defecto" <?=CheckIfSelected('cursos', 'defecto')?>></option> <!-- por defecto, en blanco -->
					  <option value="1º SMR" <?=CheckIfSelected('cursos', '1º SMR')?>>1&deg; SMR</option>
					  <option value="2º SMR" <?=CheckIfSelected('cursos', '2º SMR')?>>2&deg; SMR</option>
					  <option value="1º ASIR" <?=CheckIfSelected('cursos', '1º ASIR')?>>1º ASIR</option>
					  <option value="2º ASIR" <?=CheckIfSelected('cursos', '2º ASIR')?>>2º ASIR</option>
					  <option value="1º DAW" <?=CheckIfSelected('cursos', '1º DAW')?>>1º DAW</option>
					  <option value="2º DAW" <?=CheckIfSelected('cursos', '2º DAW')?>>2º DAW</option>
				 </select>
				 <?php if (isset($ArrayErrores['cursos']))
						echo "<span style='color:red;'>".$ArrayErrores['cursos']."</span>";	
					?>
			 </p>
			 Fecha de nacimiento: <input type="text" name="fecha" value="<?=ValorPost('fecha', 'dd/mm/aaaa')?>" 
			 		style='<?php  if (isset($ArrayErrores['fecha']))
			 						echo "border-color: #FE8484;"?>'>
			 <?php if (isset($ArrayErrores['fecha']))
						echo "<span style='color:red;'>".$ArrayErrores['fecha']."</span>";	
				?>	
			 <p>					
			 <textarea name="observaciones" rows="4" cols="50">
				
			 </textarea>
			 </p>
			 <input type="submit" name="guardar" value="Guardar">
			 		 
			 
			
		 </div>
	</form>


</body>
</html>