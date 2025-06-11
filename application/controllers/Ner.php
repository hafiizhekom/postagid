<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Ner extends CI_Controller {



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

		$this->load->model('ner_model');

		$this->load->helper('path');

		$this->session->set_userdata('on_contribute', true);

	}

    

    public function index(){
		if($this->input->post('artikel')){

			

			$artikel = $this->input->post('artikel');

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

			$ner_tags = $this->ner_model->getTags();

			

			$data = ['words'=>$words, 'ner_tags'=>$ner_tags, 'artikel'=>$artikel, 'pos'=>$this->input->post('pos')];

			$data['page']="ner";

			$this->template->set('title', 'NER Tagging');

			return $this->template->load('default', 'contents' , 'ner/tagging', $data);

			

			

		

		}else{

			redirect(base_url());

		}

	}





	



}