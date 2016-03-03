<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Modificar provincia con código <?= $cod_provincia?></h1>
        <form METHOD ="POST">
            <input type="text" name="nombre" value="<?php echo set_value('nombre'); ?>">
            <input type="submit" name="guardar" value="Guardar">
            <input type="hidden" name="provincia" value="<?= $cod_provincia?>">
        </form>
        <?php echo validation_errors(); ?>
        
    </body>
</html>


