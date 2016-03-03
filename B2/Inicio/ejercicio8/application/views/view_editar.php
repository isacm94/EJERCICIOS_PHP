<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Editar provincia</h1>
        
        <form method="post">            
            Código de la provincia a editar: <input type="text" name="codigo">
            <br><br>
            Nuevo Nombre <input type="text" name="nuevonombre">
            
            <input type="submit" name="guardar" value="Guardar">
            <br><br>
            <?php echo anchor('', 'Volver a Menú');//Primer parámetro vacío xq es el index?> 
        </form>
    </body>
</html>


