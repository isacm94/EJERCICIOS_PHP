<?php
include_once 'funciones.php';

$ArrayErrores = Array();
$correcto = true;

if(! $_POST)//si no se ha enviado el formulario, se envia
	include 'form1.php';

else {//form enviado
	if(isset($_POST['borrar'])){//BOTÓN BORRAR
		include 'form2.php';			
	}
	
	if(isset($_POST['verprovincias'])){//BOTÓN VER PROVINCIAS
		VerTodasLasProvincias();
	}	
	
	if(isset($_POST['siborrar'])){ //borramos y vamos al formulario 3		
		BorrarProvincia($_POST['campooculto']);
		include 'form3.php';
	}
	
	else if(isset($_POST['noborrar'])){//volvemos formulario 1
		include 'form1.php';
	}
	
	if(isset($_POST['borrarotra'])){//volvemos formulario 1
		include 'form1.php';
	}
}