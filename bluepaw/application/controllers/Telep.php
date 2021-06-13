<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Telep
 *
 * @author Norbert
 */
class Telep extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('telep_model');
        //$this->load->helper('language');
        $this->lang->load('telep');
    }
    
    public function index($telep_id = NULL)
    {
        $this->load->helper('url');
        
        if($telep_id == NULL)
        {
            $view_params = [
                'title' => 'Telepek listája',
                'records' => $this->telep_model->get_list()
            ];
            
            $this->load->view('telep/list', $view_params);
        }
        else
        {
            if(!is_numeric($telep_id))
            {
                show_error('Nem helyes paraméterérték!');
            }
            
            //lekérdezem a rekordot
            $record = $this->telep_model->get_one($telep_id);
            
            if(empty($record))
            {
                show_error('Az id-vel nem létezik aktív rekord');
            }
            $view_params = [
                'title' => 'Részletes rekordatatok',
                'record' => $record
            ];
            
            
            
            $this->load->view('telep/show', $view_params);
        }
        
    }
    
    public function insert()
    {    
        
        $this->load->library('form_validation'); //$this->form_validation mező jön létre
        
        $this->form_validation->set_rules('telep_nev', 'Telep neve', 'required|min_length[2]');
        
        
        
        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('telep_nev');
            $leiras = !empty($this->input->post('telep_leiras')) ? $this->input->post('telep_leiras') : NULL;
            
            $id = $this->telep_model->insert($nev, $leiras);
            if($id)
            {
                $this->load->helper('url');
                redirect(base_url('/telep/list/'.$id));
            }
            else
            {
                show_error('Hiba a beszúrás után!');
            }
        }
        else
        {
            $this->load->helper('form');
            $this->load->view('telep/add');
        }
        
        
        
    }
    
    public function update($telep_id = NULL)
    {
        $this->load->helper('url');
        if($telep_id == NULL)
        {
            redirect(base_url('telep/list'));
        }
        
        if(!is_numeric($telep_id))
        {
            redirect(base_url('telep/list'));
        }
        
        $record = $this->telep_model->get_one($telep_id);
        
        if($record == NULL || empty($record))
        {
            redirect(base_url('telep/list'));
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('telep_nev', 'Telep neve', 'required|min_length[2]');
        
        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('telep_nev');
            $leiras = !empty($this->input->post('telep_leiras')) ? $this->input->post('telep_leiras') : NULL;
            
            if($this->telep_model->update($telep_id, $nev, $leiras))
            {
                redirect(base_url('telep/list'));
            }
            else
            {
                show_error('Sikertelen módosítás!');
            }
        }
        else
        {
            $view_params = [
                'record' => $record
            ];
        
            $this->load->helper('form');
            $this->load->view('telep/edit', $view_params);
        }
                
        
        
        
    }
    
    public function delete($telep_id = NULL)
    {
        $this->load->helper('url');
        
        if($telep_id == NULL)
        {
            redirect(base_url('telep/list'));
        }
        
        if(!is_numeric($telep_id))
        {
            redirect(base_url('telep/list'));
        }
        
        $record = $this->telep_model->get_one($telep_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('telep/list'));
        }
        
        if($this->telep_model->delete($telep_id))
        {
            redirect(base_url('telep/list'));
         } else{
            show_error('A törlés sikertelen');
        }
    }
}
