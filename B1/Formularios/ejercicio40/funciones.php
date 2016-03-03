<?php 

//muestra operacion elegida
function MuestraOperacion(){
	
	if(isset($_POST['suma'])){
		$_POST['operacion'] = 'Suma';
	}
	
	if(isset($_POST['resta'])){
		$_POST['operacion'] = 'Resta';
	}
	
	if(isset($_POST['multi'])){
		$_POST['operacion'] = 'Multiplicación';
	}
	
	if(isset($_POST['div'])){
		$_POST['operacion'] = 'División';
	}
}
//Calcula resultado
function Resultado(){
	
	if(isset($_POST['suma'])){
		return $_POST['op1'] + $_POST['op2'];
	}

	if(isset($_POST['resta'])){
		return $_POST['op1'] - $_POST['op2'];
	}

	if(isset($_POST['multi'])){
		return $_POST['op1'] * $_POST['op2'];
	}

	if(isset($_POST['div'])){
		return $_POST['op1'] / $_POST['op2'];
	}
}

function MuestraResultado(){
	
	$_POST['result'] = Resultado();
	
}
function ValorPost($nombreCampo, $valorPorDefecto='')
{
	if (isset($_POST[$nombreCampo]))
		return $_POST[$nombreCampo];
	else
		return $valorPorDefecto;
}