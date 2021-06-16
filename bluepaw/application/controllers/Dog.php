<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dog
 *
 * @author Norbert
 */
class Dog extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        if(!$this->ion_auth->logged_in())
        {
            redirect(base_url('auth'));
        }
        
        $this->load->model('dog_model');
        //$this->lang->load('dog'); 
    }
    
    public function list($dog_id = NULL)
    {
        if($dog_id == NULL)
        {
            //listázunk
            //Itt lesz a userdata error
            
            //paraméterek átadása a nézetnek
            $view_params = [
                'title' => 'Oldal címe',
                'records' => $this->dog_model->get_list(),
            ];
            //nézet meghívása
            $this->load->view('dog/list', $view_params);
            
        }
        else
        {
            //Kapott paramétert, egyedileg nézünk
        }
    }
    
    public function insert() {
        echo 'insert';
    }
    
    public function update($dog_id = NULL) {
        echo 'update';
    }
    
    public function delete($dog_id = NULL) {
        echo 'delete';
    }
    
}
