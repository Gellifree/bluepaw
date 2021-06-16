<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Building
 *
 * @author Norbert
 */
class Building  extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        if(!$this->ion_auth->logged_in())
        {
            redirect(base_url('auth'));
        }
        
        $this->load->model('building_model');
        //$this->lang->load('building');
    }
    
    public function list($building_id = NULL)
    {
        if($building_id == NULL)
        {
            //listázunk
            //Itt lesz a userdata error
            
            //paraméterek átadása a nézetnek
            $view_params = [
                'title' => 'Oldal címe',
                'records' => $this->building_model->get_list(),
            ];
            //nézet meghívása
            $this->load->view('building/list', $view_params);
            
        }
        else
        {
            if(!is_numeric($building_id))
            {
                show_error('Nem helyes paraméterérték');
                redirect(base_url());
            }
            
            $record = $this->building_model->get_one($building_id);
            
            if(empty($record))
            {
                show_error('Ezzel az ID-vel nincs elem.');
            }
            
            $view_params = [
                'title' => 'Részletes oldal címe',
                'record' => $record
            ];
            
            $this->load->view('building/show', $view_params);
        }
    }
    
    public function insert() {
        echo 'insert';
    }
    
    public function update($building_id = NULL) {
        echo 'update';
    }
    
    public function delete($building_id = NULL) {
        echo 'delete';
    }
}
