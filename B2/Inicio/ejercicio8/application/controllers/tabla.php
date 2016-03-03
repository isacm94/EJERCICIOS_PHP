<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class tabla extends CI_Controller {

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
        
            $this->load->view('tabla'); //Si no hay get, muestra la vista de pedir numero
        
        }
        else{
            if(is_numeric($_GET['num']))
                header("Location: index.php/tabla/tablademultiplicar/".$_GET['num']);//Si hay get, llama a la función de la tabla pasándole el número
            else
                $this->load->view('errortabla');
            
        }
        
    }

    public function TablaDeMultiplicar($num) {

        $html['html'] = "<br><b>Tabla del multiplicar del $num:</b><br> ";
        for ($i = 1; $i <= 10; $i++) {
            $html['html'].= "$num x $i = ". ($num*$i)."<br>";
        }
        
        $this->load->view('tabla', $html);
        
    }

}
