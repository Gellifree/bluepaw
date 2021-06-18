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
        $this->lang->load('position'); 
    }
    
    public function list($position_id = NULL)
    {
        if($position_id == NULL)
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
                'title' => lang('position_title_list'),
                'records' => $this->position_model->get_list(),
                'errors' => $errors
            ];
            //nézet meghívása
            $this->load->view('position/list', $view_params);
            
        }
        else
        {
            if(!is_numeric($position_id))
            {
                show_error(lang('param_error'));
                redirect(base_url());
            }
            
            $record = $this->position_model->get_one($position_id);
            
            if(empty($record))
            {
                show_error(lang('id_error'));
            }
            
            $view_params = [
                'title' => lang('position_title_one'),
                'record' => $record
            ];
            
            $this->load->view('position/show', $view_params);
        }
    }
    
    public function insert() {
        if(!$this->ion_auth->in_group(['admin', 'position_manager'], false, false))
        {
            $errors = [
                lang('permission_error_insert')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('position/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', lang('position_name'), 'required|min_length[3]');
        $this->form_validation->set_rules('fizetes', lang('position_payment'), 'required');
        
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
        if(!$this->ion_auth->in_group(['admin', 'position_manager'], false, false))
        {
            $errors = [
                lang('permission_error_modify')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('position/list'));
        }
        
        if($position_id == NULL)
        {
            redirect(base_url('position/list'));
        }
        
        if(!is_numeric($position_id))
        {
            redirect(base_url('position/list'));
        }
        
        $record = $this->position_model->get_one($position_id);
        
        if($record == NULL || empty($record))
        {
            redirect(base_url('position/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', lang('position_name'), 'required|min_length[3]');
        $this->form_validation->set_rules('fizetes', lang('position_payment'), 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('nev');
            $leiras = !empty($this->input->post('leiras')) ? $this->input->post('leiras') : NULL;
            $fizetes = $this->input->post('fizetes');

                   
            if($this->position_model->update($position_id, $nev, $leiras, $fizetes))
            {
                redirect(base_url('position/list'));
            }
            else
            {
                show_error(lang('modify_error'));
            }
        }
        else
        {
            $view_params = [
                'record' => $record,
            ];
        
            $this->load->helper('form');
            $this->load->view('position/update', $view_params);
        }
    }
    
    public function delete($position_id = NULL) {
        if(!$this->ion_auth->is_admin())
        {
            
            $errors = [
                lang('permission_error_delete')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('position/list'));
        }
        
        
        //$this->load->helper('url');
        
        if($position_id == NULL)
        {
            redirect(base_url('position/list'));
        }
        
        if(!is_numeric($position_id))
        {
            redirect(base_url('position/list'));
        }
        
        $record = $this->position_model->get_one($position_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('position/list'));
        }
        
        if($this->position_model->delete($position_id))
        {
            redirect(base_url('position/list'));
        }
        else
        {
            show_error(lang('delete_error'));
        }
    }
}
