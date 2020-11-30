<?php
	class Dashboard_Model extends CI_Model {
		public function __construct(){
			$this->load->database();	
		}
		
		public function status_aktif($provinsi)
		{
			if($provinsi != "")
			{
				$query ="(";
                foreach($provinsi as $p)
                {
                    $query = $query."provinsi_id=".$p. " OR ";
                }
                $query = substr($query,0,-4);
                $query= $query.")";
                $this->db->where($query);
			}

			$this->db->select_sum('TERSUS_AKTIF');
			$this->db->select_sum('TERSUS_NONAKTIF');
			$this->db->select_sum('TUKS_AKTIF');
			$this->db->select_sum('TUKS_NONAKTIF');
			$data = $this->db->get('rekaptulasi_provinsi');

			return $data;
		}

		public function getallstatus()
		{
			$data = $this->db->get('rekaptulasi_provinsi');

			return $data;
		}
		
		public function notification()
    	{
    	    return $this->db->where("flag",1)->where("ms_berlaku < '".date('Y-m-d H:i:s')."'")->count_all_results("daftar_perusahaan");
    	}
		
	}
?>