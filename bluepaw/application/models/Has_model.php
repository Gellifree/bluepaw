<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Has_model
 *
 * @author Norbert
 */
class Has_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list($param)
    {
        $this->db->select('r.feladatkor, r.munkakor, m.nev munkakor_nev, f.nev feladatkor_nev');
        $this->db->from('rendelkezik r');
        $this->db->join('munkakor m', 'm.id = r.munkakor', 'inner');
        $this->db->join('feladatkor f', 'f.id = r.feladatkor', 'inner');
        $this->db->where('r.munkakor', $param);
        $this->db->order_by('m.nev', 'asc');
        
        return $this->db->get()->result();
    }
    
    public function delete($munkakor, $feladatkor)
    {
        $this->db->where('munkakor', $munkakor);
        $this->db->where('feladatkor', $feladatkor );
        return $this->db->delete('rendelkezik');
    }
    
    public function insert($munkakor, $feladatkor)
    {
        $record = [
            'munkakor' => $munkakor,
            'feladatkor' => $feladatkor
        ];
        
        $this->db->insert('rendelkezik', $record);
        return $this->db->insert_id();
    }
    
    public function get_record_by_foreign_keys($munkakor, $feladatkor)
    {
        $this->db->select('*');
        $this->db->from('rendelkezik');
        $this->db->where('munkakor', $munkakor);
        $this->db->where('feladatkor', $feladatkor);
        
        return $this->db->get()->result();
    }
}
