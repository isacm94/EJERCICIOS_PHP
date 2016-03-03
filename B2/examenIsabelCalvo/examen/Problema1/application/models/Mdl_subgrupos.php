<?php

class Mdl_subgrupos extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
    public function InsertarSubgrupo($data) {

        $this->db->insert('subgrupos', $data);
    }


}
