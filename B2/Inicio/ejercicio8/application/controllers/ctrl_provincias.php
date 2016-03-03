<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ctrl_provincias extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {   
        $this->load->helper('url');//Incluye helper
        
        $prov=$this->getListaProvincias();
        $this->load->view('view_provincias', Array('provincias' => $prov)); 
        
        
    }
    
    public function getListaProvincias(){
        $this->load->model('mdl_provincias');//Cargamos modelo 
        return $prov = $this->mdl_provincias->getProvincias();      
       
    }

}
