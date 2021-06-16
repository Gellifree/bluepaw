<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dog_model
 *
 * @author Norbert
 */
class Dog_model  extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list()
    {
        $this->db->select('k.id, k.nev, e.nev epulet_nev');
        $this->db->from('kutya k');
        $this->db->join('epulet e', 'e.id = k.epulet', 'inner');
        $this->db->order_by('k.nev', 'asc');
        
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
