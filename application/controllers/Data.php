<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_Model','datax');
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
		$data['title'] = 'Data';
		$data['menu'] = 'Data';
		$data['baseurl'] = base_url();
		$data['siteurl'] = site_url();
		$data['dataProvinsi'] = $this->datax->get_provinsi();
		$data['dataKateg'] = $this->datax->get_kategori();
		$data['dataBdgUsaha'] = $this->datax->get_bidangusaha();
		$trigger ='';
		$trigger 		= $this->input->post('trigger');
		$namaPerusahaan = $this->input->post('name');
		$provinsi 		= $this->input->post('provinsi');
		$kota 			= $this->input->post('kota');
		$kelas 			= $this->input->post('kelas');
		$kategori 		= $this->input->post('kategori');
		$bidangusaha 	= $this->input->post('bidangusaha');
		$dermaga 		= $this->input->post('dermaga');
		$meter 			= $this->input->post('meter');
		$kapasitas 		= $this->input->post('kapasitas');
		$tukter 		= $this->input->post('tuk_ter');
		$status 		= $this->input->post('status');
		$tglakhir 		= $this->input->post('tgl_akhir');
		$tuks_aktif 	= array();
		$tersus_aktif 	= array();

		$r = $this->dashboard->status_aktif()->result();

		$tersus = array(
			array(
				"name" => "AKTIF",
				"y"    => (int) $r[0]->TERSUS_AKTIF
			),
			array(
				"name" => "NON AKTIF",
				"y"	   => (int) $r[0]->TERSUS_NONAKTIF
			)
		);

		$tuks = array(
			array(
				"name" => "AKTIF",
				"y"    => (int) $r[0]->TUKS_AKTIF
			),
			array(
				"name" => "NON AKTIF",
				"y"	   => (int) $r[0]->TUKS_NONAKTIF
			)
		);

		if($trigger){
			/* set session data for exporting */
			$this->session->set_userdata("nm_perusahaan",$namaPerusahaan);
			$this->session->set_userdata("provinsi",$provinsi);
			$this->session->set_userdata("kota",$kota);
			$this->session->set_userdata("kelas",$kelas);
			$this->session->set_userdata("kategori",$kategori);
			$this->session->set_userdata("bidangusaha",$bidangusaha);
			$this->session->set_userdata("meter",$meter);
			$this->session->set_userdata("kapasitas",$kapasitas);
			$this->session->set_userdata("tukter",$tukter);
			$this->session->set_userdata("status",$status);
			$this->session->set_userdata("tglakhir",$tglakhir);

	

			$this->db->select('a.*,b.name as nmprov,c.nama as nmksop,d.nama as nmusaha,e.nama as nmkateg');
	        $this->db->from('daftar_perusahaan as a');
	        $this->db->join('provinsi as b','a.provinsi_id=b.id','left');
	        $this->db->join('ksop as c','a.ksop_id=c.ksop_id','left');
	        $this->db->join('bdg_usaha as d','a.bdgusaha_id=d.bdg_usaha_id');
	        $this->db->join('kategori as e','a.kategori_id=e.kategori_id','left');
			if($namaPerusahaan != ''){
				$this->db->like('a.nm_perusahaan', $namaPerusahaan);
			}
			
			if(count($provinsi) > 0)
            {
                $query ="(";
                foreach($provinsi as $k)
                {
                    $query = $query."a.provinsi_id=".$k. " OR ";
                }
                $query = substr($query,0,-4);
                $query= $query.")";
                $this->db->where($query);
			}
			
			if($kota != '')
			{
				$this->db->like('a.lokasi', $kota);		
			}
			if($kelas != '')
			{
				$this->db->where('a.ksop_id', $kelas);	
			}
			if(count($kategori) > 0)
            {
                $query ="(";
                foreach($kategori as $k)
                {
                    $query = $query."a.kategori_id=".$k. " OR ";
                }
                $query = substr($query,0,-4);
                $query= $query.")";
                $this->db->where($query);
            }
			// for($i = 0; $i < count($kategori); $i++){
			// 	$this->db->or_like('a.kategori_id', $kategori[$i]);
			// }
			if(count($bidangusaha) > 0)
            {
                $query ="(";
                foreach($bidangusaha as $b)
                {
                    $query = $query."a.bdgusaha_id=".$b. " OR ";
                }
                $query = substr($query,0,-4);
                $query= $query.")";
                $this->db->where($query);
            }
			// for($j = 0; $j < count($bidangusaha); $j++){
			// 	$this->db->or_like('a.bdgusaha_id', $bidangusaha[$j]);
			// }
			if($dermaga != ''){
				$this->db->like('a.spesifikasi', $dermaga);
			}
			if($meter != ''){
				$this->db->like('a.spesifikasi', $meter);
			}
			if($kapasitas != ''){
				$this->db->like('a.spesifikasi', $kapasitas);
			}
			if($tukter != ''){
				$this->db->where('a.ter_tuk', $tukter);
			}
			if($status != ''){
				$this->db->where('a.status', $status);
			}
			if($tglakhir != ''){
				$tgl =explode("-", $tglakhir);
				$t = $tgl[1].'-'.$tgl[0];
				$this->db->where('substr(a.tgl_terbit,1,7)', $t);
			}
			$return 		= $this->db->get()->result();
			$data['jumlah'] = count($return);
			$data['company'] = $return;
			$this->load->view('templates/header',$data);
			$this->load->view('main/data',$data);
		} else {
			$this->db->select('a.*,b.name as nmprov,c.nama as nmksop,d.nama as nmusaha,e.nama as nmkateg');
	        $this->db->from('daftar_perusahaan as a');
	        $this->db->join('provinsi as b','a.provinsi_id=b.id','left');
	        $this->db->join('ksop as c','a.ksop_id=c.ksop_id','left');
	        $this->db->join('bdg_usaha as d','a.bdgusaha_id=d.bdg_usaha_id');
			$this->db->join('kategori as e','a.kategori_id=e.kategori_id','left');
			
			$this->db->where('a.flag',1);
			$this->db->order_by('a.provinsi_id','asc');
			$this->db->order_by('a.nm_perusahaan','asc');
			$return 		= $this->db->get()->result();
			$data['jumlah'] = count($return);
			$data['company'] = $return;
			$data['tuks'] = json_encode($tuks);		
			$data['tersus'] = json_encode($tersus);
			$this->load->view('templates/header',$data);
			$this->load->view('main/data',$data);
		}
	
	}
	
	public function get_Kota()
	{
		$html='';
		$provinsi = $this->input->post('provinsi');
		$dataprov = $this->datax->get_Kota($provinsi);
		
        $html .='<option value="" readonly>Pilih Kabupaten / Kota</option>';
        foreach ($dataprov as $list) {
         $html .= '<option value="'.trim($list->nama).'">'.trim($list->nama).'</option>';
        }
	    echo json_encode($html); 
	} 

	public function get_Kelas()
	{
		$html='';
        $kelas = $this->input->post('kota');

        $datakelas = $this->datax->get_Kelas($kelas);
        $html .='<option value="">Pilih Wilayah Kerja</option>';
        foreach ($datakelas as $list) {
             $html .= '<option value="'.trim($list->ksop_id).'">'.trim($list->nama).'</option>';
        	}
	        echo json_encode($html); 
	} 
	

	public function getData()
	{
		var_dump('bambaaaan');
		$data['title'] = 'Data';
		$data['menu'] = 'Data';
		$data['baseurl'] = base_url();
		$data['siteurl'] = site_url();
		$data['dataProvinsi'] = $this->datax->get_provinsi();
		$data['dataKateg'] = $this->datax->get_kategori();
		$data['dataBdgUsaha'] = $this->datax->get_bidangusaha();
		$namaPerusahaan = $this->input->post('name');
		$this->db->from('daftar_perusahaan');
		$this->db->like('nm_perusahaan', $namaPerusahaan);
		$data['company'] = $this->db->get()->result();

		$this->load->view('templates/header',$data);
		$this->load->view('main/data',$data);
  		//       $name = trim($this->input->post('name'));
		// $provinsi = trim($this->input->post('provinsi'));
		// $kota = trim($this->input->post('kota'));
		// $kelas = trim($this->input->post('kelas'));
		// $kategori = trim($this->input->post('kategori'));
		// $bidangusaha = $this->input->post('bidangusaha');
		// $dermaga = trim($this->input->post('dermaga'));
		// $meter = trim($this->input->post('meter')); 
		// $kapasitas = trim($this->input->post('kapasitas'));
		// $tuk_ter = trim($this->input->post('tuk_ter'));
		// $status = trim($this->input->post('status'));
		// $tgl_akhir = trim($this->input->post('tgl_akhir'));

		// $cek=$this->datax->getData($name,$provinsi,$kota,$kelas,$kategori,$bidangusaha,$dermaga,$meter,$kapasitas,$tuk_ter,$status,$tgl_akhir);
		// echo json_encode($cek);

		// $html ="";
		// $param1 = $this->security->xss_clean($this->input->post("param"));
		// $data = $this->datax->getData($param1);

		// $i=1;
            
        // foreach($data as $row)
        // {
        //    	$html .="<tr role='row'>";
        //    	$html .="<td>".$i."</td>";
        //     $html .="<td><font style='font-weight: bold;'>".trim($row->nm_perusahaan)."</font></td>";
        //    	$html .="<td><font class='td-status2'>".trim($row->alamat)."</font></td>";
        //     $html .="<td>".$row->nmksop."</td>";
        //     // $html .="<td>".$row['nmprov']."</td>";
        //     $html .="<td>".$row->nmusaha."</td>";
        //     $html .="<td>".$row->nmkateg."</td>";
        //     $html .="<td>".trim($row->lokasi)."</td>";
        //     $html .="<td>".trim($row->koordinat)."</td>";
        //     $html .="<td>".trim($row->spesifikasi)."</td>";
        //     if(trim($row->ter_tuk)=='TUKS')
        //     {
        //         $html .="<td><font class='td-status' style='color: #A3A0FB;'>".trim($row->ter_tuk)."</font></td>";
        //     }else{
        //         $html .="<td>.<font class='td-status' style='color: #6bd189;'>".trim($row->ter_tuk)."</font></td>";
        //     }

        //     $html .="<td>".trim($row->sk)."</td>";
        //     $html .="<td>".date('d-m-Y', strtotime(trim($row->tgl_terbit)))."</td>";
        //     if(trim($row->status)=='Y')
        //     {
        //         $html .="<td><font class='td-status' style='color: #649e07;'>AKTIF</font></td>";
        //     }else{
        //         $html .="<td><font class='td-status' style='color: red;'>TIDAK AKTIF</font></td>";                
        //     }
        //     $html .="<td>".date('d-m-Y', strtotime(trim($row->ms_berlaku)))."</td>";
        //     $html .='<td><a class="btn btn-simple btn-warning btn-icon btnedit" href="javascript:void(0)" title="Ubah" onclick="edit_Datax('."'".$row->id."'".')"><i class="fa fa-edit"></i></a>
        //         <a class="btn btn-simple btn-danger btn-icon btndelete" href="javascript:void(0)" title="Hapus" onclick="delete_Datax('."'".$row->id."'".')"><i class="fa fa-times"></i></a></td>';
		// 	$html .='</tr>';
			
        //     $i++;
        
        // }  
        
        // echo json_encode($html);
		
	}


	// public function getDataRole()
	// {
	// 	$ID_USER = trim($this->input->post('USER_ID'));
	// 	$cek=$this->Home_model->getDataRole($ID_USER);
	// 	echo json_encode($cek);
	// }
	
}
?>
