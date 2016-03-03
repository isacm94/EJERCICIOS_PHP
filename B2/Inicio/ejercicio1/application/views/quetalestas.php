<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>¿Que tal estas?</h1>
        <?php
        echo anchor('menu', 'Menú');
        ?>    
        <form method="get"> 
            <input type="text" name="num">
            <input type="submit" name="enviar" value="Enviar">
        </form>

        <?php
            //CuentaNumeros($_POST['nCuentaNumerosum']);
        ?>
    </body>
</html>
