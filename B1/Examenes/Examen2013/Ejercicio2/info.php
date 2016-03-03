<?php include_once 'mdl_ciudades.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Información del País de la Ciudad <?= $_GET['nom']?></h1>
        <?php 
        
        $datos = GetInfoPais($_GET['id']);
        
        
        foreach ($datos as $key => $value) {
            echo "<p>$key: $value</p>";
        }
        
        ?>
        
        <?php 
            echo "<a href='pantalla2.php?id=".$_GET['id']."&nom=".$_GET['nom']."'>Operar con ciudad</a>";
        ?>
        
        <a href="index.php">Ver lista de ciudades</a>
    </body>
</html>



