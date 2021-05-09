<?php
//session_start();
defined('BASEPATH') OR exit('Ooops!');

class Help extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('template');
	}

	public function index()	{
		redirect('help/dashboard');
	}
    
    public function dashboard(){
        $data['key'] = 'Help';
		$this->template->display('help/index', $data);
    }
    
    
   
   
}
