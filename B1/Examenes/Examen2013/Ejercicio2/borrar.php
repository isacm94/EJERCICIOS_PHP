<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Borrar</h1>
        <form action="ctrl.php" METHOD="POST">
            ¿Desea borrar la ciudad <?= $_GET['nom']?>?
            
            <input type="hidden" name="id" value="<?= $_GET['id']?>"> 
            <input type="submit" name="siborrar" value="Sí"> 
            <input type="submit" name="noborrar" value="No"> 
        </form>
    </body>
</html>


