<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Modificar Ciudad <?= $_GET['nom']?></h1>
        <form action="ctrl.php" METHOD="POST">
            Nuevo nombre: <input type="text" name="nuevonombre" value="<?= $_GET['nom']?>"> 
            
            <input type="hidden" name="id" value="<?= $_GET['id']?>"> 
            <input type="submit" name="guardar" value="Guardar"> 
            <input type="submit" name="cancelar" value="Cancelar"> 
        </form>
    </body>
</html>



