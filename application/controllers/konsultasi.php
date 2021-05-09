<?php
defined('BASEPATH') OR exit('Ooops!');

class Konsultasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('template');
        $this->load->model('konsultasim');
        $this->load->model('gejalam');
        $this->load->library('form_validation');
	}

	public function index()	{
		redirect('konsultasi/view');
	}
    
    public function view(){
        $data['key'] = 'Konsultasi';
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['gejala'] = $this->gejalam->get_record();
		$this->template->display('konsultasi/index', $data);
    }
    
    public function cek_gender($str){
        if ($str == ''){
            $this->form_validation->set_message('cek_gender', 'Pilih {field} ');
            return FALSE;
        } else {
            return TRUE;
        }
    }
        
    public function hasil_konsultasi(){
        $data['key'] = 'Konsultasi';
        $config = array(
            array(
                    'field' => 'gender',
                    'label' => 'Jenis Kelamin',
                    'rules' => 'callback_cek_gender'
            ),
            array(
                    'field' => 'nama_pasien',
                    'label' => 'Nama Pasien',
                    'rules' => 'required|max_length[50]'
            ),
            array(
                    'field' => 'usia',
                    'label' => 'Usia',
                    'rules' => 'required|integer|max_length[3]'
            )
        );
        $this->form_validation->set_rules($config);
        $validasi =$this->form_validation->run(); 
        if ($validasi == FALSE){
            $error =  validation_errors();
            echo $error.br(1);
            echo anchor('konsultasi','Kembali');
            //echo "<script>alert('$error')</script>";
            //echo "<script>history.go(-1)</script>";
        } else {
            
            $person = array(
                'nama_pasien' => $this->input->post('nama_pasien'),
                'usia'        => $this->input->post('usia'),
                'gender'      => $this->input->post('gender')  
            );
            $gejala = $this->gejalam->get_record();
            $input_gejala = array();
            
            $gejala_yang_dialami = array();
            $i = 0;
            // *** Isi inputan gejala
            foreach ($gejala as $row) {
                $temp = $this->input->post($row->id_gejala);
                if ($temp == "on") {
                    //$person[$row->gejala] = "1";
                    $person[$row->id_gejala] = "True";
                    $input_gejala[$row->gejala] = $row->id_gejala;
                    $gejala_yang_dialami[$i] = $row->gejala;
                    $i++;
                } else {
                    $person[$row->id_gejala] = $row->id_gejala;
                }
            }
            
            // ** isi basis kasus gejala
            $this->load->model('basis_kasusm');
            $this->load->model('kasusm');
            $get_id_kasus = array();
            $get_id_kasus = $this->kasusm->get_id_kasus();
            $basis_kasus = $this->basis_kasusm->get_record();
            
            $jum_basis_kasus = $this->konsultasim->get_id_kasus($person['usia']);
            $data['person'] = $person;
            $data['gejala'] = $gejala;   
            $nama_gejala = $this->konsultasim->get_name_gejala();
            $data['gejala_yang_dialami'] = $gejala_yang_dialami;            
            $total_bobot = $this->gejalam->get_total_bobot();
            
            $gj_bs = array();
            
            //for ($row = 0; $row < count($get_id_kasus); $row++){ // perulangan 1
            for ($row = 0; $row < count($jum_basis_kasus); $row++){ // perulangan 1
                $temp = $this->basis_kasusm->filter_by_kasus($jum_basis_kasus[$row]);
                $gj_bs[$row]['id_kasus'] = $temp[0]->id_kasus;
                
                
                
                $gj_bs[$row]['nama_pasien'] = $temp[0]->nama_pasien;
                $nm_gjl = $this->gejalam->get_nama_gejala();    
                $index_ada = array();
                for ($col =0; $col < count($temp);$col++){
                    for ($i = 0; $i < count($gejala); $i++){
                        if ($temp[$col]->gejala == $gejala[$i]->gejala){
                            $index_ada[$gejala[$i]->id_gejala] = $gejala[$i]->id_gejala;
                            $gj_bs[$row][$gejala[$i]->id_gejala] = 'True';
                        } else {}
                    }
                }                
                foreach ($index_ada as $rec){
                    unset($nm_gjl[$rec]); 
                }
                                
                foreach ($nm_gjl as $rec){
                    $gj_bs[$row][$rec] = $rec;
                }
                
            }
            $id_gjl = $this->gejalam->get_id_gejala();
            
                                          
            // *** Menghitung Similarity / Kemiripan ***
            $similarity     = array();
            
            //echo $nama.br(1);
            for ($row = 0; $row < count($gj_bs); $row++){
                $skor = 0;                   
                             
                for ($col = 0; $col < count($id_gjl);$col++){
                    $a = $gj_bs[$row][$id_gjl[$col]];
                    $b = $person[$id_gjl[$col]];
                    if ($a == $b){
                        $filter = $this->gejalam->filter($id_gjl[$col]);
                        $bobot = $filter[0]->bobot;
                        $skor +=$bobot;
                    }
                }
                $total_bobot = $this->gejalam->get_total_bobot();    
                //echo '<b>skor :</b> '.($skor / $total_bobot)*100;
                
                $similarity[$row]['id_kasus'] = $jum_basis_kasus[$row];
                $temp_kasus = $this->kasusm->filter($gj_bs[$row]['id_kasus']);
                $similarity[$row]['nama_pasien'] = $temp_kasus[0]->nama_pasien;
                $similarity[$row]['gender'] = $temp_kasus[0]->gender;
                $similarity[$row]['usia'] = $temp_kasus[0]->usia;
                $similarity[$row]['id_penyakit'] = $temp_kasus[0]->id_penyakit;
                $similarity[$row]['penyakit'] = $temp_kasus[0]->penyakit;
                $similarity[$row]['solusi'] = $temp_kasus[0]->solusi;
                $similarity[$row]['skor'] = $skor;
                //$similarity[$i]['persentase'] = round(($total_skor / $total_bobot) * 100,3);
                $persen = ($skor / $total_bobot) * 100;    
                $similarity[$row]['persentase'] = round($persen,3);
            }
            
            $this->load->model('kasusm');
            $data['kasus'] = $this->kasusm->get_record();
            $data['input_gejala'] = $input_gejala;
            $data['basis_kasus'] = $this->basis_kasusm->get_record();
            
            //$data['similarity'] = array();                    
            $empty = $this->konsultasim->empty_temp();
            $temp = array();
            if ($empty){
                //$data['similarity'] = $similarity;
                for ($row = 0; $row < count($similarity); $row++){
                    $temp['id_kasus'] = $similarity[$row]['id_kasus'];;
                    $temp['nama_pasien'] = $similarity[$row]['nama_pasien'];
                    $temp['usia'] = $similarity[$row]['usia'];
                    $temp['gender'] = $similarity[$row]['gender'];
                    $temp['id_penyakit'] = $similarity[$row]['id_penyakit'];
                    $temp['skor'] = $similarity[$row]['persentase'];
                    $simpan = $this->konsultasim->save_to_temp($temp);
                }        
            }   
            $data['temp_kasus'] = $this->konsultasim->get_temp_kasus($person['usia']);
            $this->template->display('konsultasi/hasil-konsultasi', $data);
        }
    }
    
    
        
    public function save(){
        $this->load->model('kasusm');
        $kode = $this->kasusm->getKode();
        $data = array (
            'id_kasus'  => $kode,
            'nama_pasien'  => $this->input->post('nama_pasien'),
            'usia'  => $this->input->post('usia'),
            'gender'  => $this->input->post('gender'),
            'mode'  => 'New',            
            'id_penyakit'  => $this->input->post('id_penyakit')    
        );
        
        $jum_gejala = $this->input->post('jum_gejala');
        for ($row = 0; $row < $jum_gejala; $row++)
            $gejala['g'.$row] = $this->input->post('g'.$row);
            
        $this->load->model('kasusm');
        $hasil = $this->kasusm->save($data);
        
        //$pilih_kasus = $this->input->post('pilih_kasus');
        
        if ($hasil){
            $record_kasus = $this->kasusm->get_id_kasus_terakhir();
            //$record_kasus = $this->kasusm->filter_pilih_kasus($pilih_kasus);
            
            //$id_terakhir = $record_kasus[0]->id_kasus;
            $id_terakhir = $kode;
            //simpan ke tbl gejala
            $this->load->model('basis_kasusm');
            for ($row = 0; $row < $jum_gejala; $row++){
                $bs['mode'] = "New";                           
                $bs['id_basis_kasus'] = null;
                $bs['id_kasus'] = $kode;                
//                $bs['id_kasus'] = $id_terakhir; // id kasus yang dipilih                
                $bs['id_gejala'] = $this->input->post('g'.$row);                
                $simpan_bs = $this->basis_kasusm->save($bs);
            }
            $empty = $this->konsultasim->empty_temp();            
            echo "<script>alert('Data berhasil disimpan')</script>";      
            redirect('konsultasi','refresh');
        }
        

    }
}
