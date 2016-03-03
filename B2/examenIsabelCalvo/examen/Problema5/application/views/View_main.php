
<html>
    <head>
        <title>Países</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            table {
                width: 250px;
                border: 1px solid #000;
                border-collapse: collapse;
                width: 60%;
            }
            th, td {
                border: 1px solid #000;

            }
            span {
                margin: 5px;
                
            }
        </style>
    </head>
    <body>
    <center>
        <a href="<?=site_url()?>"><h2>LISTADO DE USUARIOS</h2></a>
        <h4>Número usuarios: <?=$num?></h4>
        <h4><?=$texto?></h4>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido1</th>
                <th>Apellido2</th>
                <th>Provincia</th>
            </tr>
            <?php foreach ($usuarios as $key => $value): ?>
                <tr>
                    <td><?= $value['nombre'] ?></td>
                    <td><?= $value['apellido1'] ?></td>
                    <td><?= $value['apellido1'] ?></td>
                    <td><a href="<?=site_url().'/Ctrl_index/MuestraProvincia/'.$value['cod']?>"><?= $value['provincia'] ?></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?=$this->pagination->create_links(); ?>
    </center>
</body>
</html>


