<?php
include_once 'classdb.php';
function InsertaDiario($registro)
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();	

    /*Ejecutamos la query*/
    $bd->Insertar('diario', $registro);
}

function GetDiarios($nReg, $nElementosxPagina) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    $sql = 'SELECT * FROM diario LIMIT '.$nReg.', '.$nElementosxPagina;

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $datos = Array();

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $datos[] = $reg;
    }
    return $datos;
}

function GetNumRegistrosDiario()
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd = Db::getInstance();

    /*Creamos una query sencilla*/
    $sql = 'SELECT  count(*) as numRegistros FROM `diario`';

    /*Ejecutamos la query*/
    $bd->Consulta($sql);

    /*Realizamos un bucle para ir obteniendo los resultados*/
    $line = $bd->LeeRegistro();
        
    return $line['numRegistros'];
}