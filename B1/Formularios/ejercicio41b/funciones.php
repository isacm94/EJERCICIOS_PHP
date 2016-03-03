<?php
function MuestraInformacion(){
	
	echo '<h2>INFORMACIÓN</h2>';
	
	//SEXO
	echo '<p>Sexo: ';
		if($_POST['sexo'] == 'H')
			echo 'Hombre';
		else if($_POST['sexo'] == 'M')
			echo 'Mujer';
		else 
			echo 'Error inesperado';
	echo '</p>';	
				
	//AFICIONES	
	echo '<p>Aficiones: ';
		$tamanho = count($_POST['opciones_aficiones']);
		$cont = 0;
		
		foreach ($_POST['opciones_aficiones'] as $valor){
		
			if($valor == 'deporte')
				echo 'Deporte';
			else if($valor == 'cine')
				echo 'Cine';
			else if($valor == 'teatro')
				echo 'Teatro';
			else 
				echo 'Error inesperado';
			
			$cont++;
			
			if($cont < $tamanho)//Para que no escribe la ultima coma
				echo ', ';
					
		}
	echo '</p>';
	
	//ESTUDIOS
	echo '<p>Estudios: ';
		$tamanho = count($_POST['opciones_estudios']);
		$cont = 0;
		foreach ($_POST['opciones_estudios'] as $valor){
		
			if($valor == 'eso')
				echo 'ESO';
			else if($valor == 'medio')
				echo 'C.F.G.Medio';
			else if($valor == 'superior')
				echo 'C.F.G. Superior';
			else if($valor == 'grado')
				echo 'Grado';
			else
				echo 'Error inesperado';
			
			$cont++;
			
			if($cont < $tamanho)//Para que no escribe la ultima coma
				echo ', ';
		}
	echo '</p>';
	
	//LUGARES
	echo '<p>Lugar al que le gustaría ir de vacaciones: ';
	
		if($_POST['lugares']=='mediterraneo')
			echo 'Mediterráneo';
		else if($_POST['lugares']=='caribe')
			echo 'Caribe';
		else if($_POST['lugares']=='eeuu')
			echo 'EEUU';
		else if($_POST['lugares']=='centroeuropa')
			echo 'Centro europa';
		else
			echo 'Error inesperado';
	echo'</p>';
}
function  GetHTMLPregunta($pregunta) /* array */{	
	
	if($pregunta['tipo'] == 'radio'){			
		return CreaRadio($pregunta);
	}
	else if($pregunta['tipo'] == 'checkbox'){			
		return CreaCheckBox($pregunta);
	}
	
	else if($pregunta['tipo'] == 'select'){
		return CreaSelect($pregunta);
	}
	
	else 
		return 'ERROR';
	
}
function CreaRadio($pregunta){
	
	$html = '';
	
	$numRespuestas = count($pregunta['respuestas']);
		
	$html.= $pregunta['texto_pregunta'];
	
	for($i = 0;$i < $numRespuestas; $i++){
		
	    $html.=	'<label>';
			
			$html.= '<input ';
				$html.= ' type='.$pregunta['tipo'];
				$html.= ' name='.$pregunta['campo'];
				$html.= ' value= "'.$pregunta['respuestas'][$i]['valor'].'" ';
				$html.= CheckIfValue($pregunta['campo'], $pregunta['respuestas'][$i]['valor']);
				$html.= $i==0 ? ' checked ' : ''; //el primer radio chequeado
			$html.= '></input>';
		
			$html.= $pregunta['respuestas'][$i]['etiqueta'];
		
		$html.= '</label>';
	}
	
	
	return $html;
}


function CreaCheckBox($pregunta){
	$html = '';
	
		$numRespuestas = count($pregunta['respuestas']);
				
		$html.= $pregunta['texto_pregunta'];
		
		for($i = 0;$i < $numRespuestas; $i++){
			
			$html.=	'<label>';
				
				$html.= ' <input ';
					$html.= ' type="'.$pregunta['tipo'].'"';
					$html.= ' name="'.$pregunta['campo'].'[]"';
					$html.= ' value= "'.$pregunta['respuestas'][$i]['valor'].'" ';
					$html.= CheckIfValueInArray($pregunta['campo'], $pregunta['respuestas'][$i]['valor']);
				$html .= '></input>';
			 
				$html.= $pregunta['respuestas'][$i]['etiqueta'];
			
			$html.= '</label>';
		}
		
	return $html;
}

function CreaSelect($pregunta){
	$html = '';
	
	$numRespuestas = count($pregunta['respuestas']);
	
	$html.=	'<label>';
		
		$html.= $pregunta['texto_pregunta'];
		
			$html.= '<select name="'.$pregunta['campo'].'">';
			
				for($i = 0;$i < $numRespuestas; $i++){			    
						
					$html.= '<option  ';
						$html.= ' value= "'.$pregunta['respuestas'][$i]['valor'].'"';
						$html.= CheckIfSelected($pregunta['campo'], $pregunta['respuestas'][$i]['valor']);	
						$html.=' >';	
						$html.= $pregunta['respuestas'][$i]['etiqueta'];
					$html.= '</option>';		
				
				}
			
			$html.= '</select>';			
		
	$html.= '</label>';
	
	return $html;
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
	if (isset($_POST[$nombreCampoArray]) && in_array($valor, $_POST[$nombreCampoArray]))
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
