<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Insertar provincia</h1>
        
        <form method="post">
            Nombre <input type="text" name="nombre">
            
            <input type="submit" name="guardar" value="Guardar">
            <br><br>
            <?php echo anchor('', 'Volver a Menú');//Primer parámetro vacío xq es el index?> 
        </form>
    </body>
</html>


