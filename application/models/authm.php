<?php
defined('BASEPATH') OR exit('Ooops!');

class Authm extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function login($inputan){
       $this->db->where('username', $inputan['username']);
       $this->db->where('sandi', md5($inputan['sandi']));
	   $hasil = $this->db->get('tbl_user');
       if ($hasil->num_rows() == 1) 
       return $hasil->result(); else return FALSE;   
	}
    
}
