<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Region_model
 *
 * @author Norbert
 */
class Region_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list()
    {
        $this->db->select('r.id, r.nev');
        $this->db->from('regio r');
        $this->db->order_by('r.nev', 'asc');
        
        return $this->db->get()->result();
    }
    
    public function get_one($id)
    {
        
    }
    
    public function delete($id)
    {
        
    }
    
    public function update($id, $nev, $leiras)
    {
        
    }
    
    public function insert($nev, $leiras)
    {
        
    }
}
