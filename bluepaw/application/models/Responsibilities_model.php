<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Responsibilities_model
 *
 * @author Norbert
 */
class Responsibilities_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list()
    {
        $this->db->select('f.id, f.nev');
        $this->db->from('feladatkor f');
        $this->db->order_by('f.nev', 'asc');
        
        return $this->db->get()->result();
    }
    
    public function get_one($id)
    {
        
    }
    
    public function delete($id)
    {
        
    }
    
    public function update($id)
    {
        
    }
    
    //Paraméterek később
    public function insert()
    {
        
    }
}
