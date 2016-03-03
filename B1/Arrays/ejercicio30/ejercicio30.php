
<html>
	<head> 
		<title>Ejercicio 30</title> 		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="estilos.css">
	</head>
	
	<body>
		<?php 
		
			//CLASE
			Class Coche{

					private $matricula;
					private $color; 
					private $modelo; 
					private $marca;		

					public function Inicializar($m, $c, $mo, $ma){ //CONSTRUCTOR
					
					
						$this->matricula = $m;
						$this->color = $c;
						$this->modelo = $mo;
						$this->marca = $ma;
					
					 }
					 
					 public function MuestraUnCoche($cont){
						
						echo '<p id="titulo"> Coche '.$cont.': </p>';
						echo '<li>Matricula: '.$this->matricula. '</li>';
						echo '<li>Color: '.$this->color. '</li>';
						echo '<li>Modelo: '.$this->modelo. '</li>';
						echo '<li>Marca: '.$this->marca. '</li>';
						echo '<br>';
					 
					 }
					 
					} //crea clase
					
			//MAIN
			$lista_coches = array(); //crea array		
					
			$c1 = new Coche();
			$c2 = new Coche();
			$c3 = new Coche();
			$c4 = new Coche();
			$c5 = new Coche();

			$c1 -> Inicializar('1111', 'azul', 'leon', 'seat');
				$lista_coches [] = $c1;//insertamos el objeto c1 al final de la lista

			$c2 -> Inicializar('2222', 'verde', 'punto', 'fiat');
				$lista_coches [] = $c2;//insertamos el objeto c1 al final de la lista

			$c3 -> Inicializar('3333', 'blanco', 'doblo', 'fiat');
				$lista_coches [] = $c3;//insertamos el objeto c1 al final de la lista

			$c4 -> Inicializar('4444', 'rojo', 'focus', 'ford');
				$lista_coches [] = $c4;//insertamos el objeto c1 al final de la lista

			$c5 -> Inicializar('5555', 'negro', 'astra', 'opel');
				$lista_coches [] = $c5;//insertamos el objeto c1 al final de la lista


			//FUNCIONES
			function MuestraCoches($lista){

				echo "<div>Mostrando lista de coches... ";
				for($i = 0; $i < count($lista); $i++){
					
					$lista[$i]->MuestraUnCoche($i);
				
				}
				echo "</div>";
			}

			//llamada a MuestraCoches
			MuestraCoches($lista_coches);

			echo "<div>A&ntilde;adiendo dos coches m&aacute;s a la lista... </div><br>";

			$c6 = new Coche();
			$c7 = new Coche();
								
			$c6 -> Inicializar('6666', 'celeste', 'rio', 'kia');
				$lista_coches [] = $c6;//insertamos el objeto c6 al final de la lista

			$c7 -> Inicializar('7777', 'gris', 'auris', 'toyota');
				$lista_coches [] = $c7;//insertamos el objeto c7 al final de la lista

			//llamada a MuestraCoches
			MuestraCoches($lista_coches);

			?>

	</body>
</html>


