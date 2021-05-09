<?php
//session_start();
defined('BASEPATH') OR exit('Ooops!');

class About extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}

	public function index()	{
		redirect('about/dashboard');
	}
    
    public function dashboard(){
        $data['key'] = 'About';
		$this->template->display('about/index', $data);
    }
    
    
   
   
}
