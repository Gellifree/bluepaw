<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author Norbert
 */
class Upload extends CI_Controller {
    public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload/upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
            if(!$this->ion_auth->in_group(['admin', 'picture_manager'], false, false))
            {
                $errors = [
                    lang('permission_error_insert')
                ];

                $this->session->set_userdata(['errors' => $errors]);
                redirect(base_url('dog/list'));
            }
            
            
                $config['upload_path']          = './public/dogs';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 10024;
                $config['max_width']            = 10024;
                $config['max_height']           = 10024;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        redirect(base_url());
                }
        }
}
