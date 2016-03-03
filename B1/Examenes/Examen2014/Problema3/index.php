<?php
if (isset($_COOKIE['Usuario']) && $_COOKIE['Usuario']=='Juan') {
    include_once 'sesioniniciada.php';
}

if (!isset($_COOKIE['Usuario'])):
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
            <h1>Introduzca su usuario</h1>

            <form action="ctrl.php" METHOD="POST">
                <p>Usuario: <input type="text" name="usuario" value=""></p>

                <p>Contraseña: <input type="password" name="clave" value=""></p>
                <?php
                if (isset($usuarioinvalido))
                    echo '<p style="color: red;">' . $usuarioinvalido . '</p>'
                    ?>
                <p>
                    <input type="checkbox" name="recordar" value=""> Recordar usuario
                    <input type="submit" name="entrar" value="Entrar">
                </p>
            </form>
        </body>
    </html>
<?php endif; ?>
