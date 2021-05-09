<?php
defined('BASEPATH') OR exit('Ooops!');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if (!$this->session->userdata('isLogin')){
            redirect('auth','refresh'); 
        }
		$this->load->library('template');
        $this->load->model('adminm');
	}

	public function index()	{
		redirect('admin/view');
	}
    
    public function view(){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->adminm->get_record();
		$this->template->display('master-admin/index', $data);
    }
    
    public function add(){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['id_admin'] = $this->adminm->getKode('tbl_user','U');
		$this->template->display('master-admin/add', $data);
    }
    
    public function edit($key){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->adminm->filter($key);
        if ($data['record']){
            $this->template->display('master-admin/edit', $data);    
        } else redirect('admin');
    }
    
    public function confirm_drop($key){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->adminm->filter($key);
        if ($data['record']){
            $this->template->display('master-admin/drop', $data);
        } else {
            redirect('admin');
        }
		
    }
    
    public function drop($key){
        $data['key'] = 'Master';
        $hapus = $this->adminm->drop($key);
        if ($hapus){
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Admin Berhasil Dihapus. </div>');
            redirect('admin/view');
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger"><strong>Peringatan!</strong> Admin Tidak Bisa Dihapus.</div>');
            redirect('admin/view');
        }
    }
    
    public function save(){
        $mode = $this->input->post('mode');
        //if ($mode == 'New') $id_user = null; else $id_user = $this->input->post('id_user');
        $data = array (
            'mode'        => $this->input->post('mode'),
            'id_user' => $this->input->post('id_user'),
            'nama_pengguna' => $this->input->post('nama_pengguna'),
            'username' => $this->input->post('username'),
            'sandi'    => md5($this->input->post('sandi'))
        );
        
        $save= $this->adminm->save($data);
        if ($save) {
            $base = base_url().'admin';
            if ($mode == 'New') {
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Admin Berhasil Disimpan. <a href="'.$base.'">Go Back</a></div>');
                redirect('admin/add');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Admin Berhasil Diupdate. <a href="'.$base.'">Go Back</a></div>');
                redirect('admin/edit/'.$data['id_user']);
            }
        }
    }
}
