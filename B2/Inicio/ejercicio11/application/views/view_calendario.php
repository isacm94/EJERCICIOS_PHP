<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>CALENDARIO 2016</h1>
        
        <?php 
        
        for($i = 1; $i <=12; $i++){
            echo $this->calendar->generate(2016, $i).'<br>';
        }
        ?>
    </body>
</html>


