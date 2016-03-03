<?php 

function MuestraTabla($nombre, $ape, $sexo, $curso, $fecha, $observaciones){

	echo "<div><table>";
	echo "<tr>";
	echo  "<th>Nombre</th>";
	echo  "<th>Apellidos</th>";
	echo  "<th>Sexo</th>";
	echo  "<th>Curso</th>";
	echo  "<th>Fecha de nacimiento</th>";
	echo  "<th>Edad</th>";
	echo  "<th>Observaciones</th>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>".$nombre."</td>";
	echo "<td>".$ape."</td>";
	echo "<td>".$sexo."</td>";
	echo "<td>".$curso."</td>";
	echo "<td>".$fecha."</td>";
	echo "<td>".Edad($fecha)."</td>";
	echo "<td>".Observaciones($observaciones)."</td>";
	echo "</tr>";

		
	echo "</table></div>";

}
//ejercicio 37
function Observaciones($observaciones){
	
	//str_replace ( $valor_a_buscar , $valor_de_reemplazo , $string)
	//return str_replace('/n', '<br>', $observaciones);
	return nl2br($observaciones);
}
function ValorPost($nombreCampo, $valorPorDefecto='')
{
	if (isset($_POST[$nombreCampo]))
		return $_POST[$nombreCampo];
	else
		return $valorPorDefecto;
}
//radioButton
function CheckIfValue($nombreCampo, $valor)
{
	if (isset($_POST[$nombreCampo]) && $_POST[$nombreCampo]==$valor )
	{
		 return ' checked ';
	}
	else
	{
		return '';
	}
}

//Checkbox
function CheckIfValueInArray($nombreCampoArray, $valor)
{
			//Si existe el campo
	if (isset($_POST[$nombreCampoArray]) && in_array($_POST[$nombreCampoArray], $valor) )
	{
		return ' checked ';
	}
	else
	{
		return '';
	}
}

//Select
function CheckIfSelected($nombreCampo, $valor){
		//Si existe el campo
	if (isset($_POST[$nombreCampo]) && $_POST[$nombreCampo]==$valor)
	{
		return ' selected ';
	}
	else
	{
		return '';
	}
	
	
} 
function FechaCorrecta($fecha){
	
    define('DIA', 0);
    define('MES', 1);
    define('YEAR', 2);
    
	$array_fecha = explode("/", $fecha);

	if (count($array_fecha)!= 3)
		return FALSE; 
		
	$dia = $array_fecha[DIA];
	$mes = $array_fecha[MES];
	$year = $array_fecha[YEAR];
	
	   //fecha actual				//fecha sin ceros iniciales(no funciona)
	if( date("d/m/Y") < $fecha || date("j/n/Y") < $fecha)
		return FALSE;
	
	if(checkdate($mes, $dia, $year)){//fecha correcta
	 	return true;
	 }
	else{ //Fecha incorrecta
	 	return false;
	 }
	 
}

//Compra si un campo determinado esta vacio
function CampoVacio($campo){	
	
	if(empty($_POST[$campo])){
		return true; //campo vacio
	}
	else //no esta campo vacio
		return false;
}

//Comprueba si existe algun campo vacio
function CompruebaCamposVacios(){

	if(empty($_POST["nombre"]) || empty($_POST["ape"]) || empty($_POST["sexo"])
			|| empty($_POST["cursos"])||  empty($_POST["fecha"])){
		return true; //Existen campos vacios
	}
	else //NO existen campos vacios
		return false;
}

function Edad($fechaNac){
	
	//fecha actual
	$dia = date('d');
	$mes = date('m');
	$year = date('Y');
	
	//fecha de nacimiento
	$array_fecha = explode("/", $fechaNac);
	
	$diaNac = $array_fecha[0];
	$mesNac = $array_fecha[1];
	$yearNac = $array_fecha[2];
	
	//si el mes es el mismo pero el dia inferior aun no ha cumplido a�os, le quitaremos un a�o al actual	
	if (($mesNac == $mes) && ($diaNac > $dia)) 
		$year--; 
	
	//si el mes es superior al actual tampoco habr� cumplido a�os, por eso le quitamos un a�o al actual	
	if ($mesNac > $mes) 
		$year--;

	//ya no habr�a mas condiciones, ahora simplemente restamos los a�os y mostramos el resultado como su edad	
	$edad=($year-$yearNac);
	
	return $edad;
	
}