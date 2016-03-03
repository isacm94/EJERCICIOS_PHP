<?php 

if(isset($_COOKIE['cont']))
{
	include_once 'hora.php';
}
else
{
	if (! $_POST)
		include_once 'primeravez.php';
	else 
	{			
			
		if (isset($_POST['Continuar']))		
			include_once 'hora.php';				

		if (isset($_POST['nocontinuar']))
			setcookie("cont",'cont');
		
	}
}