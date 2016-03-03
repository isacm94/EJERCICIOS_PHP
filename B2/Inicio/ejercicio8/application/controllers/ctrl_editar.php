<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ctrl_editar extends CI_Controller {

    public function index() {
        $this->load->helper('url'); //Incluye helper
        $this->load->view('view_editar'); //Incluye vista menu 
        
        
        if($_POST){
           $this->load->model('mdl_provincias');//Cargamos modelo           
           
           $this->mdl_provincias->ActualizarProvincia( array('nombre' => $_POST['nuevonombre']), $_POST['codigo']);
        }
        
    }

}
