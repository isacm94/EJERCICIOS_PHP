<!--Un numero aleatorio entre 1 10 y si es mayor o menor que 5. -->
<html>
<head>
<title>Problema</title>
</head>
<body>
<?php
$valor=rand(1,10);
echo "El valor sorteado es $valor<br>";
if ($valor<=5) {
  echo "Es menor o igual a 5";
}
else {
  echo "Es mayor a 5";
} 
?>
</body>
</html>
