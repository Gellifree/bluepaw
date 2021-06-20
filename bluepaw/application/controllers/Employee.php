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
        $this->lang->load('employee'); 
        $this->lang->load('office'); 
        $this->lang->load('position'); 
    }

    public function index()
    {
        $this->list();
    }    
    
    public function list($employee_id = NULL)
    {
        if($employee_id == NULL)
        {
            //listázunk
            //Itt lesz a userdata error
            $errors = [];
            if($this->session->has_userdata('errors'))
            {
                $errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
            }
            //paraméterek átadása a nézetnek
            $view_params = [
                'title' => lang('employee_title_list'),
                'records' => $this->employee_model->get_list(),
                'errors' => $errors
            ];
            //nézet meghívása
            $this->load->view('employee/list', $view_params);
            
        }
        else
        {
            if(!is_numeric($employee_id))
            {
                show_error(lang('param_error'));
                redirect(base_url());
            }
            
            $record = $this->employee_model->get_one($employee_id);
            
            if(empty($record))
            {
                show_error(lang('id_error'));
            }
            
            $view_params = [
                'title' => lang('employee_title_one'),
                'record' => $record
            ];
            
            $this->load->view('employee/show', $view_params);
        }
    }
    
    public function insert() {
        if(!$this->ion_auth->in_group(['admin', 'employee_manager'], false, false))
        {
            $errors = [
                lang('permission_error_insert')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('employee/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', lang('employee_name'), 'required|min_length[3]');
        $this->form_validation->set_rules('iroda', lang('office_name'), 'required');
        $this->form_validation->set_rules('munkakor', lang('position_name'), 'required');
        
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
        if(!$this->ion_auth->in_group(['admin', 'employee_manager'], false, false))
        {
            $errors = [
                lang('permission_error_modify')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('employee/list'));
        }
        
        if($employee_id == NULL)
        {
            redirect(base_url('employee/list'));
        }
        
        if(!is_numeric($employee_id))
        {
            redirect(base_url('employee/list'));
        }
        $record = $this->employee_model->get_one($employee_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('employee/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', lang('employee_name'), 'required|min_length[3]');
        $this->form_validation->set_rules('iroda', lang('office_name'), 'required');
        $this->form_validation->set_rules('munkakor', lang('position_name'), 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('nev');
            $iroda = !empty($this->input->post('iroda')) ? $this->input->post('iroda') : NULL;
            $munkakor = $this->input->post('munkakor');
                   
            if($this->employee_model->update($employee_id, $nev, $iroda, $munkakor))
            {
                redirect(base_url('employee/list'));
            }
            else
            {
                show_error(lang('modify_error'));
            }
        }
        else
        {
            
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
                'record' => $record,
                'offices' => $offices,
                'positions' => $positions
            ];
        
            $this->load->helper('form');
            $this->load->view('employee/update', $view_params);
        }
    }
    
    public function delete($employee_id = NULL) {
        if(!$this->ion_auth->is_admin())
        {
            
            $errors = [
                lang('permission_error_delete')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('employee/list'));
        }
        
        
        //$this->load->helper('url');
        
        if($employee_id == NULL)
        {
            redirect(base_url('employee/list'));
        }
        
        if(!is_numeric($employee_id))
        {
            redirect(base_url('employee/list'));
        }
        
        $record = $this->employee_model->get_one($employee_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('employee/list'));
        }
        
        if($this->employee_model->delete($employee_id))
        {
            redirect(base_url('employee/list'));
        }
        else
        {
            show_error(lang('delete_error'));
        }
    }
}
