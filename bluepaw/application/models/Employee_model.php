<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee_model
 *
 * @author Norbert
 */
class Employee_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list()
    {
        $this->db->select('a.id, a.nev, i.nev iroda_nev, m.nev munkakor_nev');
        $this->db->from('alkalmazott a');
        $this->db->join('iroda i', 'i.id = a.iroda', 'inner');
        $this->db->join('munkakor m', 'm.id = a.munkakor', 'inner');
        $this->db->order_by('a.nev', 'asc');
        
        return $this->db->get()->result();
    }
    
    public function get_one($id)
    {
        $this->db->select('*');
        $this->db->from('alkalmazott');
        $this->db->where('alkalmazott.id', $id);
        
        return $this->db->get()->row();
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('alkalmazott');
    }
    
    public function update($id, $nev, $iroda, $munkakor)
    {
        $record = [
            'id' => $id,
            'nev' => $nev,
            'iroda' => $iroda,
            'munkakor' => $munkakor
        ];
        
        $this->db->where('id', $id);
        return $this->db->update('alkalmazott', $record);
    }
    
    //Paraméterek később
    public function insert($nev, $iroda, $munkakor)
    {
        $record = [
            'nev' => $nev,
            'iroda' => $iroda,
            'munkakor' => $munkakor
        ];
        
        $this->db->insert('alkalmazott', $record);
        return $this->db->insert_id();
    }
}
