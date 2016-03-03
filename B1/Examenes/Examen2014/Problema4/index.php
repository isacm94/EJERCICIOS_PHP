<?php include_once 'funciones.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="ctrl.php" method="POST">
            <h3>Texto: </h3>
            <textarea name="palabras" style="width:400px;height:100px" autofocus><?php echo ValorPost('palabras');?></textarea><br><br>

            <input type="submit" name="contar" value="Contar Palabras">
            <input type="submit" name="borrar" value="Borrar">
        </form>
    </body>
</html>
