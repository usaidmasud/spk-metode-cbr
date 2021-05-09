<?php
defined('BASEPATH') OR exit('Ooops!');

class Konsultasim extends CI_Model {
    
    private $table_name = 'tbl_basis_kasus';
    private $view_name = 'view_basis_kasus';
    private $primary_key = 'id_basis_kasus';
    
	public function __construct(){
		parent::__construct();
	}

	public function get_record(){
	   $hasil = $this->db->get($this->view_name);
       return $hasil->result();   
	}
  
    public function get_record_usia($usia){
       $cek = $usia - 10;
       if ($cek < 0 ) $from = 0; else $from = $cek;
       $to = $usia + 10;
       $query = "SELECT * FROM `view_kasus` WHERE `usia` BETWEEN  '$from' AND '$to'"; 
	   //$hasil = $this->db->get($this->view_name);
	   $hasil = $this->db->query($query);
       return $hasil->result();   
	}
    
    public function get_name_gejala(){
        $this->load->model('gejalam');
        $hasil = $this->gejalam->get_record();
        $gejala_name = array();
        $i = 0;
        foreach ($hasil as $row){
            $gejala_name[$i] = $row->gejala;
            $i++;
        } 
        return $gejala_name;
    }
    
    public function filter_nama_gejala($nama_gejala){
        $this->db->where('gejala', $nama_gejala);
        $hasil = $this->db->get('tbl_gejala');
        if ($hasil->num_rows() == 1)
            return $hasil->result(); else return FALSE;
    }
    
    public function filter($key){
        $this->db->where($this->primary_key, $key);
        $hasil = $this->db->get($this->view_name);
        return $hasil->result();
    }
    
    public function filter_by_id_kasus($key){
        $this->db->where('id_kasus', $key);
        $hasil = $this->db->get($this->view_name);
        return $hasil->result();
    }
    
    public function filter_by_gejala_id_kasus($gejala, $id_kasus){
        $this->db->where('gejala', $gejala);
        $this->db->where('id_kasus', $id_kasus);
        $hasil = $this->db->get($this->view_name);
        if ($hasil->num_rows() == 1)
            return $hasil->result(); else return FALSE;
    }
    
    public function get_max($skor){
        for ($row = 0; $row < count($skor); $row++){
            $temp[$row]['id_kasus'] = $skor[$row]['id_kasus'];
            $temp[$row]['skor'] = $skor[$row]['persentase'];
        }
        return $temp;
        
        
    }
    
    public function get_id_kasus($usia){
        //$bk = $this->get_record();
        $bk = $this->get_record_usia($usia);
        $j = 0;
        $temp = array();
        for ($row = 0; $row < count($bk); $row++){
            if ($row == 0) $temp[$j] = $bk[$row]->id_kasus; else {
                if ($temp[$j] == $bk[$row]->id_kasus) {
                } else {
                    $j++;
                    $temp[$j] = $bk[$row]->id_kasus;
                }
            }
        }
        return $temp;
    }
    
    public function save_to_temp($data){
        $hasil = $this->db->insert('tbl_temp_kasus', $data);
        return $hasil;
    }
    
    public function drop_temp($key){
        $this->db->where('id_kasus', $key);
        $hasil = $this->db->delete('tbl_temp_kasus');
        return $hasil;
    }
    
    public function auto_increment_null(){
        $query = "ALTER TABLE `tbl_temp_kasus` AUTO_INCREMENT = 1";
        $hasil = $this->db->query($query);
        return $hasil;
    }
    
    public function empty_temp(){
        $query = "DELETE FROM `tbl_temp_kasus` WHERE `id_kasus` <> ''";
        $hasil = $this->db->query($query);
        if ($hasil) {
            $this->auto_increment_null();
        }
        return $hasil;
    }
    
    public function get_temp_kasus($usia){
        $from = $usia - 10;
        $to = $usia + 10;
        $query = "SELECT * FROM `view_temp_kasus` WHERE `usia` BETWEEN '$from' AND '$to' ORDER BY `skor` DESC";
        $hasil = $this->db->query($query);
        return $hasil->result();   
    }
    
    public function drop($key){
        $this->db->where($this->primary_key, $key);
        $hasil = $this->db->delete($this->table_name);
        return $hasil;
    }
    
    public function get_id_kosong($nm_gjl, $index_ada, $gj_bs, $index){
        foreach ($index_ada as $row){
            unset($nm_gjl[$row]);     
        }        
        foreach ($nm_gjl as $row){
            $gj_bs[$index][$row] = '0';
        }
        return $gj_bs;
    }
    /*
    public function get_id_kosong($nm_gjl, $index_ada){
        foreach ($index_ada as $row){
            unset($nm_gjl[$row]);     
        }        
        return $nm_gjl;
    }*/
    /*
    public function add_id_kosong($gj_bs, $kosong, $index){
        foreach ($kosong as $row){
            $gj_bs[$index][$row] = '0';
        }
        return $gj_bs;
    }*/
    
}
