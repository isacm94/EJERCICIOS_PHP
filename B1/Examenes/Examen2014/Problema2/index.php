<?php
include_once 'help.php';
include_once 'mdl.php';
$Provincias = GetProvincias();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            table {
                width: 250px;
                border: 1px solid #000;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #000;
            }
        </style>
    </head>
    <body>
        <h3>Listado de peticiones</h3>
        <form action="ctrl.php" METHOD="post">
            <?php
            echo 'Estado de la peticion: ';
            echo CreaSelect('estado', $Provincias);

            echo '<br><br>';

            echo 'Provincia: ';
            echo CreaSelect('provincia', array('P' => 'Pendiente', 'R' => 'Revisándose', 'C' => 'Completa', 'D' => 'Denegada'));
            ?>
            <br> <br>
            <input type="submit" name="mostrar" value="Mostrar peticiones">
        </form>
    </body>
</html>
