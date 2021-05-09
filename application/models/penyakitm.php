<?php
defined('BASEPATH') OR exit('Ooops!');

class Penyakitm extends CI_Model {
    
    private $table_name = 'tbl_penyakit';
    private $primary_key = 'id_penyakit';
    
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
        return $hasil->result();
    }
    
    public function save($data){
        if ($data['mode'] == 'New'){
            unset($data['mode']);
            $hasil = $this->db->insert($this->table_name, $data);
            return $hasil;
        } else {
            unset($data['mode']);
            $this->db->where($this->primary_key, $data['id_penyakit']);
            $hasil = $this->db->update($this->table_name, $data);
            return $hasil;
        }
    }
    
    public function drop($key){
        $this->db->where($this->primary_key, $key);
        $hasil = $this->db->delete($this->table_name);
        return $hasil;
    }
    
    function getKode(){
        $inisial = 'P';
    	//$struktur	= mysql_query("SELECT * FROM $tabel");
    	$struktur	= $this->db->query("SELECT * FROM $this->table_name");
        $hasil = $struktur->result();
    	//$field		= mysql_field_name($hasil,0);
    	$field		= 'id_penyakit';
    	//$panjang	= mysql_field_len($hasil,0);
    	$panjang	= 5;
    
     	$qry	= $this->db->query("SELECT max(".$field.") as `id_max` FROM ".$this->table_name);
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
}
