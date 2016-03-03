<?php
include_once 'mdl_ciudades.php';

//MODIFICAR
if(isset($_POST['guardar']) && ! EMPTY($_POST['nuevonombre']) ){
    
    ModificarCiudad($_POST['id'], $_POST['nuevonombre']);
     
    include_once 'index.php';
}

else if(isset($_POST['cancelar'])){
     
    include_once 'index.php';
}

//BORRAR
if(isset($_POST['siborrar'])){
    
    EliminarCiudad($_POST['id']);
    include_once 'index.php';
}
else if(isset($_POST['noborrar'])){     
    include_once 'index.php';
}



