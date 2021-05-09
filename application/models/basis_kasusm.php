<?php
defined('BASEPATH') OR exit('Ooops!');

class Basis_kasusm extends CI_Model {
    
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
    
    public function get_total_bobot(){
        $hasil = $this->get_record();
        $total = 0;
        foreach ($hasil as $row){
            $bobot = $row->bobot;
            $total += $bobot;
        }
        return $total;
    }
    
    public function filter($key){
        $this->db->where($this->primary_key, $key);
        $hasil = $this->db->get($this->view_name);
        return $hasil->result();
    }
    
    public function filter_by_kasus($key){
        $this->db->where('id_kasus', $key);
        $hasil = $this->db->get($this->view_name);
        return $hasil->result();
    }
    
    public function save($data){
        if ($data['mode'] == 'New'){
            unset($data['mode']);
            $hasil = $this->db->insert($this->table_name, $data);
            return $hasil;
        } else {
            unset($data['mode']);
            $this->db->where($this->primary_key, $data['id_basis_kasus']);
            $hasil = $this->db->update($this->table_name, $data);
            return $hasil;
        }
    }
    
    public function drop($key){
        $this->db->where($this->primary_key, $key);
        $hasil = $this->db->delete($this->table_name);
        return $hasil;
    }
}
