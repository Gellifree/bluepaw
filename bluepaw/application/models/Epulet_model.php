<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Epulet_model
 *
 * @author Norbert
 */
class Epulet_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_list()
    {
        $this->db->select('e.id, e.megnevezes, t.nev telep_nev');
        $this->db->from('epulet e');
        $this->db->join('telep t', 't.id = e.telep', 'inner');
        $this->db->order_by('t.nev', 'asc');
        $this->db->order_by('e.megnevezes', 'asc');
        
        return $this->db->get()->result();
    }
    
    public  function insert($telep, $megnevezes, $tipus,)
    {
        $record = [
            'telep' => $telep,
            'megnevezes' => $megnevezes,
            'tipus' => $tipus
        ];
        
        $this->db->insert('epulet', $record);
        return $this->db->insert_id();
    }
}
