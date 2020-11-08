<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_User extends CI_Controller 
{
	var $ID_MENU = 7;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master_User_model','user');
		$this->load->model('Home_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
		//include("../service_billing/application/libraries/cryptojs-aes.php");
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
		$data=array();
		$data['title'] = 'Master User';
		$data['baseurl'] = base_url();
		$data['siteurl'] = site_url();
		
		$isLoggedIn = $this->session->userdata("isLoggedIn");
		$validUser = $this->session->userdata("validUser");
		$validPass = $this->session->userdata("validPass");
		$validLevel = $this->session->userdata("validLevel");
		$validNama = $this->session->userdata("validNama");
		$validSession = $this->session->userdata("validSession");
		$validRole = $this->session->userdata("validRole");

		if(!$isLoggedIn){
			$data['title'] = 'LOGIN';
			$this->load->view('templates/header',$data);
			$this->load->view('main/index',$data);
			$this->load->view('templates/footer',$data);
		}else{
			$checkrole = $this->Home_model->checkRole($validUser,$this->ID_MENU,"`READ`");
            if($checkrole==1){
				if($validLevel!=1){
					
					$data['judul'] = 'Master User';
					$data['validUser'] = $validUser;
					$data['validNama'] = $validNama;
					$data['menu']='';
					$data['validSession']=$validSession;
					$data['validLevel']=$validLevel;	
					$this->load->view('templates/header',$data);
					$this->load->view('templates/hmenu',$data);
					$this->load->view('main/FrmMaster_User',$data);
					$this->load->view('templates/footer',$data);
				}else{
					redirect(site_url()."/logout");
				}
			}else{
				redirect(site_url()."/home");
			}
			
			
		}

		
	}
	 public function ajax_list()
    {
        $isLoggedIn = $this->session->userdata("isLoggedIn");
        if($isLoggedIn){
            $list = $this->user->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $user) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = trim($user->userid);
                $row[] = trim($user->usernm);
                $row[] = trim($user->userlvl);

                if(trim($user->status)==0){
                    $status = '<label class="label label-success">AKTIF</label>';
                }else{
                    $status = '<label class="label label-danger">NON AKTIF</label>';
                }
                $row[] = $status;
     
                //add html for action
                $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_User('."'".trim($user->userid)."','".trim($user->usernm)."','".trim($user->email)."','".trim($user->userlvl)."','".trim($user->status)."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="HapusX" onclick="delete_User('."'".trim($user->userid)."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
     
                $data[] = $row;
            }
     
            $output = array(
                            "draw" => $_POST['draw'],
                            "recordsTotal" => $this->user->count_all(),
                            "recordsFiltered" => $this->user->count_filtered(),
                            "data" => $data,
                    );
            //output to json format
            echo json_encode($output);
        }else{
            $data['title'] = 'Login';
            $this->load->view('templates/header',$data);
            $this->load->view('main/index',$data);
        }
    }
 
    public function ajax_edit($id,$pry)
    {
        $isLoggedIn = $this->session->userdata("isLoggedIn");
        if($isLoggedIn){
            $data = $this->user->get_by_id($id,$pry);
            echo json_encode($data);
        }else{
            $data['title'] = 'Login';
            $this->load->view('templates/header',$data);
            $this->load->view('main/index',$data);
        }
    }
 
    public function ajax_add()
    {
        $isLoggedIn = $this->session->userdata("isLoggedIn");
        if($isLoggedIn){
            $options = [
                'cost' => 12,
            ];
            $pass = $this->input->post('password');
            $data = array(
                    'USERID' => trim($this->input->post('iduser')),
                    'USERNM' => trim($this->input->post('nmuser')),
                    'EMAIL' => trim($this->input->post('email')),
                    'USERLVL' => trim($this->input->post('level')),
                    'PASSWORD' => password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options),
                    'LOCK' => trim($this->input->post('lock'))
                );
            $insert = $this->user->save($data);
            if($insert)
            {
            	$msg="OK";
            }else{
            	$msg="GAGAL";
            }
            echo ($msg);
        }else{
            $data['title'] = 'Login';
            $this->load->view('templates/header',$data);
            $this->load->view('main/index',$data);
        }
    }
 
    public function ajax_update()
    {
        $isLoggedIn = $this->session->userdata("isLoggedIn");
        if($isLoggedIn){
            $data = array(
                    'USERNM' => $this->input->post('nmuser'),
                    'USERLVL' => $this->input->post('level'),
                    'LOCK' => $this->input->post('lock'),
                    'EMAIL' => $this->input->post('email')
                );

           $update = $this->user->update(array('USERID' => $this->input->post('iduser')), $data);
            if($update)
            {
            	$msg="OK";
            }else{
            	$msg="GAGAL";
            }
            echo ($msg);
        }else{
            $data['title'] = 'Login';
            $this->load->view('templates/header',$data);
            $this->load->view('main/index',$data);
        }
    }
 
    public function ajax_delete()
    {
        $isLoggedIn = $this->session->userdata("isLoggedIn");
        if($isLoggedIn){
        	$id=trim($this->input->post('iduser'));
            $delete = $this->user->delete_by_id($id);
           	if($delete)
            {
            	$msg="OK";
            }else{
            	$msg="GAGAL";
            }
            echo ($msg);
        }else{
            $data['title'] = 'Login';
            $this->load->view('templates/header',$data);
            $this->load->view('main/index',$data);
        }
    }
	
	
}
