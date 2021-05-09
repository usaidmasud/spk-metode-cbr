<?php
defined('BASEPATH') OR exit('Ooops!');

class Adminm extends CI_Model {
    
    private $table_name = 'tbl_user';
    private $primary_key = 'id_user';
    
	public function __construct(){
		parent::__construct();
	}

	public function get_record(){
	   $hasil = $this->db->get($this->table_name);
       return $hasil->result();   
	}
    
    public function filter($key){
        $this->db->where($this->primary_key, $key);
        $hasil = $this->db->get($this->table_name);
        if ($hasil->num_rows() == 1){
            return $hasil->result();
        } else return FALSE;
        
    }
    
    function getKode($tabel, $inisial){
    	//$struktur	= mysql_query("SELECT * FROM $tabel");
    	$struktur	= $this->db->query("SELECT * FROM $tabel");
        $hasil = $struktur->result();
    	//$field		= mysql_field_name($hasil,0);
    	$field		= 'id_user';
    	//$panjang	= mysql_field_len($hasil,0);
    	$panjang	= 5;
    
     	$qry	= $this->db->query("SELECT max(".$field.") as `id_max` FROM ".$tabel);
     	//$row	= mysql_fetch_array($qry);
     	$row	= $qry->result();
     	if ($row[0]->id_max=="") {
     		$angka=0;
    	} else {
            $angka = substr($row[0]->id_max, strlen($inisial));
     	}
     	$angka++;
     	$angka	=strval($angka); 
     	$tmp	="";
     	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
    		$tmp=$tmp."0";	
    	}
     	return $inisial.$tmp.$angka;
    }
    
    public function save($data){
        if ($data['mode'] == 'New'){
            //unset($data['id_user']);
            unset($data['mode']);
            $hasil = $this->db->insert($this->table_name, $data);
            return $hasil;
        } else {
            unset($data['mode']);
            $this->db->where($this->primary_key, $data['id_user']);
            $hasil = $this->db->update($this->table_name, $data);
            return $hasil;
        }
    }
    
    public function drop($key){
        $cek = $this->get_record();
        if (count($cek) == 1){
            return FALSE;
        } else {
            $this->db->where($this->primary_key, $key);
            $hasil = $this->db->delete($this->table_name);
            return $hasil;    
        }
    }
}
