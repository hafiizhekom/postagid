<?php



class User_model extends CI_Model {



	public function __construct() {

		parent::__construct();

    }
    
    public function insertUser($nama, $email, $jenis_kelamin, $tanggal_lahir, $no_telp, $password, $source=FALSE) {

		$this->db->flush_cache();

		if($source==FALSE){
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'jenis_kelamin' => $jenis_kelamin,
				'tanggal_lahir' => $tanggal_lahir,
				'no_telp' => $no_telp,
				'password' => md5($password),
				'verifikasi_token'=>md5($email."-".date('Y-m-d H:i:s'))
			);
		}else{
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'password' => md5($password),
				'source' => $source,
				'verifikasi'=>1
			);
		}

		if ($this->db->insert('user', $data)) {
			return true;
		}else{
			return $this->db->_error_message();
		}

	}

	public function verifikasi($token){

		$this->db->flush_cache();

        $this->db->set('verifikasi',1);
        $this->db->where(array('verifikasi_token'=>$token));
		if($this->db->update('user')){
			return true;
		}

	}

	public function checkEmail($email){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('email'=>$email));
		if($this->db->get()->num_rows()>=1){
			return false;
		}else{
			return true;
		}
	}

	public function login($email, $password, $source=FALSE){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('password'=>md5($password)));
		$this->db->where(array('email'=>$email, 'verifikasi'=>1));
		if($source!=FALSE){	
			$this->db->where(array('source'=>$source));
		}
		if($this->db->get()->num_rows()>=1){
			return true;
		}else{
			return false;
		}
	}

	public function editUser($id_user, $nama, $jenis_kelamin, $tanggal_lahir, $no_telp){
		$this->db->flush_cache();
		$this->db->set('nama', $nama);
		$this->db->set('jenis_kelamin', $jenis_kelamin);
		$this->db->set('tanggal_lahir', $tanggal_lahir);
		$this->db->set('no_telp', $no_telp);
		$this->db->where('id', $id_user);
		if($this->db->update('user')){
			return true;
		}else{
			return false;
		}
	}

	public function changePassword($id_user, $email, $password){
		$this->db->flush_cache();
		$this->db->set('password', md5($password));
		$this->db->where('id', $id_user);
		$this->db->where('email', $email);
		if($this->db->update('user')){
			return true;
		}else{
			return false;
		}
	}

	public function privateProfile($email){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('email'=>$email));
		return $this->db->get();
	}
	
	public function profile($email){
		$this->db->flush_cache();
		$this->db->select('id');
		$this->db->select('nama');
		$this->db->select('email');
		$this->db->select('jenis_kelamin');
		$this->db->select('tanggal_lahir');
		$this->db->select('no_telp');
		$this->db->from('user');
		$this->db->where(array('email'=>$email));
		return $this->db->get();
	}

	public function contribution($id_user){
		$this->db->flush_cache();
		$this->db->select('*');
		$this->db->from('kontribusi');
		$this->db->where(array('user'=>$id_user));
		return $this->db->get();
	}

	public function setLogLogin($email) {

		$this->db->flush_cache();
		$data = array(
			'email' => $email,
			'datetime' => date('Y-m-d H:i:s')
        );

		if ($this->db->insert('logs_login', $data)) {
			return true;
		}

	}

}