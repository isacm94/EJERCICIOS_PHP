<?php

function MuestraInformacion(){
	
	echo '<br><h2>INFORMACIÓN</h2>';	

}

function MuestraInformacionAdicional(){

	echo '<h2>INFORMACIÓN ADICIONAL</h2>';

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
	
	else if($pregunta['tipo'] == 'text'){
		return CreaText($pregunta);
	}
	else 
		return 'ERROR en la función GetHTMLPregunta';
	
}
function CreaText($pregunta){
	
	$html = '';
			
	$html.=	'<label>';
	
		$html.= $pregunta['texto_pregunta'];
		
		$html.= '<input ';
			$html.= ' type='.$pregunta['tipo'];
			$html.= ' name='.$pregunta['campo'];
			$html.= ' value= "'.ValorPost($pregunta['respuestas'][0]['valor']).'"';
			$html.= ' size = 3 ';
			$html.= ' maxlength=4 ';
		$html.= '></input>';

	$html.= '</label>';
	
	
	
	return $html;
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
	
	$numRespuestas = count($pregunta['respuestas']);
			
	$html = $pregunta['texto_pregunta'];
	
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
	if (isset($_POST[$nombreCampoArray]) && in_array($valor, $_POST[$nombreCampoArray]) )
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

function tipodeporteInfoAdicional(){
	
	if(in_array('deporte', $_POST['opciones_aficiones'])){
		// SELECT
		echo '<p>';
		echo GetHTMLPregunta(array('texto_pregunta'=>'Tipo de deporte favorito: ',
				'tipo'=>'select',//type
				'campo'=>'tipodeporte',//name
				'respuestas'=>array(
						array('etiqueta'=>'', 'valor'=>'defecto'),
						array('etiqueta'=>'Ciclismo', 'valor'=>'ciclismo'),
						array('etiqueta'=>'Tenis', 'valor'=>'tenis'),
						array('etiqueta'=>'Fútbol', 'valor'=>'futbol'),
						array('etiqueta'=>'Baloncesto', 'valor'=>'baloncesto'),
						array('etiqueta'=>'Voleibol', 'valor'=>'voleibol')
				)
		));
			
		if (isset($ArrayErrores['tipodeporte']))
			echo "<span style='color:red;'>".$ArrayErrores['tipodeporte']."</span>";
	
		echo '</p>';
	
	}
}
function SiTipodeporteInfoAdicional(){

	if(in_array('deporte', $_POST['opciones_aficiones'])){
		
		return TRUE;
	}

	else
		return FALSE;
}

function anhotituloInfoAdicional (){
	
	if(in_array('eso', $_POST['opciones_estudios'])){
		//TEXT
		echo '<p>';
		echo GetHTMLPregunta(array('texto_pregunta'=>'Año en el que obtuvistes el título: ',
				'tipo'=>'text',//type
				'campo'=>'anhotitulo',//name
				'respuestas'=>array(
						array('etiqueta'=>'', 'valor'=>'anhotitulo'),
				)
		));
			
		if (isset($ArrayErrores['tipodeporte']))
			echo "<span style='color:red;'>".$ArrayErrores['tipodeporte']."</span>";
	
		echo '</p>';
	}	
}

function SiAnhotituloInfoAdicional(){

	if(in_array('eso', $_POST['opciones_estudios'])){		
		return TRUE;
	}
	else
		return FALSE;
}

function lugarfavoritoInfoAdicional(){
	
	if($_POST['lugares'] == 'mediterraneo'){
			
		//CHECKBOX
		echo '<p>';
		echo GetHTMLPregunta(array('texto_pregunta'=>'Seleccione lugar favorito: ',
				'tipo'=>'checkbox',//type
				'campo'=>'lugarfavorito',//name
				'respuestas'=>array(
						array('etiqueta'=>'Cataluña', 'valor'=>'catalunha'),
						array('etiqueta'=>'Valencia', 'valor'=>'valencia'),
						array('etiqueta'=>'Andalucía', 'valor'=>'andalucia'),
						array('etiqueta'=>'Tunez', 'valor'=>'tunez'),
						array('etiqueta'=>'Turquía', 'valor'=>'turquia'),
						array('etiqueta'=>'Italia', 'valor'=>'italia'),
						array('etiqueta'=>'Francia', 'valor'=>'francia')
				)
		));
	
		if (isset($ArrayErrores['lugarfavorito']))
			echo "<span style='color:red;'>".$ArrayErrores['lugarfavorito']."</span><br><br>";
	
		echo '</p>';
	}
	
}
function SiLugarfavoritoInfoAdicional(){

	if($_POST['lugares'] == 'mediterraneo'){			
		
		return TRUE;
	}
	else
		return FALSE;

}
function CompruebaEnviar(){
		
	if((isset($_POST['opciones_aficiones']) && in_array('deporte', $_POST['opciones_aficiones']) )
			|| (isset($_POST['opciones_estudios']) && in_array('eso', $_POST['opciones_estudios']) )
				|| (isset($_POST['lugares']) && $_POST['lugares']=='mediterraneo'))
		return 'hidden';
	else
		return 'submit';
	
}

function CompruebaEnviarInfoAdicional(){
	$correcto = TRUE;
	if (isset($_POST['tipodeporte']) && $_POST['tipodeporte']=='defecto' && SiTipodeporteInfoAdicional() )
	{
		$ArrayErrores['tipodeporte']=' No hay seleccionado ningún tipo de deporte favorito';
		$correcto = FALSE;
	}
		
	if (! isset($_POST['anhotitulo']) &&  SiAnhotituloInfoAdicional() )
	{
		$ArrayErrores['anhotitulo']=' Inntroduce el año del título';
		$correcto = FALSE;
	}
		
	if (! isset($_POST['lugarfavorito']) && SiLugarfavoritoInfoAdicional() )
	{
		$ArrayErrores['lugarfavorito']=' No ha introducido nigún lugar favorito';
		$correcto = FALSE;
	}
	
	return $correcto;
}