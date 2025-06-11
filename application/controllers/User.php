<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class User extends CI_Controller {



    public function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index(){
      if($this->session->has_userdata('email')){
        $data['page']='profile';
        $this->template->set('title', 'Profil');
        return $this->template->load('default', 'contents' , 'user/profile', $data);
      }else{
        redirect(base_url());
      }
        
    }

    public function contribution(){
      if($this->session->has_userdata('email')){
        $data['page']='contribution';
        $this->template->set('title', 'Kontribusi');
        return $this->template->load('default', 'contents' , 'user/contribution', $data);
      }else{
        redirect(base_url());
      }
		
    }
    
}