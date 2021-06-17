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
        $this->load->model('region_model');
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
                'title' => 'Épületek listája',
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
        if(!$this->ion_auth->in_group(['admin', 'building_manager'], false, false))
        {
            redirect(base_url());
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', 'Épület Megnevezése', 'required|min_length[3]');
        $this->form_validation->set_rules('regio', 'Hozzátartozó Régió', 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            if( $this->building_model->insert( $this->input->post('nev'), $this->input->post('leiras'), $this->input->post('regio')) )
            {
                redirect(base_url('building/list'));
            }
        }
        else
        {
            $this->load->helper('form');
            $this->load->model('building_model');
        
            $list = $this->region_model->get_list();
            $regions = [];
            foreach($list as &$item)
            {
                $regions[$item->id] = $item->nev;
            }
        
            $view_params = [
                'regiok' => $regions
            ];
    
            $this->load->view('building/insert', $view_params);
        }
    }
    
    public function update($building_id = NULL) {
        if(!$this->ion_auth->in_group(['admin', 'building_manager'], false, false))
        {
            redirect(base_url());
        }
        
        
        if($building_id == NULL)
        {
            redirect(base_url('building/list'));
        }
        
        if(!is_numeric($building_id))
        {
            redirect(base_url('building/list'));
        }
        
        $record = $this->building_model->get_one($building_id);
        
        if($record == NULL || empty($record))
        {
            redirect(base_url('building/list'));
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nev', 'Épület neve', 'required|min_length[2]');
        $this->form_validation->set_rules('regio', 'Hozzátartozó Régió', 'required');

        
        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('nev');
            $leiras = !empty($this->input->post('leiras')) ? $this->input->post('leiras') : NULL;
            $regio = $this->input->post('regio');
                   
            if($this->building_model->update($building_id, $nev, $leiras, $regio))
            {
                redirect(base_url('building/list'));
            }
            else
            {
                show_error('Sikertelen módosítás!');
            }
        }
        else
        {
            
            $list = $this->region_model->get_list();
            $regions = [];
            foreach($list as &$item)
            {
                $regions[$item->id] = $item->nev;
            }
       
            
            $view_params = [
                'record' => $record,
                'regiok' => $regions
            ];
        
            $this->load->helper('form');
            $this->load->view('building/update', $view_params);
        }
    }
    
    
    
    
    public function delete($building_id = NULL) {
        if(!$this->ion_auth->is_admin())
        {
            
            $errors = [
                'Nincs jogosultságod telepek törléséhez! Csak Admin jogú felhasználó teheti meg.'
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url());
        }
        
        
        //$this->load->helper('url');
        
        if($building_id == NULL)
        {
            redirect(base_url('building/list'));
        }
        
        if(!is_numeric($building_id))
        {
            redirect(base_url('building/list'));
        }
        
        $record = $this->building_model->get_one($building_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('building/list'));
        }
        
        if($this->building_model->delete($building_id))
        {
            redirect(base_url('building/list'));
        }
        else
        {
            show_error('A törlés sikertelen');
        }
    }
}
