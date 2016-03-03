<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class quetalestas extends CI_Controller {

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
        if(! $_GET){
        
            $this->load->helper('url_helper');
            $this->load->view('quetalestas');
        
        }
        else{
            header("Location: index.php/quetalestas/cuentanumeros/".$_GET['num']);
        }
        
    }

    public function CuentaNumeros($num = 10) {

        echo "<br><b>Número menores que $num:</b> ";
        for ($i = $num - 1; $i >= 0; $i--) {
            echo "$i - ";
        }
    }

}
