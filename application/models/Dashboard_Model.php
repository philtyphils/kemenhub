<?php
	class Dashboard_Model extends CI_Model {
		public function __construct(){
			$this->load->database();	
		}
		
		public function status_aktif($status)
		{
			$this->db->from("daftar_perusahaan");
			$this->db->where("ter_tuk",$status);
			$this->db->where("status","Y");
			$aktif =  $this->db->count_all_results();

			$this->db->from("daftar_perusahaan");
			$this->db->where("ter_tuk",$status);
			$this->db->where("status","N");
			$nonaktif =  $this->db->count_all_results();

			return array(
				"aktif" => $aktif,
				"nonaktif" => $nonaktif,
				"total" => $this->db->where("ter_tuk",$status)->count_all("daftar_perusahaan")
			);
		}
		
		
	}
?>