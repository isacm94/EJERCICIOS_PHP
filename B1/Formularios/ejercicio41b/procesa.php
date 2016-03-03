<?php 
include_once 'cabecera.html';
include_once 'funciones.php';

$correcto = TRUE;
$ArrayErrores = array();

 	
		if ( ! $_POST )
		{ // Si no han enviado el fomulario
			include 'form.php';
		}
		else{//form enviado			
			if($_POST["lugares"]=="defecto"){
				$correcto = false;
				$ArrayErrores['lugares'] = " Elige un lugar";
			}
			if (! isset($_POST['opciones_aficiones']) )
			{
				$ArrayErrores['opciones_aficiones']=' No hay seleccionado ningúna afición';
				$correcto = FALSE;
			}
			
			if (! isset($_POST['opciones_estudios']) )
			{
				$ArrayErrores['opciones_estudios']=' No hay seleccionado ningún estudio';
				$correcto = FALSE;
			}		
			
			if(!$correcto){//error
				include 'form.php';	
			}
			else{
				include 'form.php';
				
				echo '<h4>Pregunta adicionales </h4>';
				if(isset($_POST['opciones_aficiones']) && in_array('deporte', $_POST['opciones_aficiones'])){					
					echo GetHTMLPregunta(array('texto_pregunta'=>'Tipo de deporte favorito: ',
							'tipo'=>'select',//type
							'campo'=>'tipodeporte',//name
							'respuestas'=>array(
									array('etiqueta'=>'', 'valor'=>'defecto'),
									array('etiqueta'=>'Ciclismo', 'valor'=>'ciclismo'),
									array('etiqueta'=>'Tenis', 'valor'=>'tenis'),
									array('etiqueta'=>'Fútbol', 'valor'=>'futbol'),
									array('etiqueta'=>'Baloncesto', 'valor'=>'baloncesto'),
									array('etiqueta'=>'Voleibol', 'valor'=>'voleibol')
							)
					));
				}
				//MuestraInformacion();
			}
		}

include_once 'pie.html';