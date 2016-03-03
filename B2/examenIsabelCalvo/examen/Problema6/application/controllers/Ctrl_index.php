<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_index extends CI_Controller {

     public function __construct() {
        parent::__construct();    
        $this->load->model('Mdl_apellidos'); //Cargamos modelo 
    }
    public function index() {
        
        $this->load->view('View_template', Array()); 
        $this->CreaPDF_Pedido(); 
        
    }
    
   private function CreaPDF_Pedido() {
        $this->load->library('PDF', 0, 'myPDF');

        $this->myPDF->AddPage();
        $this->myPDF->AliasNbPages(); //nº de páginas
        $this->myPDF->SetFont('Arial', '', 10);
        
        //$numpaises = $this->Mdl->getNumPaises();
        $apellidos = $this->Mdl_apellidos->getApellidos();
        $total = $this->Mdl_apellidos->getTotal();
        foreach ($apellidos as $key => $value) {
			$num = $this->Mdl_apellidos->getNumApellido($value['apellido1']);
            $apellidos[$key]['num'] = $num;
            $apellidos[$key]['porcentaje'] = round(($num*100)/$total, 2);
        }
        
//        echo '<pre>';
//        print_r($apellidos);
//        echo '</pre>';
        $this->myPDF->ImprovedTable(array('Nº', 'Apellido 1º', 'Total', '%'), $apellidos);
        
        $this->myPDF->Ln('20');        

        $this->myPDF->Output();
    }
    
}
