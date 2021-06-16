<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author Norbert
 */
class Employee extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        if(!$this->ion_auth->logged_in())
        {
            redirect(base_url('auth'));
        }
        
        $this->load->model('employee_model');
        $this->load->model('office_model');
        $this->load->model('position_model');
        //$this->lang->load('employee'); 
    }
    
    public function list($employee_id = NULL)
    {
        if($employee_id == NULL)
        {
            //listázunk
            //Itt lesz a userdata error
            
            //paraméterek átadása a nézetnek
            $view_params = [
                'title' => 'Oldal címe',
                'records' => $this->employee_model->get_list(),
            ];
            //nézet meghívása
            $this->load->view('employee/list', $view_params);
            
        }
        else
        {
            if(!is_numeric($employee_id))
            {
                show_error('Nem helyes paraméterérték');
                redirect(base_url());
            }
            
            $record = $this->employee_model->get_one($employee_id);
            
            if(empty($record))
            {
                show_error('Ezzel az ID-vel nincs elem.');
            }
            
            $view_params = [
                'title' => 'Részletes oldal címe',
                'record' => $record
            ];
            
            $this->load->view('employee/show', $view_params);
        }
    }
    
    public function insert() {
        if(!$this->ion_auth->in_group(['admin', 'employee_manager'], false, false))
        {
            redirect(base_url());
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', 'Alkalmazott Megnevezése', 'required|min_length[3]');
        $this->form_validation->set_rules('iroda', 'Iroda', 'required');
        $this->form_validation->set_rules('munkakor', 'Munkakör', 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            if( $this->employee_model->insert( $this->input->post('nev'), $this->input->post('iroda'), $this->input->post('munkakor')) )
            {
                redirect(base_url('employee/list'));
            }
        }
        else
        {
            $this->load->helper('form');

        
            $list = $this->office_model->get_list();
            $offices = [];
            foreach($list as &$item)
            {
                $offices[$item->id] = $item->nev;
            }
            
            $list = $this->position_model->get_list();
            $positions = [];
            foreach($list as &$item)
            {
                $positions[$item->id] = $item->nev;
            }
        
            $view_params = [
                'offices' => $offices,
                'positions' => $positions
            ];
    
            $this->load->view('employee/insert', $view_params);
        }
    }
    
    public function update($employee_id = NULL) {
        echo 'update';
    }
    
    public function delete($employee_id = NULL) {
        echo 'delete';
    }
}
