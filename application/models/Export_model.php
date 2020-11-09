<?php
	class Export_model extends CI_Model {
		public function __construct(){
			$this->load->database();	
        }
        

        public function getProvinsi()
        {
            $data = $this->db->where("LENGTH(kode)",2)->get('wilayah_2020');
            return $data;
        }
		
		
	}
?>