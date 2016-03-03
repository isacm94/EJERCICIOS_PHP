<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Tabla de multiplicar</h1>

        <?php if (! isset($html)) : //$html --> html generado de crear la tabla de multiplicar
            ?>
            <form method="get"> 
                <input type="text" name="num">
                <input type="submit" name="enviar" value="Enviar">
            </form>


            <?php
        endif;
        if (isset($html)): //Muestra tabla de multiplicar
            echo $html;
        ?>
        
        <br><a href="http://localhost/EJERCICIOS_PHP/B2/ejercicio6/index.php">Volver</a>
        
        <?php endif;?>
    </body>
</html>
