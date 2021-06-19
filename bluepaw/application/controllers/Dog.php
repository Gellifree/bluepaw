<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dog
 *
 * @author Norbert
 */
class Dog extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        if(!$this->ion_auth->logged_in())
        {
            redirect(base_url('auth'));
        }
        
        $this->load->model('dog_model');
        $this->load->model('building_model');
        $this->lang->load('dog'); 
        $this->lang->load('building'); 
    }
    
    public function list($dog_id = NULL)
    {
        $this->load->helper(array('form'));
        if($dog_id == NULL)
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
                'title' => lang('dog_title_list'),
                'records' => $this->dog_model->get_list(),
                'errors' => $errors
            ];
            //nézet meghívása
            $this->load->view('dog/list', $view_params);
            
        }
        else
        {
            if(!is_numeric($dog_id))
            {
                show_error(lang('param_error'));
                redirect(base_url());
            }
            
            $record = $this->dog_model->get_one($dog_id);
            
            if(empty($record))
            {
                show_error(lang('id_error'));
            }
            
            $view_params = [
                'title' => lang('dog_title_one'),
                'record' => $record
            ];
            
            $this->load->view('dog/show', $view_params);
        }
    }
    
    public function insert() {
        if(!$this->ion_auth->in_group(['admin', 'dog_manager'], false, false))
        {
            $errors = [
                lang('permission_error_insert')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('dog/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', lang('dog_name'), 'required|min_length[3]');
        $this->form_validation->set_rules('epulet', lang('building_name'), 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            if( $this->dog_model->insert( $this->input->post('nev'), $this->input->post('leiras'),$this->input->post('nem'),$this->input->post('szul_datum'), $this->input->post('kep_eleres'), $this->input->post('epulet')  ) )
            {
                redirect(base_url('dog/list'));
            }
        }
        else
        {
            $this->load->helper('form');
            $this->load->model('building_model');
        
            $list = $this->building_model->get_list();
            $buildings = [];
            foreach($list as &$item)
            {
                $buildings[$item->id] = $item->nev;
            }
        
            
            $this->load->helper('directory');
            $images = directory_map('./public/dogs');
            $images_path = [];
            
            $images_path['NULL'] = 'Nincs kép';
            foreach ($images as $key => $value)
            {
                $key = 'bluepaw/public/dogs/'.$value;
                $images_path[$key] = $value;
            }
            
            
            
            $view_params = [
                'buildings' => $buildings,
                'images' => $images_path
            ];
    
            $this->load->view('dog/insert', $view_params);
        }
    }
    
    public function update($dog_id = NULL) {
        if(!$this->ion_auth->in_group(['admin', 'dog_manager'], false, false))
        {
            $errors = [
                lang('permission_error_modify')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('dog/list'));
        }
        
        if($dog_id == NULL)
        {
            redirect(base_url('dog/list'));
        }
        
        if(!is_numeric($dog_id))
        {
            redirect(base_url('dog/list'));
        }
        
        $record = $this->dog_model->get_one($dog_id);
        
        if($record == NULL || empty($record))
        {
            redirect(base_url('dog/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nev', lang('dog_name'), 'required|min_length[3]');
        $this->form_validation->set_rules('epulet', lang('building_name'), 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            $nev = $this->input->post('nev');
            $leiras = !empty($this->input->post('leiras')) ? $this->input->post('leiras') : NULL;
            $nem = $this->input->post('nem');
            $szul_datum = $this->input->post('szul_datum');
            $kep_eleres = $this->input->post('kep_eleres');
            $epulet = $this->input->post('epulet');
                   
            if($this->dog_model->update($dog_id, $nev,  $leiras, $nem, $szul_datum, $kep_eleres, $epulet))
            {
                redirect(base_url('dog/list'));
            }
            else
            {
                show_error(lang('modify_error'));
            }
        }
        else
        {
            
            $list = $this->building_model->get_list();
            $buildings = [];
            foreach($list as &$item)
            {
                $buildings[$item->id] = $item->nev;
            }
            
            
            $this->load->helper('directory');
            $images = directory_map('./public/dogs');
            $images_path = [];
            
            $images_path['NULL'] = 'Nincs kép';
            foreach ($images as $key => $value)
            {
                $key = 'bluepaw/public/dogs/'.$value;
                $images_path[$key] = $value;
            }
            
            
            $view_params = [
                'record' => $record,
                'buildings' => $buildings,
                'images' => $images_path
            ];
        
            $this->load->helper('form');
            $this->load->view('dog/update', $view_params);
        }
    }
    
    public function delete($dog_id = NULL) {
        if(!$this->ion_auth->is_admin())
        {
            
            $errors = [
                lang('permission_error_delete')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('dog/list'));
        }
        
        
        //$this->load->helper('url');
        
        if($dog_id == NULL)
        {
            redirect(base_url('dog/list'));
        }
        
        if(!is_numeric($dog_id))
        {
            redirect(base_url('dog/list'));
        }
        
        $record = $this->dog_model->get_one($dog_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('dog/list'));
        }
        
        if($this->dog_model->delete($dog_id))
        {
            redirect(base_url('dog/list'));
        }
        else
        {
            show_error(lang('delete_error'));
        }
    }
    
}
