<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_Model','datax');
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
		$data['title'] = 'Data';
		$data['menu'] = 'Data';
		$data['baseurl'] = base_url();
		$data['siteurl'] = site_url();
		$data['dataProvinsi'] = $this->datax->get_provinsi();
		$data['dataBdgUsaha'] = $this->datax->get_bidangUsaha();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/hmenu',$data);
		$this->load->view('main/data',$data);
		$this->load->view('templates/footer',$data);
		
		// $isLoggedIn = $this->session->userdata("isLoggedIn");
		// $validUser = $this->session->userdata("validUser");
		// $validPass = $this->session->userdata("validPass");
		// $validLevel = $this->session->userdata("validLevel");
		// $validNama = $this->session->userdata("validNama");
		// $validSession = $this->session->userdata("validSession");
		// $validRole = $this->session->userdata("validRole");

		// if(!$isLoggedIn){
		// 	$data['title'] = 'LOGIN';
		// 	$this->load->view('templates/header',$data);
		// 	$this->load->view('main/index',$data);
		// 	$this->load->view('templates/footer',$data);
		// }else{
		// 	$data['judul'] = 'HOME';
		// 	$data['validUser'] = $validUser;
		// 	$data['validNama'] = $validNama;
		// 	$data['menu']='';
		// 	$data['validUser']=$validUser;
		// 	$data['validSession']=$validSession;
		// 	$data['validLevel']=$validLevel;
		// 	$this->load->view('templates/header',$data);
		// 	$this->load->view('templates/hmenu',$data);
		// 	$this->load->view('main/frmhome',$data);
		// 	$this->load->view('templates/footer',$data);
			
		// }
	}

	public function ajax_list()
    {
        // $isLoggedIn = $this->session->userdata("isLoggedIn");
        // if($isLoggedIn){
            $list = $this->datax->get_datatables();
            $data = array();
            $no = $_POST['start'];
            $i=1;
            foreach ($list as $datax) {
                $no++;
                $row = array();

                $row[] = trim($datax->id);
                $row[] = trim($datax->nm_perusahaan);
                $row[] = trim($datax->nmksop);
                $row[] = trim($datax->nmusaha);
                $row[] = trim($datax->nmkateg);
                $row[] = trim($datax->lokasi);
                $row[] = trim($datax->koordinat);
                $row[] = trim($datax->ter_tuk);
                $row[] = trim($datax->sk);
                $row[] = trim($datax->tgl_terbit);
                $row[] = trim($datax->status);
                $row[] = trim($datax->tgl_terbit);
                
                //add html for action
                $row[] = '<a class="btn btn-simple btn-warning btn-icon btnedit" href="javascript:void(0)" title="Ubah" onclick="edit_Datax('."'".$datax->id."'".')"><i class="fa fa-edit"></i></a>
                <a class="btn btn-simple btn-danger btn-icon btndelete" href="javascript:void(0)" title="Hapus" onclick="delete_Datax('."'".$datax->id."'".')"><i class="fa fa-times"></i></a>';
                
                $data[] = $row;
            }
            
            $output = array(
                            "draw" => $_POST['draw'],
                            "recordsTotal" => $this->datax->count_all(),
                            "recordsFiltered" => $this->datax->count_filtered(),
                            "data" => $data,
                    );
            //output to json format
            echo json_encode($output);
        // }else{

            
            
        // }
    }
	
	public function get_selKelas()
	{
		$html='';
  //       $provinsi = $this->input->post('provinsi');
		// $data = array('provinsi' => $provinsi);
        

  //       $dataprov = $this->datax->get_selKelas($data);
  //       foreach ($dataprov as $list) {
  //            $html .= '<option value="'.trim($list->provinsi_id).'">'.trim($list->nama).'</option>';
  //       }         


        if(isset($_POST["selected"]))
		{
			$id = join("','", $_POST["selected"]);

			$dataprov = $this->datax->get_selKelas($id);
			foreach ($dataprov as $list) {
	             $html .= '<option value="'.trim($list->provinsi_id).'">'.trim($list->nama).'</option>';
	        }
	        echo json_encode($html); 
		}  

        
	}

	// public function getDataRole()
	// {
	// 	$ID_USER = trim($this->input->post('USER_ID'));
	// 	$cek=$this->Home_model->getDataRole($ID_USER);
	// 	echo json_encode($cek);
	// }
	
}
