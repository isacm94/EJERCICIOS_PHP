<?php
if(isset($_POST['aumentar'])){	                                                                      
	$_POST['num']+=1;
}
	
function ValorPost($nombreCampo, $valorPorDefecto='1')
{
	if (isset($_POST[$nombreCampo]))
		return $_POST[$nombreCampo];
	else
		return $valorPorDefecto;
}