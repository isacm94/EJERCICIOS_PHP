<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('Mdl_usuarios'); //Cargamos modelo 
    }

    public function index($desde = 0) {
        
        $num = $this->Mdl_usuarios->getNumUsuarios();        

        $config = $this->getConfigPagTodos($num);

        $usuarios = $this->Mdl_usuarios->getUsuarios($config['per_page'], $desde);

       $this->pagination->initialize($config);

       $this->load->view('View_main', Array('usuarios' => $usuarios, 'num' => $num, 'texto'=>'No se aplica  filtro'));
    }
    public function MuestraProvincia($cod_prov, $desde = 0){
        
        $num = $this->Mdl_usuarios->getNumUsuariosFromProvincia($cod_prov);
        
        $config = $this->getConfigPag($cod_prov, $num);
        $this->pagination->initialize($config);
        
        $usuarios = $this->Mdl_usuarios->getUsuariosFromProvincia($cod_prov, $config['per_page'], $desde);
        
        
        $this->load->view('View_main', Array('usuarios' => $usuarios, 'num' => $num, 'texto'=>'Solo de provincia '. $this->Mdl_usuarios->getNombreProvincia($cod_prov)));
        
        
    }
    public function getConfigPagTodos($num) {
        //Configuración de Paginación
        $config['base_url'] = site_url('/Ctrl_index/index');
        $config['total_rows'] = $num;
        //$config['num_links'] = 6;
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<span>';
        $config['full_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span>';
        $config['cur_tag_close'] = '</span>';
        $config['prev_tag_open'] = '<span>';
        $config['prev_tag_close'] = '</span>';
        $config['next_tag_open'] = '<span>';
        $config['next_tag_close'] = '</span>';
        $config['first_link'] = '«';
        $config['prev_link'] = '‹';
        $config['last_link'] = '»';
        $config['next_link'] = '›';
        $config['first_tag_open'] = '<span>';
        $config['first_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span>';
        $config['last_tag_close'] = '</span>';

        return $config;
    }

    public function getConfigPag($cod_Prov, $num) {
        //Configuración de Paginación
        $config['base_url'] = site_url('/Ctrl_index/MuestraProvincia/' . $cod_Prov);
        $config['total_rows'] = $num;
        //$config['num_links'] = 6;
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;

        $config['full_tag_open'] = '<span>';
        $config['full_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';
        $config['cur_tag_open'] = '<span>';
        $config['cur_tag_close'] = '</span>';
        $config['prev_tag_open'] = '<span>';
        $config['prev_tag_close'] = '</span>';
        $config['next_tag_open'] = '<span>';
        $config['next_tag_close'] = '</span>';
        $config['first_link'] = '«';
        $config['prev_link'] = '‹';
        $config['last_link'] = '»';
        $config['next_link'] = '›';
        $config['first_tag_open'] = '<span>';
        $config['first_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span>';
        $config['last_tag_close'] = '</span>';

        return $config;
    }

    /* echo '<pre>';
      print_r($tmpl_cuerpo);
      echo '</pre>'; */
}
