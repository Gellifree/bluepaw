<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Epulet
 *
 * @author Norbert
 */
class Epulet extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('epulet_model', 'e_model');
    }
    
    public function list()
    {
        //$this->load->helper('url');
        $view_params = [
            'title' => 'Épületek listája',
            'records' => $this->e_model->get_list()
        ];
        
        $this->load->view('epulet/list', $view_params);
    }
    
    public function insert()
    {   
        $this->load->library('form_validation');
        
        
        $this->form_validation->set_rules('megnevezes', 'Épület Megnevezése', 'required');
        $this->form_validation->set_rules('tipus', 'Épület Típusa', 'required');
        $this->form_validation->set_rules('telep', 'Hozzátartozó Telep', 'required');
        
        if($this->form_validation->run() == TRUE)
        {
            if( $this->e_model->insert(
                    $this->input->post('telep'),
                    $this->input->post('megnevezes'),
                    $this->input->post('tipus')
            ) )
            {
                redirect(base_url('epulet/list'));
            }
        }
        else
        {
            $this->load->helper('form');
            $this->load->model('telep_model');
        
            $list = $this->telep_model->get_list();
            $telepek = [];
            foreach($list as &$item)
            {
                $telepek[$item->id] = $item->nev;
            }
        
            $view_params = [
                'telepek' => $telepek
            ];
    
            $this->load->view('epulet/insert', $view_params);
        }
    }
    
    public function update()
    {
        
    }
    
    public function delete()
    {
        
    }
}
