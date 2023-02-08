<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSession extends CI_controller{

    public function __construct(){
        parent::__construct();
        if(!$this->session->has_userdata('user')){
            redirect('welcome/index');
        }
    }
}

?>