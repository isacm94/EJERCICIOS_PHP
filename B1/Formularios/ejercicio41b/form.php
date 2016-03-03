<?php include_once 'funciones.php';?>
<html>
<head>
		<title>Ejercicio 41</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<form action="" method="POST">
			 <h3>ENCUESTA SIGMA3</h3>
			 
			  <!-- RADIO -->
			  <p>
				<?php echo GetHTMLPregunta(array('texto_pregunta'=>'Sexo: ',
												'tipo'=>'radio',//type
												'campo'=>'sexo',//name
												'respuestas'=>array(
														array('etiqueta'=>'Hombre', 'valor'=>'H'),
														array('etiqueta'=>'Mujer', 'valor'=>'M'),
												)
										));?>
			  </p>	
			  
				<!-- CHECKBOX -->	
				<p>
				 <?php echo GetHTMLPregunta(array('texto_pregunta'=>'Aficiones: ',
											'tipo'=>'checkbox',//type	
				 							'campo'=>'opciones_aficiones',//name
											'respuestas'=>array(
													array('etiqueta'=>'Deporte', 'valor'=>'deporte'),
													array('etiqueta'=>'Cine', 'valor'=>'cine'),
													array('etiqueta'=>'Teatro', 'valor'=>'teatro'),
											)
									));
					 if (isset($ArrayErrores['opciones_aficiones']))
					 	echo "<span style='color:red;'>".$ArrayErrores['opciones_aficiones']."</span><br><br>";
				 ?>															 
				</p>
			
			<!-- CHECKBOX -->
			<p>	
			 <?php echo GetHTMLPregunta(array('texto_pregunta'=>'Estudios que tiene: ',
									'tipo'=>'checkbox',//type	
			 						'campo'=>'opciones_estudios',//name
									'respuestas'=>array(
											array('etiqueta'=>'ESO', 'valor'=>'eso'),
											array('etiqueta'=>'C.F.G.Medio', 'valor'=>'medio'),
											array('etiqueta'=>'C.F.G. Superior', 'valor'=>'superior'),
											array('etiqueta'=>'Grado', 'valor'=>'grado'),
									)
							));
				 if (isset($ArrayErrores['opciones_estudios']))
				 	echo "<span style='color:red;'>".$ArrayErrores['opciones_estudios']."</span><br><br>";
			 ?>	
			</p>
			<!-- SELECT -->
			<p>
				<?php echo GetHTMLPregunta(array('texto_pregunta'=>'Lugar a donde le gustaría ir de vacaciones: ',
										'tipo'=>'select',//type										
										'campo'=>'lugares',//name
										'respuestas'=>array(
													array('etiqueta'=>'', 'valor'=>'defecto'),
													array('etiqueta'=>'Mediterráneo', 'valor'=>'mediterraneo'),
													array('etiqueta'=>'Caribe', 'valor'=>'caribe'),
													array('etiqueta'=>'EEUU', 'valor'=>'eeuu'),
													array('etiqueta'=>'Centro europa', 'valor'=>'centroeuropa'),
											)
									));
				 
				 	  if (isset($ArrayErrores['lugares']))
					  	echo "<span style='color:red;'>".$ArrayErrores['lugares']."</span>";
				?>
			</p>
			 <input type="submit" name="enviar" value="Enviar">
	</form>


</body>
</html>