<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Office
 *
 * @author Norbert
 */
class Office extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        if(!$this->ion_auth->logged_in())
        {
            redirect(base_url('auth'));
        }
        
        $this->load->model('office_model');
        $this->load->model('building_model');
        //$this->lang->load('office'); 
    }
    
    public function list($office_id = NULL)
    {
        if($office_id == NULL)
        {
            //listázunk
            //Itt lesz a userdata error
            
            //paraméterek átadása a nézetnek
            $view_params = [
                'title' => 'Oldal címe',
                'records' => $this->office_model->get_list(),
            ];
            //nézet meghívása
            $this->load->view('office/list', $view_params);
            
        }
        else
        {
            if(!is_numeric($office_id))
            {
                show_error('Nem helyes paraméterérték');
                redirect(base_url());
            }
            
            $record = $this->office_model->get_one($office_id);
            
            if(empty($record))
            {
                show_error('Ezzel az ID-vel nincs elem.');
            }
            
            $view_params = [
                'title' => 'Részletes oldal címe',
                'record' => $record
            ];
            
            $this->load->view('office/show', $view_params);
        }
    }
    
    public function insert() {
        if(!$this->ion_auth->in_group(['admin', 'office_manager'], false, false))
        {
            redirect(base_url());
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', 'Iroda Megnevezése', 'required|min_length[3]');
        $this->form_validation->set_rules('kapacitas', 'Kapacitás', 'required');
        $this->form_validation->set_rules('epulet', 'Épület', 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            if( $this->office_model->insert( $this->input->post('nev'), $this->input->post('kapacitas'), $this->input->post('epulet')) )
            {
                redirect(base_url('office/list'));
            }
        }
        else
        {
            $this->load->helper('form');

        
            $list = $this->building_model->get_list();
            $buildings = [];
            foreach($list as &$item)
            {
                $buildings[$item->id] = $item->nev;
            }
        
            $view_params = [
                'epulet' => $buildings,
            ];
    
            $this->load->view('office/insert', $view_params);
        }
    }
    
    public function update($office_id = NULL) {
        echo 'update';
    }
    
    public function delete($office_id = NULL) {
        echo 'delete';
    }
}
