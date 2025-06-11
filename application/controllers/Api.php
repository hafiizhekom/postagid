<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Api extends CI_Controller {



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
		parent::__construct();
        $this->load->model('pos_model');
		$this->load->model('ner_model');
		$this->load->model('user_model');
		$this->load->model('kontribusi_model');
		$this->load->library('email');
		$this->load->helper('date');
	}

	public function profile(){

		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			
			$data = $this->user_model->profile($email)->result();

			
			return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>true, 'message' => 'success', 'result'=>$data)

					)

				);

		}else{
			return 	$this->output
				->set_content_type('application/json')
				->set_output(
					json_encode(
						array('status'=>false, 'message' => 'failed')
					)
				);
		}

    }
	
	public function contribution(){

		if($this->session->has_userdata('email')){
			$email = $this->session->userdata('email');
			$id_user = $this->user_model->profile($email)->result()[0]->id;
			
			$data = $this->user_model->contribution($id_user)->result();

			foreach($data as $key => $kontribusi){
				$bad_date = $kontribusi->created_date;
				$better_date = nice_date($bad_date, 'd M Y H:i:s');
				$data[$key]->tanggal = $better_date;
			}
			return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>true, 'message' => 'success', 'result'=>$data)

					)

				);

		}else{
			return 	$this->output
				->set_content_type('application/json')
				->set_output(
					json_encode(
						array('status'=>false, 'message' => 'failed')
					)
				);
		}

    }

    public function postag(){

		if($this->input->get('kode')){

			$kode=$this->input->get('kode');

            $data = $this->pos_model->getTags(array('kode'=>$kode))->result();

			return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>true, 'message' => 'success', 'result'=>$data[0])

					)

				);

		}else{

            $data = $this->pos_model->getTags()->result();

			return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>true, 'message' => 'success', 'result'=>$data)

					)

				);

        }

    }



    public function nertag(){

		if($this->input->get('kode')){

			$kode=$this->input->get('kode');

            $data = $this->ner_model->getTags(array('kode'=>$kode))->result();

			return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>true, 'message' => 'success', 'result'=>$data[0])

					)

				);

		}else{

            $data = $this->ner_model->getTags()->result();

			return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>true, 'message' => 'success', 'result'=>$data)

					)

				);

        }

    }

    private function writeKata($file_path, $data, $filter){
		if ( !file_exists("text") ){
			mkdir("text");
		}	
		
		if($filter){
			$file_handle = fopen($file_path, 'w');
		}else{
			$file_handle = fopen($file_path, 'a');
		}
		
		foreach ($data as $key => $value) {
			fwrite($file_handle, $value['kata']."[".$value['tag']."]".PHP_EOL);
		}

		fclose($file_handle);
	}

	private function writeKataMerged($file_path, $dataNer, $dataPos, $filter){
		if ( !file_exists("text") ){
			mkdir("text");
        }	

		if($filter){
			$file_handle = fopen($file_path, 'w');
		}else{
			$file_handle = fopen($file_path, 'a');
		}

		$dataPos = explode(" ",$dataPos);
		foreach ($dataPos as $key => $value) {
			if($key==(count($dataPos)-1)){
				if(count($dataNer)!=0){
					fwrite($file_handle, $value.PHP_EOL);
				}else{
					fwrite($file_handle, $value);
				}
				
			}else{
				fwrite($file_handle, $value.PHP_EOL);
			}
			
		}

		foreach ($dataNer as $key => $value) {
			if($key==(count($dataNer)-1)){
				fwrite($file_handle, $value['kata']."[NNP]"."[".$value['tag']."]");
			}else{
				fwrite($file_handle, $value['kata']."[NNP]"."[".$value['tag']."]".PHP_EOL);
			}
		}

		fclose($file_handle);
	}

    public function possave(){

		if($this->input->post('data')){
			$dataInput = $this->input->post('data');
			foreach($dataInput as $key=>$value){
				$this->pos_model->insertPos($value['kata'], $value['tag']);
			}

			$dataDatabase = $this->pos_model->getDistinctKata()->result();
			
			foreach($dataDatabase as $key=>$value){
				$result = $this->pos_model->getMaxPos($value->kata)->result()[0];
				$dataFilter[$key]['kata']=$value->kata;
				$dataFilter[$key]['tag']=$result->tag;
            }

			$file_path = "data/txt/kata_pos.txt";
			$file_path_filter = "data/txt/kata_filter_pos.txt";

			$this->writeKata($file_path, $dataInput, false); //WITHOUT FILTER
			$this->writeKata($file_path_filter, $dataFilter, true); //WITH FILTER
			
			if($this->input->post('contribute_here')){
				if($this->session->has_userdata('email')){
					$this->kontribusi_model->insertKontribusi($this->session->userdata('email'), $this->session->userdata('after_contribute_artikel'));
				}else{
					$id_insert = $this->kontribusi_model->insertKontribusi(FALSE, $this->session->userdata('after_contribute_artikel'));
					$this->session->set_userdata('after_contribute_finish', true);
					$this->session->set_userdata('after_contribute_finish_id', $id_insert);
				}
			}

           	return $this->output
				->set_content_type('application/json')
				->set_output(
					json_encode(
                        array('status'=>true, 'message' => 'success', 'new_token'=>$this->security->get_csrf_hash())
					)
                );
		}else{
			return 	$this->output
				->set_content_type('application/json')
				->set_output(
					json_encode(
						array('status'=>false, 'message' => 'failed')
					)
				);
		}
    }

    

    public function nersave(){
		if($this->input->post('data')){

			$dataInput = $this->input->post('data');

			foreach($dataInput as $key=>$value){
				$this->ner_model->insertNer($value['kata'], $value['tag']);
			}

			$dataDatabase = $this->ner_model->getDistinctKata()->result();

			foreach($dataDatabase as $key=>$value){
				$result = $this->ner_model->getMaxNer($value->kata)->result()[0];
				$dataFilter[$key]['kata']=$value->kata;
				$dataFilter[$key]['tag']=$result->tag;
			}

			$dataDatabasePos = $this->pos_model->getDistinctKata()->result();
			$dataFilterPos = "";
			foreach($dataDatabasePos as $key=>$value){
				$result = $this->pos_model->getMaxPos($value->kata)->result()[0];
				if($result->tag!="NNP"){
					$dataFilterPos .= " ".$value->kata."[".$result->tag."]";
				}
			}
			
			
			
			
			$file_path = "data/txt/kata_ner.txt";
			$file_path_filter = "data/txt/kata_filter_ner.txt";
			$file_path_merged = "data/txt/kata_pos_ner.txt";
			$file_path_filter_merged = "data/txt/kata_filter_pos_ner.txt";

			$this->writeKataMerged($file_path_merged, $dataInput, $this->input->post('pos'), false);
			$this->writeKata($file_path, $dataInput, false);

			$this->writeKataMerged($file_path_filter_merged, $dataFilter, $dataFilterPos, true);
			$this->writeKata($file_path_filter, $dataFilter, true);
			
			if($this->session->has_userdata('email')){
				$this->kontribusi_model->insertKontribusi($this->session->userdata('email'), $this->session->userdata('after_contribute_artikel'));
			}else{
				$id_insert = $this->kontribusi_model->insertKontribusi(FALSE, $this->session->userdata('after_contribute_artikel'));
				$this->session->set_userdata('after_contribute_finish', true);
				$this->session->set_userdata('after_contribute_finish_id', $id_insert);
			}
			
           	return $this->output
			->set_content_type('application/json')
			->set_output(
				json_encode(
					array('status'=>true, 'message' => 'success')
				)
			);  

		}else{
			return 	$this->output
			->set_content_type('application/json')
			->set_output(
				json_encode(
					array('status'=>false, 'message' => 'failed')
				)
			);
		}
	}

	

	public function register(){

		if(
			$this->input->post('name') && 
			$this->input->post('email') && 
			$this->input->post('password')
		){

			$nama = $this->input->post('name');
			$email = $this->input->post('email');
			$jenis_kelamin = $this->input->post('jenis_kelamin') ? $this->input->post('jenis_kelamin') : NULL;
			$tanggal_lahir = $this->input->post('tanggal_lahir') ? $this->input->post('tanggal_lahir') : NULL;
			$no_telp = $this->input->post('no_telp') ? $this->input->post('no_telp') : NULL; 
			$password = $this->input->post('password');

			if($this->input->post('source')){
				$source = $this->input->post('source');
			}else{
				$source= FALSE;
			}

			if($this->user_model->insertUser($nama, $email, $jenis_kelamin, $tanggal_lahir, $no_telp, $password, $source)){
				try{
					
					if(!$source){
						$this->email->from('administrator@postagid.com', 'Postagid');
						$this->email->to($email);
						$this->email->subject('Verifikasi Email');

						$token = $this->user_model->privateProfile($email)->result()[0]->verifikasi_token;
						
						$message = 'Verifikasi Email anda disini: ';
						$message .= base_url('verifikasi/'.$token);
						$this->email->message($message);
						
						if(!$this->email->send()) {
							throw new Exception('Send Email Verification Failed');
						}
					}

					if($this->session->has_userdata('after_contribute') && $this->session->has_userdata('after_contribute_finish')){
						$artikel = $this->session->userdata('after_contribute_artikel');
						$this->kontribusi_model->updateUserKontribusi($this->session->userdata('after_contribute_finish_id'), $this->input->post('email'));
						// $this->kontribusi_model->insertKontribusi($this->input->post('email'), $artikel);
					}

					return 	$this->output

							->set_content_type('application/json')

							->set_output(

								json_encode(

									array('status'=>true, 'message' => 'success', 'new_token'=>$this->security->get_csrf_hash())

								)

							);
				}catch(Exception $error){
					return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>false, 'message' => $error->getMessage(), 'new_token'=>$this->security->get_csrf_hash())

							)

						);
				}
			}else{
				return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>false, 'message' => 'failed', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
			}

                

                

		}else{

			return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>false, 'message' => 'failed', 'new_token'=>$this->security->get_csrf_hash())

					)

				);

		}

	}

	public function check_email(){
		if($this->input->post('email')){
			if($this->user_model->checkEmail($this->input->post('email'))){
				return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>true, 'message' => 'Email can use', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
			}else{
				return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>false, 'message' => 'Email already exist', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
			}
		}
	}

	public function login(){
		if(
			$this->input->post('email')
		)
		{
			if($this->input->post('source')){
				$source = $this->input->post('source');
			}else{
				$source = FALSE;
			}

			if($this->user_model->login($this->input->post('email'),$this->input->post('password'),$source)){
				$user_profile = $this->user_model->privateProfile($this->input->post('email'))->result();
				$newdata = array(
					'email'     => $user_profile[0]->email,
					'login_datetime'=> date("Y-m-d H:i:s"),
					'source' => $user_profile[0]->source
				);
			
				$this->session->set_userdata($newdata);

				$this->user_model->setLogLogin($this->input->post('email'));

				if($this->session->has_userdata('after_contribute') && $this->session->has_userdata('after_contribute_finish')){
					$artikel = $this->session->userdata('after_contribute_artikel');
					$this->kontribusi_model->updateUserKontribusi($this->session->userdata('after_contribute_finish_id'), $this->input->post('email'));
					// $this->kontribusi_model->insertKontribusi($this->input->post('email'), $artikel);
				}
				
				return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>true, 'message' => 'Login Success', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
			}else{
				return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>false, 'message' => 'Login Failed', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
			}
		}else{
			return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>false, 'message' => 'Login Failed', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
		}
	}


	public function edit(){

		if(
			$this->input->post('editIdUser') &&
			$this->input->post('editName') &&
			$this->input->post('editJenisKelamin') &&
			$this->input->post('editTanggalLahir') &&
			$this->input->post('editNoTelp')
		){

			$id_user = $this->input->post('editIdUser');
			$nama = $this->input->post('editName');
			$jenis_kelamin = $this->input->post('editJenisKelamin');
			$tanggal_lahir = $this->input->post('editTanggalLahir');
			$no_telp = $this->input->post('editNoTelp');

		
			if($this->user_model->editUser($id_user, $nama, $jenis_kelamin, $tanggal_lahir, $no_telp)){
				return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>true, 'message' => 'success', 'new_token'=>$this->security->get_csrf_hash())

					)

				);
			}else{
				return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>false, 'message' => 'failed', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
			}

		}else{

			return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>false, 'message' => 'failed', 'new_token'=>$this->security->get_csrf_hash())

					)

				);

		}

	}

	public function changePassword(){

		if(
			$this->input->post('editIdUser') &&
			$this->input->post('editCurrentPassword') &&
			$this->input->post('editPassword') &&
			$this->input->post('editPasswordAgain')
		){

			$id_user = $this->input->post('editIdUser');
			$email = $this->session->userdata('email');
			$current_password = $this->input->post('editCurrentPassword');
			$password = $this->input->post('editPassword');
			$password_again = $this->input->post('editPasswordAgain');



			if($this->user_model->login($email, $current_password)){
				if($password == $password_again){
					if($this->user_model->changePassword($id_user, $email, $password)){
						return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>true, 'message' => 'success', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
					}else{
						return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>false, 'message' => 'failed', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
					}
				}else{
					return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>false, 'message' => 'password not same', 'new_token'=>$this->security->get_csrf_hash())

							)

						);
				}
			}else{
					return 	$this->output

						->set_content_type('application/json')

						->set_output(

							json_encode(

								array('status'=>false, 'message' => 'user not found', 'new_token'=>$this->security->get_csrf_hash())

							)

						);

			}
		}else{

			return 	$this->output

				->set_content_type('application/json')

				->set_output(

					json_encode(

						array('status'=>false, 'message' => 'failed', 'new_token'=>$this->security->get_csrf_hash())

					)

				);

		}

	}
    

    

}