<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Shelter_model
 *
 * @author Norbert
 */
class Shelter_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        
        //alkalmassá teszem a modellt a DB kezelésre
        //betöltöm az adatbázist, pontosabban a kezeléshez szökséges segédeket
        
        $this->load->database();
        
        //innentől kezdve a $this->db referencián keresztül érem el a db-t
       
    }
    
    public function get_list()
    {
        //SELECT id, nev 
        //FROM `shelter` 
        //WHERE aktiv = 1 
        //order by nev asc
        $this->db->select('s.id, s.nev');
        $this->db->from('shelter s');
        $this->db->where('s.aktiv', 1);
        
        $this->db->order_by('s.nev', 'asc');
        
        return $this->db->get()->result();
       
    }
    
    
    public function get_one($id)
    {
        //SELECT * => mezőlista kifejtés
        //FROM `shelter` 
        //WHERE aktiv = 1 
        
        $this->db->select('s.id, s.nev, s.leiras, s.aktiv');
        $this->db->from('shelter s');
        $this->db->where('id', $id);
        $this->db->where('aktiv', 1);
        
        return $this->db->get()->row();
    }
    
    public function delete($id)
    {
        //DELETE FROM shelter WHERE id = $id AND aktiv = 1
        $this->db->where('id', $id);
        $this->db->where('aktiv', 1);
        return $this->db->delete('shelter');
    }
}
