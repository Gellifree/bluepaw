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
        $this->lang->load('responsibilities'); 
    }
    
    public function list($resp_id = NULL)
    {
        if($resp_id == NULL)
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
                'title' => 'Oldal címe',
                'records' => $this->responsibilities_model->get_list(),
                'errors' => $errors
            ];
            //nézet meghívása
            $this->load->view('responsibilities/list', $view_params);
            
        }
        else
        {
            if(!is_numeric($resp_id))
            {
                show_error(lang('param_error'));
                redirect(base_url());
            }
            
            $record = $this->responsibilities_model->get_one($resp_id);
            
            if(empty($record))
            {
                show_error(lang('id_error'));
            }
            
            $view_params = [
                'title' => 'Részletes oldal címe',
                'record' => $record
            ];
            
            $this->load->view('responsibilities/show', $view_params);
        }
    }
    
    public function insert() {
        if(!$this->ion_auth->in_group(['admin', 'responsibility_manager'], false, false))
        {
            $errors = [
                lang('permission_error_insert')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('responsibilities/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', 'Feladatkör Megnevezése', 'required|min_length[3]');
        
        if($this->form_validation->run() == TRUE)
        {
            if( $this->responsibilities_model->insert( $this->input->post('nev'), $this->input->post('leiras')) )
            {
                redirect(base_url('responsibilities/list'));
            }
        }
        else
        {
            $this->load->helper('form');
            $this->load->view('responsibilities/insert');
        }
    }
    
    public function update($resp_id = NULL) {
        if(!$this->ion_auth->in_group(['admin', 'responsibility_manager'], false, false))
        {
            $errors = [
                lang('permission_error_modify')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('responsibilities/list'));
        }
        
        if($resp_id == NULL)
        {
            redirect(base_url('responsibilities/list'));
        }
        
        if(!is_numeric($resp_id))
        {
            redirect(base_url('responsibilities/list'));
        }
        
        $record = $this->responsibilities_model->get_one($resp_id);
        
        if($record == NULL || empty($record))
        {
            redirect(base_url('responsibilities/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', 'Állat neve', 'required|min_length[3]');
        
        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('nev');
            $leiras = !empty($this->input->post('leiras')) ? $this->input->post('leiras') : NULL;
                   
            if($this->responsibilities_model->update($resp_id, $nev,  $leiras, $leiras))
            {
                redirect(base_url('responsibilities/list'));
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
            $this->load->view('responsibilities/update', $view_params);
        }
    }
    
    public function delete($resp_id = NULL) {
        if(!$this->ion_auth->is_admin())
        {
            
            $errors = [
                lang('permission_error_delete')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('responsibilities/list'));
        }
        
        
        //$this->load->helper('url');
        
        if($resp_id == NULL)
        {
            redirect(base_url('responsibilities/list'));
        }
        
        if(!is_numeric($resp_id))
        {
            redirect(base_url('responsibilities/list'));
        }
        
        $record = $this->responsibilities_model->get_one($resp_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('responsibilities/list'));
        }
        
        if($this->responsibilities_model->delete($resp_id))
        {
            redirect(base_url('responsibilities/list'));
        }
        else
        {
            show_error(lang('delete_error'));
        }
    }
}
