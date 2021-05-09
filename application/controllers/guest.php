<?php
//session_start();
defined('BASEPATH') OR exit('Ooops!');

class Guest extends CI_Controller {

	public function __construct(){
		parent::__construct();
        /*
            -- CEK USER LOGIN ATAU TIDAK --
        
        if (!$this->session->userdata('isLogin')){
            redirect('auth','refresh'); 
        }
        */
		$this->load->library('template');
	}

	public function index()	{
		$data['key'] = 'Guest';

		$this->template->display('template/content', $data);
	}
    
}
