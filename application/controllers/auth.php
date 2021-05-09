<?php
//session_start();
defined('BASEPATH') OR exit('Ooops!');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if ($this->session->userdata('isLogin')){
            redirect('home','refresh');    
        }
        
		$this->load->library('template');
        $this->load->model('authm');
	}

	public function index()	{
		redirect('auth/signin');
	}
    
    public function signin(){
        $data['key'] = 'Login';
		$this->template->display('auth/index', $data);
    }
    public function cekLogin(){
        $inputan = array(
            'username' => $this->input->post('username'),
            'sandi' => $this->input->post('sandi')
        );
        
        $hasil = $this->authm->login($inputan);
        if ($hasil){
            $dataLogin = array();
            $dataLogin = array(
                   'username'  => $hasil[0]->username,
                   'sandi'  => $hasil[0]->sandi
               );
            
            $this->session->set_userdata('isLogin', $dataLogin);
            
            $data = $this->session->userdata('isLogin');
            //echo "<script>alert('Login berhasil')</script>";
            redirect('home','refresh');
        } else {
            echo "<script>alert('Login Gagal')</script>";
            echo "<script>history.go(-1)</script>";
            //redirect('auth');
        } 
        
    }
}
