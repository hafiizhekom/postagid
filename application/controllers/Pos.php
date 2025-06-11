<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Pos extends CI_Controller {



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

		$this->load->model('pos_model');

		$this->load->helper('path');

		$this->load->helper('file');

	}

    

    public function index(){
		$this->session->unset_userdata('after_contribute');
		if($this->input->post('artikel')){
			$artikel = $this->input->post('artikel');
			$this->session->set_userdata('after_contribute', true);
			$this->session->set_userdata('after_contribute_artikel', $artikel);
			$data = $this->processtext($artikel);
			$data['page']='pos';
			$this->template->set('title', 'POS Tagging');
			return $this->template->load('default', 'contents' , 'pos/tagging', $data);
		}else if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
			
			$config = array(
				'upload_path' => "./data/artikel",
				'allowed_types' => 'txt',
				'overwrite' => TRUE,	
				'max_size' => "2048000",
				'encrypt_name'=>TRUE // Can be set to particular file size , here it is 2 MB(2048 Kb)
				// 'max_height' => "768",
				// 'max_width' => "1024"
			);
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				$data_upload = array('upload_data' => $this->upload->data());
				$artikel = read_file("./data/artikel/".$data_upload['upload_data']['file_name']);
				$this->session->set_userdata('after_contribute', true);
				$this->session->set_userdata('after_contribute_artikel', $artikel);	
				$data = $this->processtext($artikel);
				$data['page']='pos';
				$this->template->set('title', 'POS Tagging');
				return $this->template->load('default', 'contents' , 'pos/tagging', $data);
			}
			else
			{
				// $error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('notification', array("message"=>$this->upload->display_errors(), "type"=>"danger"));
				redirect(base_url());
			}
		}
		else{
			redirect(base_url());
		}
	}

	private function processtext($artikel){
		$artikel = strtolower($artikel);

		$location = strpos( $artikel, '-' );

		$artikel = str_replace(array(',', '~', '[', ']', '\\', ':', '*', '?', '!', "'", '"', '<', '>', '|', "(", ")"), '' , $artikel);

		

		$paragraphs = explode(PHP_EOL,$artikel);



		$paragraphs = array_filter($paragraphs, function($value) { return !is_null($value) && $value !== ''; });

		

		

		foreach($paragraphs as $paragraph){

			if(isset($sentences)){

				$sentences = array_merge($sentences, explode(".", $paragraph));

			}else{

				$sentences = explode(".", $paragraph);

			}

			$sentences = array_filter($sentences, function($value) { return !is_null($value) && $value !== ''; });

			

			foreach($sentences as $sentence){

				if(isset($words)){

					$words = array_merge($words, explode(" ", $sentence));

				}else{

					$words = explode(" ", $sentence);

				}

			}

		}



		$words = array_filter($words, function($value) { return ($value!="-");});

		$words = array_filter($words, function($value) { return !is_null($value) && $value !== ''; });

		$words=array_unique($words);

		$pos_tags = $this->pos_model->getTags();

		

		$data_artikel = ['words'=>$words, 'pos_tags'=>$pos_tags, 'artikel'=>$artikel];

		return $data_artikel;
	}





	



}