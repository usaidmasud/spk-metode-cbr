<?php
defined('BASEPATH') OR exit('Ooops!');

class Gejalam extends CI_Model {
    
    private $table_name = 'tbl_gejala';
    private $primary_key = 'id_gejala';
    
	public function __construct(){
		parent::__construct();
	}

	public function get_record(){
	   $hasil = $this->db->get($this->table_name);
       return $hasil->result();   
	}
    
    
    public function gejala_null($id_kasus){
       $query = "SELECT * FROM `tbl_gejala`".
       "WHERE `tbl_gejala`.`id_gejala` NOT IN (SELECT `tbl_basis_kasus`.`id_gejala` FROM `tbl_basis_kasus` WHERE `tbl_basis_kasus`.`id_kasus` = '$id_kasus')";
	   $hasil = $this->db->query($query);
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
        $hasil = $this->db->get($this->table_name);
        return $hasil->result();
    }
    
    public function filter_nama_gejala($key){
        $this->db->where('gejala', $key);
        $hasil = $this->db->get($this->table_name);
        return $hasil->result();
    }
    
    public function save($data){
        if ($data['mode'] == 'New'){
            //unset($data['id_gejala']);
            unset($data['mode']);
            $hasil = $this->db->insert($this->table_name, $data);
            return $hasil;
        } else {
            unset($data['mode']);
            $this->db->where($this->primary_key, $data['id_gejala']);
            $hasil = $this->db->update($this->table_name, $data);
            return $hasil;
        }
    }
    
    public function drop($key){
        $this->db->where($this->primary_key, $key);
        $hasil = $this->db->delete($this->table_name);
        return $hasil;
    }
    
    public function get_nama_gejala(){
        $record = $this->get_record();
        $hasil = array();
        for ($row = 0; $row < count($record); $row++){
            $hasil[$record[$row]->id_gejala] = $record[$row]->id_gejala;
        }
        return $hasil;
    }
    
    public function get_id_gejala(){
        $record = $this->get_record();
        $hasil = array();
        for ($row = 0; $row < count($record); $row++){
            $hasil[$row] = $record[$row]->id_gejala;
        }
        return $hasil;
    }
    
    function getKode(){
        $inisial = 'G';
    	//$struktur	= mysql_query("SELECT * FROM $tabel");
    	$struktur	= $this->db->query("SELECT * FROM $this->table_name");
        $hasil = $struktur->result();
    	//$field		= mysql_field_name($hasil,0);
    	$field		= 'id_gejala';
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
