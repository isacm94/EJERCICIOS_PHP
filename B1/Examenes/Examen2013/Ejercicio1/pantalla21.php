<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Pantalla 2.1</h1>
        <form action="ctrl.php" METHOD="POST">
            Fecha de nacimiento: <input type="text" name="fecha" placeholder="dd-mm-aaaa" value="">
            <?php
            if (isset($errores['fecha'])):
                ?>
                <span style="color: red;"><?= $errores['fecha'] ?></span>
            <?php endif; ?>
            <br>
            <input type="submit" name="siguiente_pant21" value="Siguiente">

        </form>
    </body>
</html>


