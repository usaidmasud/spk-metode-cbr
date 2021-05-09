<?php
defined('BASEPATH') OR exit('Ooops!');

class Penyakit extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if (!$this->session->userdata('isLogin')){
            redirect('auth','refresh'); 
        }
		$this->load->library('template');
        $this->load->model('penyakitm');
	}

	public function index()	{
		redirect('penyakit/view');
	}
    
    public function view(){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->penyakitm->get_record();
		$this->template->display('master-penyakit/index', $data);
    }
    
    public function add(){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['id_penyakit'] = $this->penyakitm->getKode();
        
        $this->template->display('master-penyakit/add', $data);
    }
    
    public function edit($key){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->penyakitm->filter($key);
		$this->template->display('master-penyakit/edit', $data);
    }
    
    public function confirm_drop($key){
        $data['key'] = 'Master';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->penyakitm->filter($key);
		$this->template->display('master-penyakit/drop', $data);
    }
    
    public function drop($key){
        $data['key'] = 'Master';
        $hapus = $this->penyakitm->drop($key);
        if ($hapus){
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Penyakit Berhasil Dihapus.</div>');
            redirect('penyakit/view');
        } else echo 'Gagal dihapus';
    }
    
    public function save(){

        $mode = $this->input->post('mode');
        //if ($mode == 'New') $id_penyakit = null; else $id_penyakit = $this->input->post('id_penyakit');
        $data = array (
            'mode'        => $this->input->post('mode'),
            'id_penyakit' => $this->input->post('id_penyakit'),
            'penyakit'    => $this->input->post('penyakit'),
            'solusi'  => $this->input->post('solusi')
        );
        $save= $this->penyakitm->save($data);
        if ($save) {
            $base = base_url().'penyakit';
            if ($mode == 'New') {
                
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Penyakit Berhasil Disimpan. <a href="'.$base.'">Go Back</a></div>');
                redirect('penyakit/add');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Penyakit Berhasil Diupdate. <a href="'.$base.'">Go Back</a></div>');
                redirect('penyakit/edit/'.$data['id_penyakit']);
            }
        }
    }
}
