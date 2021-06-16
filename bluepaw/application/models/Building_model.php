<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Building_model
 *
 * @author Norbert
 */
class Building_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list()
    {
        $this->db->select('e.id, e.nev, r.nev regio_nev');
        $this->db->from('epulet e');
        $this->db->join('regio r', 'r.id = e.regio', 'inner');
        $this->db->order_by('e.nev', 'asc');
        
        return $this->db->get()->result();
    }
    
    public function get_one($id)
    {
        $this->db->select('*');
        $this->db->from('epulet');
        $this->db->where('epulet.id', $id);
        
        return $this->db->get()->row();
    }
    
    public function delete($id)
    {
        
    }
    
    public function update($id)
    {
        
    }
    
    //Paraméterek később
    public function insert($nev, $leiras, $regio)
    {
        $record = [
            'nev' => $nev,
            'leiras' => $leiras,
            'regio' => $regio
        ];
        
        $this->db->insert('epulet', $record);
        return $this->db->insert_id();
    }
}
