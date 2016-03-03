<?php 
include 'cabecera.html';
include_once 'funciones.php';


$correcto = false;
$ArrayErrores = array();
 	
		if ( ! $_POST )
		{ // Si no han enviado el fomulario
			include 'form.php';
		}
		else{//form enviado
			
			if(empty($_POST['op1']) || ! is_numeric($_POST['op1'])){
				$correcto = false;
				$ArrayErrores['op1'] = "Inserte un número";				
			}
			if(empty($_POST['op2']) || ! is_numeric($_POST['op2'])){
				$correcto = false;
				$ArrayErrores['op2'] = "Inserte un número";
			}
			else //NO HAY ERRORES
				$correcto = true;			
			
			
			if(!$correcto){//error		
				include 'form.php';}
			else{						
				MuestraOperacion();	
				MuestraResultado();
				include 'form.php';
			}		
			
		}
		
	
include 'pie.html';