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
            //Kapott paramétert, egyedileg nézünk
        }
    }
    
    public function insert() {
        echo 'insert';
    }
    
    public function update($employee_id = NULL) {
        echo 'update';
    }
    
    public function delete($employee_id = NULL) {
        echo 'delete';
    }
}
