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
        //$this->lang->load('region'); 
    }
    
    public function list($region_id = NULL) {
        $this->load->helper('url');
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
                show_error('Nem helyes paraméterérték!');
                redirect(base_url());
            }
            
            //lekérdezem a rekordot
            $record = $this->region_model->get_one($region_id);
            
            if(empty($record))
            {
                show_error('Az id-vel nem létezik rekord');
            }
            $view_params = [
                'title' => lang('site_show_details'),
                'record' => $record
            ];
            
            
            
            $this->load->view('region/show', $view_params);
        }
    }
    
    public function insert() {
        echo 'insert';
    }
    
    public function update($region_id = NULL) {
        echo 'update';
    }
    
    public function delete($region_id = NULL) {
        echo 'delete';
    }
    
}
