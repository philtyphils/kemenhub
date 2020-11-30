<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master_User_Model','master');
		$this->load->model('Dashboard_Model','dashboard');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encryption');
		
	}
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
	public function index()
	{		
		$data['title'] = 'Master';
		$data['menu'] = 'Master';
		$data['baseurl'] = base_url();
		$data['siteurl'] = site_url();
<<<<<<< HEAD

		$f = $this->master->wilayah_kerja_chart();
		$x = $this->master->bdg_usaha_chart();
		$total_rekap = $this->dashboard->getallstatus()->result();
	
		
		$nmksop 		= array();
=======


		$f = $this->master->wilayah_kerja_chart();
		$x = $this->master->bdg_usaha_chart();


		$nmksop 	= array();
>>>>>>> aa3e4c89bf32bbd3ee0e10c74449d494d841f3c3
		$wilayah_kerja 	= array();
		foreach ($f as $key => $value)
		{
			$nmksop[] 			=  $value->wilayah_kerja;
			$wilayah_kerja[] 	= (int) $value->TOTAL;
		}

		$nmbidang_usaha = array();
		$bidang_usaha 	= array();
		foreach ($x as $key =>$value)
		{
			$nmbidang_usaha[] =  $value->bidang_usaha;
			$bidang_usaha[]   = (int) $value->TOTAL;
		}

		$provinsi = array();
		$tuks_aktif = array();
		$tersus_aktif = array();
		$tuks_nonaktif = array();
		$tersus_nonaktif = array();
		foreach ($total_rekap as $key => $value)
		{
			$provinsi[] =  $value->provinsi;
			$tersus_nonaktif[] = (int) $value->TERSUS_NONAKTIF;
			$tersus_aktif[] = (int) $value->TERSUS_AKTIF;
			$tuks_aktif[] = (int) $value->TUKS_AKTIF;
			$tuks_nonaktif[] = (int) $value->TUKS_NONAKTIF;
			
		}
	

		$kat_chart 		= json_encode($this->master->kategori_chart());

		$data['nmksop'] 		= json_encode($nmksop);		
		$data['wilayah_kerja'] 	= json_encode($wilayah_kerja);
		$data['nmbidang_usaha'] = json_encode($nmbidang_usaha);		
		$data['bidang_usaha'] 	= json_encode($bidang_usaha);
<<<<<<< HEAD
		
	
		$data['provinsi'] = json_encode($provinsi);
		
		$data['tuks_aktif'] = json_encode($tuks_aktif);
		$data['tuks_nonaktif'] = json_encode($tuks_nonaktif);
		$data['tersus_aktif'] = json_encode($tersus_aktif);
		$data['tersus_nonaktif'] = json_encode($tersus_nonaktif);
=======
		$data['kategori_chart'] = $kat_chart;
		$data['notification']	= $this->master->notification();
>>>>>>> aa3e4c89bf32bbd3ee0e10c74449d494d841f3c3
		

		$data['kategori_chart'] = $kat_chart;
	
		$this->load->view('templates/header',$data);
		$this->load->view('main/master',$data);
		
	}

	
	
	// public function getDataRole()
	// {
	// 	$ID_USER = trim($this->input->post('USER_ID'));
	// 	$cek=$this->Home_model->getDataRole($ID_USER);
	// 	echo json_encode($cek);
	// }
	
}
