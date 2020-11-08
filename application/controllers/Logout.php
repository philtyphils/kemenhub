<?php
	class Logout extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('login_model');
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->library('encrypt');
		}	
		public function index(){

			$this->session->unset_userdata("isLoggedIn");
			$this->session->unset_userdata("validUser");
			$this->session->unset_userdata("validPass");
			$this->session->unset_userdata("validLevel");
			$this->session->unset_userdata("validNama");
			$this->session->unset_userdata("validSession");
			$this->session->unset_userdata("validRole");
			$this->session->sess_destroy();
			$data['baseurl'] = base_url();
			$data['siteurl'] = site_url();
			$data['title'] = 'LOGIN';
			$this->load->view('templates/header',$data);
			$this->load->view('main/index',$data);
			$this->load->view('templates/footer',$data);
		}
	}
?>