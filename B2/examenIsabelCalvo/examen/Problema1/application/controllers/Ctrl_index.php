<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_index extends CI_Controller {

     public function __construct() {
        parent::__construct();    
        $this->load->helper('url');
        $this->load->model('Mdl_subgrupos');
    }
    public function index() {
        $this->load->view('View_importarXML', Array('mensaje' => 'Procesando Archivo'));
    }
    /**
     * Muestra el formulario donde tenemos que seleccionar el archivo XML para importar. 
     */
    public function importar() {
        
    }

    /**
     * Importa los datos del archivo XML seleccionado. Este archivo debe tener el formato válido para importarlo
     */
    public function ProcesaArchivo() {

        $archivo = $_FILES['archivo'];

        if (file_exists($archivo['tmp_name'])) {
            $contentXML = utf8_encode(file_get_contents($archivo['tmp_name']));
            $xml = simplexml_load_string($contentXML);

            $this->InsertFromXML($xml);

            $this->load->view('View_importarXML', Array('mensaje' => 'Insertada correctamente'));
        } else {
            exit('Error abriendo el archivo XML');
        }
    }
    
    function InsertFromXML($xml) {

        $datos = array();
        foreach ($xml as $row) {

            $datos['id'] = (string) $row->id;
            $datos['cod'] = (string) $row->cod;
            $datos['nombre'] = (string) $row->nombre;
            
            $this->Mdl_subgrupos->InsertarSubgrupo($datos);
        }
        
//        echo '<pre>';
//        print_r($datos);
//        echo '</pre>';
        //$this->Mdl_subgrupos->InsertarSubgrupo($datos);
    }
    
}
