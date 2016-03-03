<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h1>Página de seguimiento</h1>
        
        <p>Nº de visitas realizadas: <?php echo $_COOKIE["cont"];?></p>

        <p>Última visita realizada: <?= $_COOKIE['fecha']?> a las <?= $_COOKIE['hora']?></p>



    </body>
</html>