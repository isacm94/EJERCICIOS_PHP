<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//        echo '<pre>';
//        print_r($ciudades);
//        echo '</pre>';
        foreach ($ciudades as $key => $value) {
            echo "<p>$key - <a href='pantalla2.php?id=$key&nom=$value'>$value</a></p>";
        }
        MuestraPaginador($nPag, $totalPaginas, $myURL);
        ?>
    </body>
</html>
