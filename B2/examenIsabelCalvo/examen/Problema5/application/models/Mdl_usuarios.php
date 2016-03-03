<?php

class Mdl_usuarios extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getUsuarios($limit, $start) {

        $query = $this->db->query("SELECT u.nombre, u.apellido1, u.apellido2, p.nombre 'provincia', u.prov_cod 'cod' "
                . "FROM t_usuarios u "
                . "INNER JOIN t_provincias p on u.prov_cod = p.cod "
                . "LIMIT $start, $limit; ");        

        return $query->result_array();
    }
    
    public function getNumUsuarios() {

        $query = $this->db->query("SELECT COUNT(*) 'num' FROM usuarios.t_usuarios;");        
        
        return $query->row_array()['num'];
    }
    
    public function getUsuariosFromProvincia($cod_prov, $limit, $start) {

        $query = $this->db->query("SELECT u.nombre, u.apellido1, u.apellido2, p.nombre 'provincia', prov_cod 'cod' "
                . "FROM t_usuarios u "
                . "INNER JOIN t_provincias p on u.prov_cod = p.cod "                
                . "WHERE prov_cod = $cod_prov "
                . "LIMIT $start, $limit; "); 
        
        return $query->result_array();
    }
    
    public function getNumUsuariosFromProvincia($cod_prov) {

        $query = $this->db->query("SELECT COUNT(*) 'num' FROM t_usuarios WHERE prov_cod LIKE '$cod_prov';");        
        
        return $query->row_array()['num'];
    }

    public function getNombreProvincia($cod) {

        $query = $this->db->query("SELECT nombre FROM t_provincias WHERE cod = $cod ");        
        
        return $query->row_array()['nombre'];
    }

}
