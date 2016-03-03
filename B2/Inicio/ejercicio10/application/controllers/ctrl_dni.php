<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ctrl_dni extends CI_Controller {

    public function index() {       
        $this->load->helper('dni');//Incluye helper
	$this->load->view('view_dni');//Incluye vista dni     
        
    }

}
