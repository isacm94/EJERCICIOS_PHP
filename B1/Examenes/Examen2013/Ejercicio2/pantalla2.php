<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>Operar con Ciudad <?=$_GET['nom']?></p>
        <li> <?php echo "<a href='modificar.php?id=" . $_GET['id'] . "&nom=" . $_GET['nom'] . "'>Modificar nombre</a>"; ?></li>
        <li> <?php echo "<a href='borrar.php?id=".$_GET['id']."&nom=".$_GET['nom']."'>Borrar ciudad</a>";?></li>
        <li> <?php echo "<a href='info.php?id=".$_GET['id']."&nom=".$_GET['nom']."'>Mostrar información del País</a>";?></li>
</body>
</html>




