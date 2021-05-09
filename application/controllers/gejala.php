<?php
defined('BASEPATH') OR exit('Ooops!');

class Gejala extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if (!$this->session->userdata('isLogin')){
            redirect('auth','refresh'); 
        }
		$this->load->library('template');
        $this->load->model('gejalam');
	}

	public function index()	{
		redirect('gejala/view');
	}
    
    public function view(){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->gejalam->get_record();
		$this->template->display('master-gejala/index', $data);
    }
    
    public function add(){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['id_gejala'] = $this->gejalam->getKode();
        $this->template->display('master-gejala/add', $data);
    }
    
    public function edit($key){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->gejalam->filter($key);
		$this->template->display('master-gejala/edit', $data);
    }
    
    public function confirm_drop($key){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->gejalam->filter($key);
		$this->template->display('master-gejala/drop', $data);
    }
    
    public function drop($key){
        $data['key'] = 'Master';
        $hapus = $this->gejalam->drop($key);
        if ($hapus){
            $base = base_url().'gejala';
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Golongan Berhasil Dihapus. <a href="'.$base.'">Go Back</a></div>');
            redirect('gejala');
        } else echo 'Gagal dihapus';
    }
    
    public function save(){

        $mode = $this->input->post('mode');
        //if ($mode == 'New') $id_gejala = null; else $id_gejala = $this->input->post('id_gejala');
        $data = array (
            'mode'        => $this->input->post('mode'),
            'id_gejala' => $this->input->post('id_gejala'),
            'gejala'    => $this->input->post('gejala'),
            'bobot'  => $this->input->post('bobot')
        );
        $save= $this->gejalam->save($data);
        if ($save) {
            $base = base_url().'gejala';
            if ($mode == 'New') {
                
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Golongan Berhasil Disimpan. <a href="'.$base.'">Go Back</a></div>');
                redirect('gejala/add');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Golongan Berhasil Diupdate. <a href="'.$base.'">Go Back</a></div>');
                redirect('gejala/edit/'.$data['id_gejala']);
            }
        }
    }
}
