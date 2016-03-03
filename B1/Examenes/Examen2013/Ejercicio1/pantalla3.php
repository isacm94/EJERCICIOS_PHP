<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Pantalla 3</h1>
        <h3>Ficha de datos</h3>
        <?php
                        
            foreach ($_SESSION as $key => $text) {
                if($key != 'Examen' && $key != 'Provincia')
                    echo "<p>$key: $text</p>";
                else if($key == 'Provincia'){
                    echo "<p>$key: ". GetNombreProvincias($text)."</p>";
                
                }
                else
                    echo "<p>Exámen: ".implode(',', $_SESSION['Examen'])."<p>";
            }           
            
            ?>
        <p>Importe: <?php echo GetImporte($_SESSION['Examen']);?> euros</p>
    </body>
</html>
<?php session_destroy();?>

