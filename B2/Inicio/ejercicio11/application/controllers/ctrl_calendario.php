<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ctrl_calendario extends CI_Controller {

    public function index() {       
        $this->load->library('calendar');
	$this->load->view('view_calendario');//Incluye vista calendario
        
    }

}
