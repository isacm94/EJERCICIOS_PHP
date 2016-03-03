<?php
session_start(); 
include_once 'funciones.php';

if(isset($_SESSION['usuario'])){//Se ha iniciado sesión

	include_once 'view.php';
}
else{ //NO se ha iniciado sesión
	include_once 'view_usuario.php';//Pide usuario y clave

	if($_POST){ //Si se ha enviado algo
		echo 'POST';
		print_r($_POST);
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['clave'] = $_POST['clave'];

		header("Location: ctrl.php");
	}
}