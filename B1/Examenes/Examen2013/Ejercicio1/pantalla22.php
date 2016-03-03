<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Pantalla 2.2</h1>
        <form action="ctrl.php" METHOD="POST">
            Nombre: <input type="text" name="nombre">
            <?php
            if (isset($errores['nombre'])):
                ?>
                <span style="color: red;"><?= $errores['nombre'] ?></span>
            <?php endif; ?>
            <br><br>


            Sexo:
            <?php echo CreaRadio('sexo', array('Masculino' => 'Masculino', 'Femenino' => 'Femenino')); ?>
            <?php
            if (isset($errores['sexo'])):
                ?>
                <span style="color: red;"><?= $errores['sexo'] ?></span>
            <?php endif; ?>
            <br><br>

            <?php echo CreaSelect('provincia', $Provincias) ?>

            <?php
            if (isset($errores['provincia'])):
                ?>
                <span style="color: red;"><?= $errores['provincia'] ?></span>
            <?php endif; ?>

            <br><br>

            

            <input type="submit" name="anterior_pant22" value="Anterior">
            <input type="submit" name="siguiente_pant22" value="Siguiente">

        </form>
    </body>
</html>
