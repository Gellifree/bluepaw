<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Region
 *
 * @author Norbert
 */
class Region extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        if(!$this->ion_auth->logged_in())
        {
            redirect(base_url('auth'));
        }
        
        $this->load->model('region_model');
        $this->lang->load('region'); 
    }
    
    public function list($region_id = NULL) {
        if($region_id == NULL)
        {
            $errors = [];
            if($this->session->has_userdata('errors'))
            {
                $errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
            }
            
            $view_params = [
                'title' => lang('region_list'),
                'records' => $this->region_model->get_list(),
                'errors' => $errors
            ];
            
            $this->load->view('region/list', $view_params);
        }
        else
        {
            if(!is_numeric($region_id))
            {
                show_error(lang('param_error'));
                redirect(base_url());
            }
            
            //lekérdezem a rekordot
            $record = $this->region_model->get_one($region_id);
            
            if(empty($record))
            {
                show_error(lang('id_error'));
            }
            $view_params = [
                'title' => lang('site_show_details'),
                'record' => $record
            ];
            
            
            
            $this->load->view('region/show', $view_params);
        }
    }
    
    public function insert()
    {
        if(!$this->ion_auth->in_group(['admin', 'region_manager'], false, false))
        {
            $errors = [
                lang('permission_error_insert')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('region/list'));
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nev', 'Régió neve', 'required|min_length[3]');
        
        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('nev');
            $leiras = !empty($this->input->post('leiras')) ? $this->input->post('leiras') : NULL;
            
            $id = $this->region_model->insert($nev, $leiras);
            if($id)
            {
                redirect(base_url('region/list/'.$id));
            }
            else
            {
                show_error(lang('insert_error'));
            }
        }
        else
        {
            $this->load->helper('form');
            $this->load->view('region/insert');
        }
    }
    
    public function update($region_id = NULL) {
        if(!$this->ion_auth->in_group(['admin', 'region_manager'], false, false))
        {
            $errors = [
                lang('permission_error_modify')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('region/list'));
        }
        
        if($region_id == NULL)
        {
            redirect(base_url('region/list'));
        }
        
        if(!is_numeric($region_id))
        {
            redirect(base_url('region/list'));
        }
        
        $record = $this->region_model->get_one($region_id);
        
        if($record == NULL || empty($record))
        {
            redirect(base_url('region/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', 'Állat neve', 'required|min_length[3]');
        
        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('nev');
            $leiras = !empty($this->input->post('leiras')) ? $this->input->post('leiras') : NULL;
                   
            if($this->region_model->update($region_id, $nev, $leiras))
            {
                redirect(base_url('region/list'));
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
            $this->load->view('region/update', $view_params);
        }
    }
    
    public function delete($region_id = NULL) {
        if(!$this->ion_auth->is_admin())
        {
            
            $errors = [
                lang('permission_error_delete')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('region/list'));
        }
        
        
        //$this->load->helper('url');
        
        if($region_id == NULL)
        {
            redirect(base_url('region/list'));
        }
        
        if(!is_numeric($region_id))
        {
            redirect(base_url('region/list'));
        }
        
        $record = $this->region_model->get_one($region_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('region/list'));
        }
        
        if($this->region_model->delete($region_id))
        {
            redirect(base_url('region/list'));
        }
        else
        {
            show_error(lang('delete_error'));
        }
    }
    
}
