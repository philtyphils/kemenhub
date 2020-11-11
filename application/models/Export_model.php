<?php
	class Export_model extends CI_Model {
		public function __construct(){
			$this->load->database();	
        }
        

        public function getProvinsi()
        {
            $data = $this->db->where("LENGTH(kode)",2)->get('wilayah');
            return $data;
        }

        public function getData($provinsi_id,$kategori_id,$wilayah_kerja)
        {
            $no = 0;
            if(count($kategori_id) > 0)
            {
                foreach($provinsi_id as $p)
                {
                    if($no > 0)
                    {
                        $this->db->or_where("daftar_perusahaan.provinsi_id",$p);
                    }
                    else
                    {
                        $this->db->where("daftar_perusahaan.provinsi_id",$p);
                    }
                    $no++;
                }
            }
            
            if(count($kategori_id) > 0)
            {
                foreach($kategori_id as $k)
                {
                    $this->db->where("daftar_perusahaan.kategori_id",$k);
                }
            }

            if(count($wilayah_kerja) > 0)
            {
                foreach($wilayah_kerja as $w)
                {
                    $this->db->where("daftar_perusahaan.bdgusaha_id",$w);
                }
            }

            $this->db->where("LENGTH(wilayah.kode)","2");
            $this->db->join("wilayah","daftar_perusahaan.provinsi_id=wilayah.kode");
            $this->db->join("ksop","daftar_perusahaan.ksop_id=ksop.ksop_id");
            $this->db->join("bdg_usaha","daftar_perusahaan.bdgusaha_id=bdg_usaha.bdg_usaha_id");
            $this->db->join("kategori","daftar_perusahaan.kategori_id=kategori.kategori_id");
            $this->db->select("
                wilayah.nama as provinsi,
                ksop.nama as wilayah_kerja,
                daftar_perusahaan.nm_perusahaan as perusahaan,
                bdg_usaha.nama as bidang_usaha,
                kategori.nama as kategori,
                daftar_perusahaan.lokasi as lokasi,
                daftar_perusahaan.alamat as alamat,
                daftar_perusahaan.png_jwb as png_jwb,
                daftar_perusahaan.npwp as npwp,
                daftar_perusahaan.koordinat_dd as koordinat,
                daftar_perusahaan.ter_tuk as ter_tuk,
                daftar_perusahaan.spesifikasi as spesifikasi,
                daftar_perusahaan.sk as legalitas,
                daftar_perusahaan.tgl_terbit as tgl_terbit,
                daftar_perusahaan.status as status,
                daftar_perusahaan.ms_berlaku as ms_berlaku
            ");
            $this->db->order_by("daftar_perusahaan.provinsi_id","asc");
            $this->db->order_by("daftar_perusahaan.ksop_id","asc");
            $data = $this->db->get("daftar_perusahaan");
            return $data;
        }
		
		
	}
?>