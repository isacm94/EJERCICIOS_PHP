<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php echo anchor('', 'Volver a Menú');//Primer parámetro vacío xq es el index?> 
        <h1>Provincias</h1>
        
        <table border="1" style="border-collapse: collapse;">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
            </tr>
            
            <?php foreach ($provincias as $prov):?>
            <tr>
                <td><?=$prov->cod?></td>
                <td><?=$prov->nombre?></td>
            </tr>
            <?php endforeach;?>
            
            
        </table>
    </body>
</html>
