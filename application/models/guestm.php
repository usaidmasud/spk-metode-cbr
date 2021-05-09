<?php
defined('BASEPATH') OR exit('Ooops!');

class Guestm extends CI_Model {
    

    private $view_padi = 'view_padi';
    private $view_palawija = 'view_palawija';
    private $view_hortikultura = 'view_hortikultura';

    
	public function __construct(){
		parent::__construct();
	}

    public function get_filter_padi($sumberDana, $tahun){
       if ($sumberDana == "*" and $tahun == "*"){
           $query = "select * from $this->view_padi";
       } else if ($sumberDana == "*"){
           $query = "select * from $this->view_padi where tahun = '$tahun'";    
       } else if ($tahun == "*"){
           $query = "select * from $this->view_padi where sumber_dana = '$sumberDana'";
       } else {
           $query = "select * from $this->view_padi where sumber_dana = '$sumberDana' and tahun = '$tahun'"; 
       }
	   $hasil = $this->db->query($query);
       return $hasil->result();   
	}
    
    public function get_filter_palawija($sumberDana, $tahun){
       if ($sumberDana == "*" and $tahun == "*"){
           $query = "select * from $this->view_palawija";
       } else if ($sumberDana == "*"){
           $query = "select * from $this->view_palawija where tahun = '$tahun'";    
       } else if ($tahun == "*"){
           $query = "select * from $this->view_palawija where sumber_dana = '$sumberDana'";
       } else {
           $query = "select * from $this->view_palawija where sumber_dana = '$sumberDana' and tahun = '$tahun'"; 
       }
	   $hasil = $this->db->query($query);
       return $hasil->result();   
	}
    
    public function get_filter_hortikultura($tahun){ 
       if ($tahun == "*"){
           $query = "select * from $this->view_hortikultura"; 
       } else {
           $query = "select * from $this->view_hortikultura where tahun = '$tahun'";
       }
	   $hasil = $this->db->query($query);
       return $hasil->result();   
	}
    
    
}
