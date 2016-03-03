<?php 
include 'cabecera.html';
include_once 'funciones.php';

$correcto = TRUE;
$ArrayErrores = array();

echo '<pre>';
echo print_r($_POST);
echo '</pre>';
 	
		if ( ! $_POST )
		{ // Si no han enviado el fomulario
			include 'form.php';
		}
		else{//form enviado			
			
			
			if(isset($_POST['lugares']) && $_POST["lugares"]=="defecto"){
				$correcto = false;
				$ArrayErrores['lugares'] = " Elige un lugar";
			}
			
			if (! isset($_POST['opciones_aficiones']))
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
				
				
				if(isset($_POST['enviarInfoAdi'])){//si le das al boton de enviar Info aficional
					$correcto = CompruebaEnviarInfoAdicional();
					
					if($correcto)//si no hay errores, muestra la informacion
						MuestraInformacionAdicional();
					else //sino el formulario
						include 'form.php';
				}
				
				else {											
					
					//echo '<form action="" method="POST">';
					
						tipodeporteInfoAdicional(); //Escribe si necesita o no la info adicional de deporte
							
						anhotituloInfoAdicional(); //Escribe si necesita o no la info adicional de año de titulo
						
						lugarfavoritoInfoAdicional(); //Escribe ssi necesita o no la info adicional de lugar favorito	
						
						if( SiTipodeporteInfoAdicional() || SiAnhotituloInfoAdicional() || SiLugarfavoritoInfoAdicional())
							echo '<input type="submit" name="enviarInfoAdi" value="Enviar Info Adicional">';
					
					echo '</form';				
				
				}
				
				if(isset($_POST['enviar']) && (!SiTipodeporteInfoAdicional()) && (!SiAnhotituloInfoAdicional()) && (!SiLugarfavoritoInfoAdicional())){
					MuestraInformacion();
				}
			}
		}