<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Provincias</h1>
        <form METHOD ="POST">
            <?php
            
            //Construimos array de provincias, siendo el indice el código de provincia
            foreach ($provincia as $key => $value) {
                $opciones_provincias[$value['cod']] = $value['nombre'];
            }
            
            //Muestra select
            echo form_dropdown('provincia', $opciones_provincias, 01);
            ?>
            <input type="submit" name="modificar" value="Modificar nombre">
        </form>
    </body>
</html>


