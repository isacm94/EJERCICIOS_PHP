<?php

include_once 'classdb.php';


function GetCiudades($nReg, $nElementosxPagina) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    $sql = 'SELECT name, id FROM city LIMIT '.$nReg.', '.$nElementosxPagina;

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $datos = Array();

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $datos[$reg['id']] = $reg['name'];
    }
    return $datos;
}

function GetNumRegistrosCiudades()
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();

    /*Creamos una query sencilla*/
    $sql = 'SELECT  count(*) as numRegistros FROM `city`';

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    $line = $bd->LeeRegistro();
        
    return $line['numRegistros'];
}
function GetCodePais($id){
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();

    /*Creamos una query sencilla*/
    $sql = 'SELECT countrycode as code FROM `city` WHERE id='.$id;

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    $line = $bd->LeeRegistro();
        
    return $line['code'];
}
function GetInfoPais($idciudad) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    $sql = "SELECT name as Nombre, continent as Continente, population as 'Nº Habitantes' FROM country  WHERE code LIKE '". GetCodePais($idciudad)."'";

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $datos = Array();

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $datos[] = $reg;
    }
    return $datos[0];
}
function ModificarCiudad($id, $nombre)
{
   
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();	

    $bd->Modificar('city', Array('name'=>$nombre), $id);
}
function EliminarCiudad($id)
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();	

    /*Ejecutamos la query*/
    $bd->Eliminar('city', $id);
}


