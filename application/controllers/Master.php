<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master_User_Model','master');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
		
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
		$kat_chart = json_encode($this->master->kategori_chart());
		$wilayah_kerja = json_encode($this->master->wilayah_kerja_chart());
		$bidang_usaha = json_encode($this->master->bdg_usaha_chart());
		$data['kategori_chart'] = $kat_chart;
		$data['wilayah_kerja'] = $wilayah_kerja;
		$data['bidang_usaha'] = $bidang_usaha;
		$data['notification']	= $this->master->notification();	

		

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
