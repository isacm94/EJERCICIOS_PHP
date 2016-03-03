<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ctrl_provincias extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->helper('form');

        $prov = $this->getListaProvincias();
        
        //Carga vista del select de provincias
        $this->load->view('view_provincias', Array('provincia' => $prov));
        
        
        //Si se ha pulsado el botón modificar, carga la vista para modificar 
        if (isset($_POST['modificar'])) {

            $this->load->view('view_modificar', Array('cod_provincia' => $_POST['provincia']));
        }


        if (isset($_POST['guardar'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre Repetido', "callback_NoNombreProvinciaRepetido");
            
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('view_modificar', Array('cod_provincia' => $_POST['provincia']));
            } else {
                
                
                $this->load->model('mdl_provincias'); //Cargamos modelo 
                $this->mdl_provincias->ActualizarProvincia(array('nombre' => $_POST['nombre']), $_POST['provincia']);
                
                $this->load->view('view_mod_correcta');
            }
        }
    }

    public function getListaProvincias() {
        $this->load->model('mdl_provincias'); //Cargamos modelo 
        return $prov = $this->mdl_provincias->getProvincias();
    }
    
    public function NoNombreProvinciaRepetido($nombre){
       /*echo '<pre>';
       print_r($_POST);
       echo '</pre>';*/
        $this->load->model('mdl_provincias'); //Cargamos modelo 
        
        //echo "<h1>eee".$this->mdl_provincias->NoNombreRepetido($_POST['nombre'], $_POST['cod_provincia'])."</h1>";
        if($this->mdl_provincias->NoNombreRepetido(
                $this->input->post('nombre'), 
                $this->input->post('provincia')) > 0){
                $this->form_validation->set_message('NoNombreProvinciaRepetido',
                    'El nombre de provincia ya existe');
            return FALSE; //Existe nombre repetido
                }
        else
            return TRUE;
    }
}
