<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Telep_model
 *
 * @author Norbert
 */
class Telep_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list()
    {
        //SELECT id, nev 
        //FROM `telep` 
        //order by nev asc
        
        $this->db->select('t.id, t.nev');
        $this->db->from('telep t');
        //$this->db->where('s.aktiv', 1);
        
        $this->db->order_by('t.nev', 'asc');
        
        return $this->db->get()->result();
    }
    
    public function get_one($id)
    {
        //SELECT * => mezőlista kifejtés
        //FROM `telep` 
        
        $this->db->select('t.id, t.nev, t.leiras');
        $this->db->from('telep t');
        $this->db->where('id', $id);
        
        return $this->db->get()->row();
    }
    public function delete($id)
    {
        //DELETE FROM shelter WHERE id = $id AND aktiv = 1
        $this->db->where('id', $id);
        return $this->db->delete('telep');
    }
    
    
    public function update($id, $nev, $leiras)
    {
        $record = [
            'nev' => $nev,
            'leiras' => $leiras,
        ];
        
        $this->db->where('id', $id);
        return $this->db->update('telep', $record);
    }
    
    public function insert($nev, $leiras)
    {
        $record = [
            'nev' => $nev,
            'leiras' => $leiras
        ];
        
        $this->db->insert('telep', $record);
        return $this->db->insert_id();
    }
}
