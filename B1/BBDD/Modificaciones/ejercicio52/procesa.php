<?php
include_once 'funciones.php';

$ArrayErrores = Array();
$correcto = true;

if(! $_POST)//si no se ha enviado el formulario, se envia
	include 'form.php';

else {//form enviado

	
	//Errores
	if(empty($_POST['nuevonombre']) && isset($_POST['cambiar'])){//boton cambiar pulsado y nuevo nombre vacia, ERROR
		$ArrayErrores['nuevonombrevacio'] = 'No se ha introducido ningún nuevo nombre';
		$correcto = FALSE;
	}
	
	if(ContieneAlgunDigito($_POST['nuevonombre'])){ //la provincia contiene algún digito, ERROR
		$ArrayErrores['nuevonombrecondigitos'] = 'Formato incorrecto, inténtelo de nuevo';
		$correcto = FALSE;
	}
	
	
	//Evalua errores
	if(!$correcto)//Hay errores
		include 'form.php';
		
	else{
		
		if(isset($_POST['cambiar'])){//BOTÓN CAMBIAR
			CambiarNuevoNombre($_POST['provincias'], $_POST['nuevonombre']);
		}
		
		if(isset($_POST['verprovincias'])){//BOTÓN VER PROVINCIAS
			VerTodasLasProvincias();
		}	
	} 
		
	

}