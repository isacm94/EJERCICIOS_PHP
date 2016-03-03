<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Pantalla 2.3</h1>
        <form action="ctrl.php" METHOD="POST">
            Exámen: 
            <?php echo CreaCheckBox('examen', Array('Practico'=>'Práctico', 'Teorico' => 'Teórico')) ?>
            <?php
            if (isset($errores['examen'])):
                ?>
                <span style="color: red;"><?= $errores['examen'] ?></span>
            <?php endif; ?>
            <br><br>
            
            <input type="hidden" name="hapasadoporpantalla23">
            <input type="submit" name="anterior_pant23" value="Anterior">
            <input type="submit" name="siguiente_pant23" value="Siguiente">

        </form>
    </body>
</html>

