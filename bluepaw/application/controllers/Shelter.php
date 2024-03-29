<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Shelter: A menhelyek kezelését látja el.
 *
 * @author Norbert
 */
class Shelter extends CI_Controller{
    //Kell publikus paraméternélküli konstruktor
    public function __construct() {
        parent::__construct();
        
        $this->load->model('shelter_model');
    }
    
    //funkciókhoz, publikus metódusok kellenek
    public function list($campus_id = NULL)
    {
        $this->load->helper('url');
        //A CI controller ad egy LOAD mezőt, amivel a segédeket betudom
        //tölteni funkcio szerint
        
        // Kell a cím
        // és egy rekord lista
        
        
        if($campus_id == NULL)
        {
             $view_params = [
                'title' => 'Menhelyek listája',
                'records' => $this->shelter_model->get_list()
            ];
            //innentől hívható az anchor
            $this->load->view('shelter/list', $view_params); 
        }
        else
        {
            if(!is_numeric($campus_id))
            {
                show_error('Nem helyes paraméterérték!');
            }
            
            //lekérdezem a rekordot
            $record = $this->shelter_model->get_one($campus_id);
            
            if($record == NULL || empty($record))
            {
                show_error('Az id-vel nem létezik aktív rekord');
            }
            $view_params = [
                'title' => 'Részletes rekordatatok',
                'record' => $record
            ];
            
            
            
            $this->load->view('shelter/show', $view_params);
        }
        
        
       
    }
    
    public function insert()
    {
        $this->load->helper('form');
        $this->load->view('shelter/add');
    }
    
    public function update(){
        echo "Frissítés";
    }
    
    public function delete($shelter_id = NULL)
    {
        $this->load->helper('url');
        if($shelter_id == NULL)
        {
            redirect(base_url('shelter/list'));
        }
        
        
        if(!is_numeric($shelter_id))
        {
            redirect(base_url('shelter/list'));
        }
        
        $record = $this->shelter_model->get_one($shelter_id);
        if($record == NULL || empty($record))
        {
            redirect(base_url('shelter/list'));
        }
        
        if($this->shelter_model->delete($shelter_id))
        {
            redirect(base_url('shelter/list'));
         } else{
            show_error('A törlés sikertelen');
        }
        
    }
}
