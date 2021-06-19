<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Download
 *
 * @author Norbert
 */
class Download  extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('download');
    }
    
    public function index()
    {
        $this->load->view('download/download');
    }
    
    public function download($filename = NULL)
    {
        if($filename)
        {
            $file = realpath('downloads') . '\\' . $filename;
            
            if (file_exists($file))
            {
                $data = file_get_contents($file);
                
                force_download($filename, $data);
            }
            else
            {
                redirect(base_url());
            }
        }
    }
}
