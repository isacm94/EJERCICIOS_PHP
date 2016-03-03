
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Diario del día</h1>
        <form action="index.php" method="post">
           
            <input type="submit" name="aleatorio" value="Pulse aquí para seleccionar un diario aleatorio">
            
            <p>Diario seleccionado: 
            <?php
                if(isset($_SESSION['diarioseleccionado']))
                    echo $_SESSION['diarioseleccionado'];
            ?>
            
            </p>
            <p>
            <input type="text" name="nuevodiario">
            <input type="submit" name="anhadir" value="Añadir nuevo diario a la lista">
            </p>
            <p>Diario almacenados: 
            <?php
                if(isset($_SESSION['diarios']))
                    echo implode(', ', $_SESSION['diarios']);
            ?></p>
            
            
        </form>
        <br>
        <a href="borrar.php">Borrar Todo</a>
        
    </body>
</html>
