<?php
include_once 'help.php';
include_once 'mdl.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            table {
                width: 250px;
                border: 1px solid #000;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #000;
            }
        </style>
    </head>
    <body> 

        <?php
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        $peticiones = GetPeticiones();

        echo '<pre>';
        print_r($peticiones);
        echo '</pre>';

        echo CreaTabla($peticiones);
        ?>
    </body>
</html>
<?php

function CreaTabla($peticiones) {

    $html = "";

    $html.= "<table>";
    $html.= "<tr><th>Asunto</th><th>Estado</th><th>Acción</th>";

    foreach ($peticiones as $peticion) {
        $html.= "<tr>";
        if ($key != 'id') {
            foreach ($peticion as $key => $text) { 
                if($key == 'estado')
                     $html.= "<td>".GetEstado($text)."</td>";
                else
                    $html.= "<td>$text</td>";
            }
        }

        $html.= "<tr>";
    }


    $html.= "</table>";

    return $html;
}
function GetEstado($est){
    
    switch ($est){
        case 'C': 
            return 'Completa';
            break;
        
        case 'P': 
            return 'Pendiente';
            break;
        
        case 'D': 
            return 'Denegada';
            break;
        
        case 'R': 
            return 'Revisándose';
            break;
    }
}