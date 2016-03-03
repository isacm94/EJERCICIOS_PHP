<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ctrl_insertar extends CI_Controller {

    public function index() {
        $this->load->helper('url'); //Incluye helper
        $this->load->view('view_insertar'); //Incluye vista menu   


        if ($_POST) {
           $this->load->model('mdl_provincias');//Cargamos modelo 
           
           $id = $this->mdl_provincias->getNumProvincias() + 1;//Para crear id, ya que no es autonúmerico
           
           $this->mdl_provincias->InsertarProvincia( array('cod'=> $id, 'nombre' => $_POST['nombre'],'comunidad_id' => '99'));
        
           echo "<h2>".$_POST['nombre']." ha sido añadida correctamente</h2>";
        }
    }

}
