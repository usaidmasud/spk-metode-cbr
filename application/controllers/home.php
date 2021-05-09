<?php
//session_start();
defined('BASEPATH') OR exit('Ooops!');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
        /*
            -- CEK USER LOGIN ATAU TIDAK --
        */
        if (!$this->session->userdata('isLogin')){
            redirect('auth','refresh'); 
        }
		$this->load->library('template');
	}

	public function index()	{
		$data['key'] = 'Home';
        $isi = $this->session->userdata('isLogin');
        //print_r($isi);
		$this->template->display('template/content', $data);
	}
    
    public function logout(){
        $this->session->unset_userdata('isLogin');
        redirect('home','refresh');
    }
}
