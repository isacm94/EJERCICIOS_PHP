<?php include_once "help.php";?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Añadir</h1>
        <form action="ctrl_anhadir.php" method="post">
            Fecha <input type="text" name="fecha" placeholder="aaaa-mm-dd" value="<?php echo ValorPost('fecha');?>">
            <?php if(isset($errores['fecha'])) {
                echo "<span style='color: red;'>".$errores['fecha']."</span>";
            } ?>
            <br>
            Anotación <input type="text" name="anotacion" value="<?php echo ValorPost('anotacion')?>">
                <?php if(isset($errores['anotacion'])) {
                echo "<span style='color: red;'>".$errores['anotacion']."</span>";
            } ?><br>
            
            <?php if(isset($correcto) && $correcto) {
                echo "***Se ha guardado la anotacion enviada***";
            } ?>
            <input type="submit" name="guardar" value="Guardar">
        </form>
        <a href="index.php">Volver al menú</a>
    </body>
</html>
