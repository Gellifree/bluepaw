<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

        public function __construct() {
            parent::__construct();
            
            $this->lang->load('auth');
            
            if(!$this->ion_auth->logged_in())
            {
                redirect(base_url('auth'));
            }
        }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $user = $this->ion_auth->user()->row();
                
                $view_params = [
                    'user' => $user
                ];
            
            
		$this->load->view('welcome_message', $view_params);
	}
       
}
