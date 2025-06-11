<?php



class Kontribusi_model extends CI_Model {



	public function __construct() {

		parent::__construct();

    }

    public function insertKontribusi($email=FALSE, $artikel) {

        $this->db->flush_cache();
        if($email != FALSE){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('email', $email);
            $queryGetUser = $this->db->get();
            $idUser = $queryGetUser->result()[0]->id;
        }else{
            $idUser = 0;
        }

        $this->db->flush_cache();
        $data = array(
            'user' => $idUser,
            'artikel' => $artikel
        );
		

		if ($this->db->insert('kontribusi', $data)) {
            return $this->db->insert_id(); 
		}

    }
    
    public function updateUserKontribusi($id, $email){
        $this->db->flush_cache();
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $queryGetUser = $this->db->get();
        $idUser = $queryGetUser->result()[0]->id;

		$this->db->flush_cache();
        $this->db->set('user',$idUser);
        $this->db->where(array('id'=>$id));
		if($this->db->update('kontribusi')){
			return true;
		}

	}

    

}