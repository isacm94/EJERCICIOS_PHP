<?php
include_once 'procesa.php';
?>
<html>
<head>
<title>Ejercicio 39</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

	<form action="" method="POST">
			<div>
				<br><br><br>
				<p>Número: 
					<?= ValorPost('num')?>
					<input type="hidden" name="num" value="<?= ValorPost('num')?>">			 					
					<input type="submit" name="aumentar" value="+1">
				</p>
			 </div>
	</form>


</body>
</html>

