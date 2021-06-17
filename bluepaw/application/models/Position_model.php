<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Position_model
 *
 * @author Norbert
 */
class Position_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list()
    {
        //$this->db->select('m.id, m.nev, m.fizetes, f.nev rendelkezik_feladatkor');
        $this->db->select('m.id, m.nev, m.fizetes');
        $this->db->from('munkakor m');
        //$this->db->join('rendelkezik r', 'm.id = r.munkakor', 'inner');
        //$this->db->join('feladatkor f', 'f.id = r.feladatkor', 'inner');
        $this->db->order_by('m.nev', 'asc');
        
        return $this->db->get()->result();
    }
    
    public function get_one($id)
    {
        $this->db->select('*');
        $this->db->from('munkakor');
        $this->db->where('munkakor.id', $id);
        
        return $this->db->get()->row();
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('munkakor');
    }
    
    public function update($id, $nev, $leiras, $fizetes)
    {
        $record = [
            'id' => $id,
            'nev' => $nev,
            'leiras' => $leiras,
            'fizetes' => $fizetes
        ];
        
        $this->db->where('id', $id);
        return $this->db->update('munkakor', $record);
    }
    
    //Paraméterek később
    public function insert($nev, $leiras, $fizetes)
    {
        $record = [
            'nev' => $nev,
            'leiras' => $leiras,
            'fizetes' => $fizetes
        ];
        
        $this->db->insert('munkakor', $record);
        return $this->db->insert_id();
    }
}
