<?php

if(! $_POST){
    include_once 'form.php';;
}
else
{
    print_r($_POST);
    /*if(isset($_POST['anotar'])){
        $_POST['nam'][] = $_POST['nom'];
    }*/
include_once 'form.php';
}


