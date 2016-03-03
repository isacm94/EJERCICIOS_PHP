
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Memorizador</h1>
        <form action="" method="post">
            Anotar nombre: <input type="text" name="nom[]">
            
            <input type="submit" name="anotar" value="Anotar">
            <br>
            <p>Nombres anotados: <?php/*
            if(isset($nombres))
                echo implode(', ', $nombres);
            else
                echo "*Ninguno*";*/
            ?></p>
        </form>
        
    </body>
</html>
