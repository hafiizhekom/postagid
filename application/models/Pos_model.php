<?php



class Pos_model extends CI_Model {



	public function __construct() {

		parent::__construct();

		

	}



	



	public function getMaxPos($kata) {

		$this->db->flush_cache();

		return $this->db->query("SELECT * FROM (SELECT kata, tag, count(tag) as jumlah FROM pos WHERE kata = '".$kata."' GROUP BY kata, tag) as s ORDER BY jumlah DESC LIMIT 1");

	}



	public function getDistinctKata($requirement=FALSE){

		$this->db->flush_cache();

        $this->db->select('distinct(kata)');

        $this->db->from('pos');

        if($requirement!=FALSE){

            $this->db->where($requirement);

        }

        return $this->db->get();

	}

	

	public function getPos($requirement=FALSE){

		$this->db->flush_cache();

        $this->db->select('*');

        $this->db->from('pos');

        if($requirement!=FALSE){

            $this->db->where($requirement);

        }

        return $this->db->get();

	}



    public function insertPos($kata, $tag) {

		$this->db->flush_cache();



		$data = array(

			'kata' => $kata,

			'tag' => $tag

        );

        

		if ($this->db->insert('pos', $data)) {

			return true;

		}

	}

	

	public function getTags($requirement=FALSE) {

		$this->db->flush_cache();

        $this->db->select('*');

        $this->db->from('pos_tag');

        if($requirement!=FALSE){

            $this->db->where($requirement);

        }

        $this->db->where('verifikasi',1);

        return $this->db->get();

    }



    

}