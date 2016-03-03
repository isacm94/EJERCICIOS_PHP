<?php

$lista_DiasMes = array();
$lista_NombreMes = array();


for($i = 1; $i <= 12; $i++){	
	$lista_DiasMes[$i] = DiasMes($i);//guarda los dias q tiene cada mes
	$lista_NombreMes[$i] = NombreMes($i);//guarda el nombre de cada mes
}

for($i = 1; $i <= 12; $i++){
	echo "<p>".$lista_NombreMes[$i].": ".$lista_DiasMes[$i]."</p>";
}





//FUNCIONES
function DiasMes($num_mes){

	//Enero, Marzo, Mayo, Julio, Agosto, Octubre y Diciembre
	if($num_mes == 1 || $num_mes == 3 || $num_mes == 5 || $num_mes == 7 || $num_mes == 8
			|| $num_mes == 10 || $num_mes == 12)

		return 31; //Tiene 31 días

	//Abril, Junio, Septiembre, Novimiembre
	else if ($num_mes == 4  || $num_mes == 6 || $num_mes == 9 || $num_mes == 11)
		return 30; //Tiene 30 días

	else if($num_mes == 2)
		return 28;//Tiene 28 dias

	else
		return -1;//mes incorrecto
}

function NombreMes($num_mes){

	switch ($num_mes){

		case 1:{
			return  "enero";
			break;}

		case 2:{
			return  "febrero";
			break;}

		case 3:{
			return  "marzo";
			break;}
				
		case 4:{
			return  "abril";
			break;}
				
		case 5:{
			return  "mayo";
			break;}

		case 6:{
			return  "junio";
			break;}

		case 7:{
			return  "julio";
			break;}

		case 8:{
			return  "agosto";
			break;}

		case 9:{
			return  "septiembre";
			break;}

		case 10:{
			return  "octubre";
			break;}

		case 11:{
			return  "noviembre";
			break;}

		case 12:{
			return  "diciembre";
			break;}

		default:{
			return "ERROR";
			break;}

	}
}