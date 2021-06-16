<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Position
 *
 * @author Norbert
 */
class Position extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        if(!$this->ion_auth->logged_in())
        {
            redirect(base_url('auth'));
        }
        
        $this->load->model('position_model');
        //$this->lang->load('position'); 
    }
    
    public function list($position_id = NULL)
    {
        if($position_id == NULL)
        {
            //listázunk
            //Itt lesz a userdata error
            
            //paraméterek átadása a nézetnek
            $view_params = [
                'title' => 'Oldal címe',
                'records' => $this->position_model->get_list(),
            ];
            //nézet meghívása
            $this->load->view('position/list', $view_params);
            
        }
        else
        {
            if(!is_numeric($position_id))
            {
                show_error('Nem helyes paraméterérték');
                redirect(base_url());
            }
            
            $record = $this->position_model->get_one($position_id);
            
            if(empty($record))
            {
                show_error('Ezzel az ID-vel nincs elem.');
            }
            
            $view_params = [
                'title' => 'Részletes oldal címe',
                'record' => $record
            ];
            
            $this->load->view('position/show', $view_params);
        }
    }
    
    public function insert() {
        if(!$this->ion_auth->in_group(['admin', 'position_manager'], false, false))
        {
            redirect(base_url());
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', 'Iroda Megnevezése', 'required|min_length[3]');
        $this->form_validation->set_rules('fizetes', 'Épület', 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            if( $this->position_model->insert( $this->input->post('nev'), $this->input->post('leiras'), $this->input->post('fizetes')) )
            {
                redirect(base_url('position/list'));
            }
        }
        else
        {
            $this->load->helper('form');
            $this->load->view('position/insert');
        }
    }
    
    public function update($position_id = NULL) {
        echo 'update';
    }
    
    public function delete($position_id = NULL) {
        echo 'delete';
    }
}
