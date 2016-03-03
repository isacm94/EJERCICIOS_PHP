<?php
include_once 'funciones.php';

$ArrayErrores = Array();
$correcto = true;

if(! $_POST)//si no se ha enviado el formulario, se envia
	include 'form.php';

else {//form enviado

	/*
	echo '<pre>';
		print_r($_POST);
	echo '</pre>';
	*/
	//Errores	
	if(empty($_POST['provincia']) && isset($_POST['anhadir'])){//boton añadir pulsado y provincia vacia, ERROR		
		$ArrayErrores['provinciavacia'] = 'No se ha introducido ninguna provincia';
		$correcto = FALSE;
	}
	
	if(ContieneAlgunDigito($_POST['provincia'])){ //la provincia contiene algún digito, ERROR
		$ArrayErrores['provinciacondigitos'] = 'Formato incorrecto de provincia, inténtelo de nuevo';
		$correcto = FALSE;
	}
	
	if(ExisteProvincia($_POST['provincia'])){ //la provincia ya existe, ERROR
		$ArrayErrores['existeprovincia'] = 'La provincia ya existe, inténtelo de nuevo';
		$correcto = FALSE;		
	}
	
	//Evalua errores
	if(!$correcto)//Hay errores
		include 'form.php';
	else{
		if(isset($_POST['anhadir']) && $_POST['provincia']){ //BOTÓN AÑADIR
			include 'form.php';
			AñadeProvincia($_POST['provincia']);
		}
		
		if(isset($_POST['verprovincias'])){//BOTÓN VER PROVINCIAS
			VerTodasLasProvincias();
		}
		
	} 
		
	

}