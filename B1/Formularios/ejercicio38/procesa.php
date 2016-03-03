<?php
if ( ! $_POST )
{ // Si no han enviado el fomulario
	include 'form.php';
}
else{
	
	if(isset($_POST['aumentar'])){
		$_POST['num'] += 1;
		include 'form.php';
	}
	
}

function ValorPost($nombreCampo, $valorPorDefecto='')
{
	if (isset($_POST[$nombreCampo]))
		return $_POST[$nombreCampo];
	else
		return $valorPorDefecto;
}