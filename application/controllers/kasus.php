<?php
defined('BASEPATH') OR exit('Ooops!');

class Kasus extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if (!$this->session->userdata('isLogin')){
            redirect('auth','refresh'); 
        }
		$this->load->library('template');
        $this->load->model('kasusm');
	}

	public function index()	{
		redirect('kasus/view');
	}
    
    public function view(){
        $data['key'] = 'Kasus';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->kasusm->get_record();
		$this->template->display('kasus/index', $data);
    }
    
    public function add(){
        $data['key'] = 'Kasus';
        $data['pesan'] = $this->session->flashdata('pesan');
        $this->load->model('penyakitm');
        $data['penyakit'] = $this->penyakitm->get_record();
        $data['id_kasus'] = $this->kasusm->getKode();
        $this->template->display('kasus/add', $data);
    }
    
    public function edit($key){
        $data['key'] = 'Kasus';
        $data['pesan'] = $this->session->flashdata('pesan');
        $this->load->model('penyakitm');
        $data['penyakit'] = $this->penyakitm->get_record();
        $data['record'] = $this->kasusm->filter($key);
		$this->template->display('kasus/edit', $data);
    }
    
    public function confirm_drop($key){
        $data['key'] = 'Kasus';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->kasusm->filter($key);
		$this->template->display('kasus/drop', $data);
    }
    
    public function drop($key){
        $data['key'] = 'Kasus';
        $hapus = $this->kasusm->drop($key);
        if ($hapus){
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Kasus Berhasil Dihapus.</div>');
            redirect('kasus/view');
        } else echo 'Gagal dihapus';
    }
    
    public function save(){

        $mode = $this->input->post('mode');
        //if ($mode == 'New') $id_kasus = null; else $id_kasus = $this->input->post('id_kasus');
        $data = array (
            'mode'        => $this->input->post('mode'),
            'id_kasus' => $this->input->post('id_kasus'),
            'nama_pasien'    => $this->input->post('nama_pasien'),
            'usia'  => $this->input->post('usia'),
            'gender'  => $this->input->post('gender'),
            'id_penyakit'  => $this->input->post('id_penyakit')
        );
        $save= $this->kasusm->save($data);
        if ($save) {
            $base = base_url().'kasus';
            if ($mode == 'New') {
                
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Kasus Berhasil Disimpan. <a href="'.$base.'">Go Back</a></div>');
                redirect('kasus/add');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Kasus Berhasil Diupdate. <a href="'.$base.'">Go Back</a></div>');
                redirect('kasus/edit/'.$data['id_kasus']);
            }
        }
    }
}
