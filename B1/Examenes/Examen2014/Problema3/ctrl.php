<?php

if(isset($_POST['entrar']))
{
    if(EsUnUsuarioValido($_POST['usuario'], $_POST['clave']) && isset($_POST['recordar'])){
        setcookie('Usuario', 'Juan', time() + 300);
        include_once 'sesioniniciada.php';
    }
    else if(EsUnUsuarioValido($_POST['usuario'], $_POST['clave']) && ! isset($_POST['recordar'])){
        include_once 'sesioniniciada.php';
    }
    else{
        $usuarioinvalido = "Usuario o contraseña invalidos";
        include_once 'index.php';
    }
}

function EsUnUsuarioValido($usuario, $clave){
    
    if($usuario == 'juan' && $clave == 'kk')
        return true;
    else
        return false;
}