<html>
<head>
<title>Ejercicio 38</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

	<form method="POST">
			<div>
				<br><br><br>
				<p>Número: 
					
					<input type="text" name="num" value="<?= ValorPost('num');?>" size="1">			 					
					<input type="submit" name="aumentar" value="+1">
				</p>
			 </div>
	</form>


</body>
</html>