<?php 
include 'cabecera.html';
include_once 'funciones.php';


$correcto = true;
$ArrayErrores = array();
 	
		if ( ! $_POST )
		{ // Si no han enviado el fomulario
			include 'form.php';
		}
		else{//form enviado
			
			if(empty($_POST['nombre'])){
				$correcto = false;
				$ArrayErrores['NombreVacio'] = "Inserte un nombre";				
			}
			if(empty($_POST['ape'])){
				$correcto = false;
				$ArrayErrores['ApeVacio'] = "Inserte los apellidos";
			}
			if($_POST["cursos"]=="defecto"){
				$correcto = false;
				$ArrayErrores['cursos'] = "Elige un curso";
			}
			
			if(empty($_POST['fecha']) || $_POST["fecha"]=='dd/mm/yyyy' || $_POST["fecha"]=='dd/mm/aaaa' || !FechaCorrecta($_POST["fecha"])){
				$correcto = false;
				$ArrayErrores['fecha'] = "Fecha incorrecta";
			}			
			
			
			if(!$correcto){//error		
				include 'form.php';}
			else{			
				MuestraTabla($_POST["nombre"], $_POST["ape"], $_POST["sexo"],$_POST["cursos"],$_POST["fecha"], $_POST["observaciones"]);			
			}		
			
			///print_r($ArrayErrores);
		}
		
	
include 'pie.html';