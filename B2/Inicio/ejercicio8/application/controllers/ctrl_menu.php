<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ctrl_menu extends CI_Controller {

    public function index() {       
        $this->load->helper('url');//Incluye helper
	$this->load->view('view_menu');//Incluye vista menu     
        
    }

}
