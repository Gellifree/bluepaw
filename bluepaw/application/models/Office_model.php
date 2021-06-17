<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Office_model
 *
 * @author Norbert
 */
class Office_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list()
    {
        $this->db->select('i.id, i.nev, i.kapacitas, e.nev epulet_nev');
        $this->db->from('iroda i');
        $this->db->join('epulet e', 'e.id = i.epulet', 'inner');
        $this->db->order_by('i.nev', 'asc');
        
        return $this->db->get()->result();
    }
    
    public function get_one($id)
    {
        $this->db->select('*');
        $this->db->from('iroda');
        $this->db->where('iroda.id', $id);
        
        return $this->db->get()->row();
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('iroda');
    }
    
    public function update($id, $nev, $kapacitas, $epulet)
    {
        $record = [
            'id' => $id,
            'nev' => $nev,
            'kapacitas' => $kapacitas,
            'epulet' => $epulet
        ];
        
        $this->db->where('id', $id);
        return $this->db->update('iroda', $record);
    }
    
    //Paraméterek később
    public function insert($nev, $kapacitas, $epulet)
    {
        $record = [
            'nev' => $nev,
            'kapacitas' => $kapacitas,
            'epulet' => $epulet
        ];
        
        $this->db->insert('iroda', $record);
        return $this->db->insert_id();
    }
}
