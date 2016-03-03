<?php
include_once 'funciones.php';
if(! $_POST)//si no se ha enviado el formulario, se envia
	include 'form.php';

else {//form enviado
	
	if($_POST['comunidades']){
		include 'form.php';
		MuestraProvincia($_POST['comunidades']);
	}
	else
		echo 'ERROR!';
	
	
}