<?php
defined('BASEPATH') OR exit('Ooops!');

class Basis_kasus extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if (!$this->session->userdata('isLogin')){
            redirect('auth','refresh'); 
        }
		$this->load->library('template');
        $this->load->model('basis_kasusm');
	}

	public function index()	{
		redirect('basis_kasus/view');
	}
    
    public function view(){
        $data['key'] = 'Basis Kasus';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->basis_kasusm->get_record();
		$this->template->display('basis_kasus/index', $data);
    }
    
    public function add(){
        $data['key'] = 'Basis Kasus';
        $data['pesan'] = $this->session->flashdata('pesan');
        $this->load->model('penyakitm');
        $this->load->model('kasusm');        
        $this->load->model('gejalam');        
        $data['penyakit'] = $this->penyakitm->get_record();
        $data['kasus'] = $this->kasusm->get_record();
        $data['gejala'] = $this->gejalam->get_record();
        $this->template->display('basis_kasus/add', $data);
    }
    
    public function edit($key){
        $data['key'] = 'Basis Kasus';
        $data['pesan'] = $this->session->flashdata('pesan');
        $this->load->model('penyakitm');
        $this->load->model('kasusm');        
        $this->load->model('gejalam');        
        $data['penyakit'] = $this->penyakitm->get_record();
        $data['kasus'] = $this->kasusm->get_record();
        $data['record'] = $this->basis_kasusm->filter($key);
        $data['gejala'] = $this->gejalam->gejala_null($data['record'][0]->id_kasus);
        
        
		$this->template->display('basis_kasus/edit', $data);
    }
    
    public function confirm_drop($key){
        $data['key'] = 'Basis Kasus';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['record'] = $this->basis_kasusm->filter($key);
		$this->template->display('basis_kasus/drop', $data);
    }
    
    public function drop($key){
        $data['key'] = 'Basis Kasus';
        $hapus = $this->basis_kasusm->drop($key);
        if ($hapus){
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Basis Kasus Berhasil Dihapus.</div>');
            redirect('basis_kasus/view');
        } else echo 'Gagal dihapus';
    }
    
    public function update(){
        $mode = $this->input->post('mode');
        if ($mode == 'New') $id_basis_kasus = null; else $id_basis_kasus = $this->input->post('id_basis_kasus');
        $jum_gejala = $this->input->post('jum_gejala');
        $data = array (
            'mode'        => $this->input->post('mode'),
            'id_basis_kasus' => $id_basis_kasus,
            'id_gejala' => $this->input->post('id_gejala'),
            'id_kasus'    => $this->input->post('id_kasus')
        );
        
        $simpan = $this->basis_kasusm->save($data);
        if ($simpan) {
            $base = base_url().'basis_kasus';
            $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Basis Kasus Berhasil Diupdate. <a href="'.$base.'">Go Back</a></div>');
            redirect('basis_kasus/edit/'.$id_basis_kasus);
        }

    }
    
    
    public function save(){
        $mode = $this->input->post('mode');
        if ($mode == 'New') $id_basis_kasus = null; else $id_basis_kasus = $this->input->post('id_basis_kasus');
        $jum_gejala = $this->input->post('jum_gejala');
        $data = array (
            'mode'        => $this->input->post('mode'),
            //'id_basis_kasus' => $id_basis_kasus,
            'id_kasus'    => $this->input->post('id_kasus')
        );
        $this->load->model('gejalam');
        $gejala = $this->gejalam->get_record();
        $input_gejala = array();
        
        $gejala_yang_dialami = array();
        $i = 0;
        foreach ($gejala as $row) {
            $temp = $this->input->post($row->id_gejala);
            if ($temp == "on") {
                $gejala_yang_dialami[$i] = $row->id_gejala;
                $i++;
            }
        }
        for ($row = 0; $row < count($gejala_yang_dialami); $row++){
            $person['id_kasus'] = $data['id_kasus'];
            $person['mode'] = $data['mode'];
            $person['id_gejala'] = $gejala_yang_dialami[$row];
            $simpan = $this->basis_kasusm->save($person);
        }
        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";      
            redirect('basis_kasus','refresh');
        }

        
        
        
        /*
        $save= $this->basis_kasusm->save($data);
        if ($save) {
            $base = base_url().'basis_kasus';
            if ($mode == 'New') {
                
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Basis Kasus Berhasil Disimpan. <a href="'.$base.'">Go Back</a></div>');
                redirect('kasus/add');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-success"><strong>Success!</strong> Basis Kasus Berhasil Diupdate. <a href="'.$base.'">Go Back</a></div>');
                redirect('kasus/edit/'.$id_basis_kasus);
            }
        }
        */
    }
}
