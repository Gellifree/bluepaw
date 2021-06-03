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
    public function list($campus_id = NULL){
        //A CI controller ad egy LOAD mezőt, amivel a segédeket"""" betudom
        //tölteni funkcio szerint
        
        // Kell a cím
        // és egy rekord lista
        
        
        if($campus_id == NULL)
        {
             $view_params = [
                'title' => 'Menhelyek listája',
                'records' => $this->shelter_model->get_list()
            ];
        
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
            
            print($campus_id);
        }
        
        
       
    }
    
    public function insert(){
        echo "Beillesztés";
    }
    
    public function update(){
        echo "Frissítés";
    }
    
    public function delete(){
        echo "Törlés";
    }
}
