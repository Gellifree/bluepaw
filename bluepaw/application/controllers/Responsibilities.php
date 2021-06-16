<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Responsibilities
 *
 * @author Norbert
 */
class Responsibilities extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        if(!$this->ion_auth->logged_in())
        {
            redirect(base_url('auth'));
        }
        
        $this->load->model('responsibilities_model');
        //$this->lang->load('responsibilities'); 
    }
    
    public function list($resp_id = NULL)
    {
        if($resp_id == NULL)
        {
            //listázunk
            //Itt lesz a userdata error
            
            //paraméterek átadása a nézetnek
            $view_params = [
                'title' => 'Oldal címe',
                'records' => $this->responsibilities_model->get_list(),
            ];
            //nézet meghívása
            $this->load->view('responsibilities/list', $view_params);
            
        }
        else
        {
            //Kapott paramétert, egyedileg nézünk
        }
    }
    
    public function insert() {
        echo 'insert';
    }
    
    public function update($resp_id = NULL) {
        echo 'update';
    }
    
    public function delete($resp_id = NULL) {
        echo 'delete';
    }
}
