<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Has
 *
 * @author Norbert
 */
class Has extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('has_model');
        $this->load->model('position_model');
        
        $this->lang->load('responsibilities');
    }
    
    public function list($has_id = NULL)
    {
        if(!is_numeric($has_id))
        {
            show_error(lang('param_error'));
            redirect(base_url());
        }

        $records = $this->has_model->get_list($has_id);
        $position = $this->position_model->get_one($has_id);

        $view_params = [
            'title' => $position->nev,
            'records' => $records
        ];

        $this->load->view('has/list', $view_params);
    }
    
    public function check_has_unique($munkakor, $feladatkor)
    {
        
        
        $records = $this->has_model->get_record_by_foreign_keys($munkakor, $feladatkor);
        if($records == NULL || empty($records))
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('check_has_unique', 'Ehhez a munkakörhöz, már hozzárendelted ezt a feladatkört.');
            return false;
        }
        
        
    }
    
    public function insert()
    {
        if(!$this->ion_auth->in_group(['admin', 'has_manager'], false, false))
        {
            $errors = [
                lang('permission_error_insert')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('position/list'));
        }
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('munkakor', 'Nyelvesíteni kell később ->munkakor', 'required|callback_check_has_unique['.$this->input->post('feladatkor').']');
        $this->form_validation->set_rules('feladatkor', 'Nyelvesíeni kell később ->feladatkor', 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            if( $this->has_model->insert($this->input->post('munkakor'), $this->input->post('feladatkor')) )
            {
                
                redirect(base_url('position/list'));
                //Később lehetne az átirányítást pontosíani, munkakör id alapjan
            }
            else
            {
                redirect(base_url('has/list/'.$this->input->post('munkakor')));
            }
        }
        else
        {
            $this->load->helper('form');
            $this->load->model('position_model');
            $this->load->model('responsibilities_model');
        
            $list = $this->position_model->get_list();
            $positions = [];
            foreach($list as &$item)
            {
                $positions[$item->id] = $item->nev;
            }
            
            $list = $this->responsibilities_model->get_list();
            $responsibilities = [];
            foreach($list as &$item)
            {
                $responsibilities[$item->id] = $item->nev;
            }
        
            $view_params = [
                'positions' => $positions,
                'responsibilities' => $responsibilities
            ];
    
            $this->load->view('has/insert', $view_params);
        }
    }
    
    
    public function delete($munkakor = NULL, $feladatkor = NULL)
    {
        if(!$this->ion_auth->is_admin())
        {
            
            $errors = [
                lang('permission_error_delete')
            ];
            
            $this->session->set_userdata(['errors' => $errors]);
            redirect(base_url('has/list/'.$munkakor));
        }
        
        
        //$this->load->helper('url');
        
        if($munkakor == NULL || $feladatkor == NULL)
        {
            redirect(base_url('position/list'));
        }
        
        if(!is_numeric($munkakor) || !is_numeric($feladatkor))
        {
            redirect(base_url('position/list'));
        }
        
        $record = $this->has_model->get_list($munkakor);
        if($record == NULL || empty($record))
        {
            redirect(base_url('position/list'));
        }
        
        if($this->has_model->delete($munkakor, $feladatkor))
        {
            redirect(base_url('has/list/'.$munkakor));
        }
        else
        {
            show_error(lang('delete_error'));
        }
    }
}
