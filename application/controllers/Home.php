<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */

	public function __construct() {
		// Construct the parent class
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('pos_model');
		include APPPATH . 'third_party/google-api/vendor/autoload.php';
		
	}
	
	public function index()
	{
		$this->template->set('title', 'POS Tag Indonesia');
		$data['page']="home";
		return $this->template->load('default', 'contents' , 'home/home', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function download($file){
		if($this->session->has_userdata('email')){
			$this->load->helper('download');
			
			if($file=="postagingtxt"){
				force_download('./data/txt/kata_pos.txt', NULL);
			}else if($file=="postagingfiltertxt"){
				force_download('./data/txt/kata_filter_pos.txt', NULL);
			}else if($file=="nertagingtxt"){
				force_download('./data/txt/kata_ner.txt', NULL);
			}else if($file=="nertagingfiltertxt"){
				force_download('./data/txt/kata_filter_ner.txt', NULL);
			}else if($file=="posnertagingtxt"){
				force_download('./data/txt/kata_pos_ner.txt', NULL);
			}else if($file=="posnertagingfiltertxt"){
				force_download('./data/txt/kata_filter_pos_ner.txt', NULL);
			}else if($file=="postagingcsv"){
				$this->load->dbutil();

				$query = $this->db->query("SELECT kata, tag FROM pos");
				echo $this->dbutil->csv_from_result($query);
			}else if($file=="nertagingcsv"){
				$this->load->dbutil();

				$query = $this->db->query("SELECT kata, tag FROM ner");
				echo $this->dbutil->csv_from_result($query);
			}else{
				$this->load->view("errors/html/error_404", array('heading'=>'Error 404', 'message'=>'File tidak ditemukan'));			
			}
			
		}else{
			$this->load->view("errors/html/error_404", array('heading'=>'Error 404', 'message'=>'Login terlebih dahulu untuk mendownload'));			
		}
		
	}



	public function docs()
	{
		$data['page']='docs';
		$this->template->set('title', 'Dokumentasi');
		return $this->template->load('default', 'contents' , 'home/docs', $data);
	}

	public function verifikasi($token){
		if($this->user_model->verifikasi($token)){
			redirect(base_url());
		}else{
			redirect(base_url());
		}
	}

}

