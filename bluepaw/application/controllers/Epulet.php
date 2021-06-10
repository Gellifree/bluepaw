<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Epulet
 *
 * @author Norbert
 */
class Epulet extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('epulet_model', 'e_model');
    }
    
    public function list()
    {
        //$this->load->helper('url');
        $view_params = [
            'title' => 'Épületek listája',
            'records' => $this->e_model->get_list()
        ];
        
        $this->load->view('epulet/list', $view_params);
    }
    
    public function insert()
    {
        
    }
    
    public function update()
    {
        
    }
    
    public function delete()
    {
        
    }
}
