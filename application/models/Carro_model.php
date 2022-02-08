<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carro_model
 *
 * @author User
 */
class Carro_model extends CI_Model {

    //put your code here

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
    return $this->db->insert('carro',$p); //pessoa é o nome da tabela no BD
        
    }
    
    function deletar($id) {
        $this->db->where('idCarro',$id);
        return $this->db->delete('carro');
    }
    
    function editar($id) {
        $this->db->where('idCarro', $id);
        $result = $this->db->get('carro');
        return $result->result();
    }
    
    function atualizar($p) {
        $this->db->where('idCarro',$p['idCarro']);
        $this->db->set($p);
        return $this->db->update('carro');
    }
    
    
    /**
     * Este método retorna a lista de carros
     */
    function listar() {
        $this->db->select('*');
        $this->db->from('carro');
        $this->db->order_by('marca', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

}
