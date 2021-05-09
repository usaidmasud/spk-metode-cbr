<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template { 
    protected $_ci; 

    public function __construct(){ 
        $this->_ci =&get_instance();
    } 
	
    public function display($content, $data=null){ 
        $data['_content'] = $this->_ci->load->view($content , $data, true); 
        $data['_header']  = $this->_ci->load->view('template/header', $data, true);
        $data['_footer']  = $this->_ci->load->view('template/footer', $data, true);   
        $this->_ci->load->view('/dashboard.php',$data); 
    } 

}