<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ctrl_borrar extends CI_Controller {

    public function index() {
        $this->load->helper('url'); //Incluye helper
        $this->load->view('view_borrar'); //Incluye vista menu 
        
        
        if($_POST){
           $this->load->model('mdl_provincias');//Cargamos modelo           
           
           $this->mdl_provincias->BorrarProvincia($_POST['codigo']);
           
           echo '<h2>Se ha producido a borrar la provincia con código '. $_POST['codigo'].'</h2>';
        }
        
    }

}

