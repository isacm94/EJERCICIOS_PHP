<?php
function DiaSemana($day){

	$day = strtolower($day);// a minusculas	

	switch ($day){

		case "sunday":{
			return  "domingo";
			break;}

		case "monday":{
			return  "lunes";
			break;}

		case "tuesday":{
			return  "martes";
			break;}
				
		case "wednesday":{
			return  "miercoles";
			break;}
				
		case "thursday":{
			return "jueves";
			break;}

		case "friday":{
			return  "viernes";
			break;}

		case "saturday":{
			return  "sabado";
			break;}

		default:{
			return "ERROR";
			break;}

	}
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