<!-- Escribir un programa que imprima los tres nombres guardados en una tabla -->

<html>
<head>
<title>Problema</title>

</head>
<body>

<?php
  $nombres[]="juan"; // es declaración de variable tabla
				// insertar un elemento al final de la tabla
  $nombres[]="pedro"; // insertar un elemento al final de la tabla
  $nombres[]="ana";
  for($f=0;$f<count($nombres);$f++)  // count⇒ Numero de elemento de la tabla
  {
    echo $nombres[$f];
    echo "<br>";
  }
?>

</body>
</html>