<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

    var $table = 'daftar_perusahaan';
    var $column_order = array('a.id','a.nm_perusahaan','a.ksop_id','a.bdgusaha_id','a.kategori_id','a.lokasi','a.koordinat','a.ter_tuk','a.sk','a.tgl_terbit','a.status','a.ms_berlaku'); //set column field database for datatable orderable
    var $column_search = array('a.id','a.nm_perusahaan','c.nama','d.nama','e.nama','a.lokasi','a.koordinat','a.ter_tuk','a.sk','a.tgl_terbit','a.status','a.ms_berlaku'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id' => 'desc'); // default order 
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('a.*,b.name as nmprov,c.nama as nmksop,d.nama as nmusaha,e.nama as nmkateg');
        $this->db->from('daftar_perusahaan as a');
        $this->db->join('provinsi as b','a.provinsi_id=b.id','left');
        $this->db->join('ksop as c','a.ksop_id=c.ksop_id','left');
        $this->db->join('bdg_usaha as d','a.bdgusaha_id=d.bdg_usaha_id');
        $this->db->join('kategori as e','a.kategori_id=e.kategori_id','left');
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    //$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                //if(count($this->column_search) - 1 == $i) //last loop
                    //$this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_provinsi()
    {
        $this->db->from('wilayah');
        $this->db->where('length(kode) = 2');
        $this->db->order_by('kode','asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kategori()
    {
        $this->db->from('kategori');
        $this->db->order_by('kategori_id','asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_bidangusaha()
    {
        $this->db->from('bdg_usaha');
        $this->db->order_by('bdg_usaha_id','asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_Kota($id)
    {
        $where = "";
        if(count($id) > 0)
        {
            $query =" WHERE (";
            foreach($id as $p)
            {
                $query = $query." (substr(kode,1,2) =".$p. " and kode!='".$p."') OR ";
            }
            $query = substr($query,0,-4);
            $where = $query.")";
            
        }
        $sql ="SELECT * from wilayah ".$where;
        $query= $this->db->query($sql);
            
        return $query->result(); 
    }

    public function get_Kota2($id)
    {
        
        $sql ="SELECT * from wilayah where substr(kode,1,2) = '".$id."' and kode!='".$id."' and length(kode) = 5";
        $query= $this->db->query($sql);
            
        return $query->result(); 
    }

    public function get_Kecamatan($id)
    {
        
        $sql ="SELECT * from wilayah where substr(kode,1,5) = '".$id."' and kode!='".$id."'";
        $query= $this->db->query($sql);
            
        return $query->result(); 
    }

    public function get_Kecamatan2($id)
    {
        
        $sql ="SELECT * from wilayah where length(kode) = 8 and substr(kode,1,2) = '".$id."'";
        $query= $this->db->query($sql);
            
        return $query->result(); 
    }

    public function get_Kelurahan($id)
    {
        
        $sql ="SELECT * from wilayah where length(kode) = 13 and substr(kode,1,8) = '".$id."'";
        $query= $this->db->query($sql);
            
        return $query->result(); 
    }

    public function get_Kelas($id)
    {
        $where = "";
        if(count($id) > 0)
        {
            $query =" WHERE (";
            foreach($id as $p)
            {
                $query = $query." provinsi_id ='".$p."') OR ";
            }
            $query = substr($query,0,-4);
            $where = $query.")";
            
        }
        $sql ="SELECT * from ksop left join provinsi on ksop.provinsi_id=provinsi.id ".$where;
        $query= $this->db->query($sql);
            
        return $query->result(); 
    }

    public function get_Kelas2($id)
    {
       
        $sql ="SELECT * from ksop left join provinsi on ksop.provinsi_id=provinsi.id where provinsi_id ='".$id."'";
        $query= $this->db->query($sql);
            
        return $query->result(); 
    }

    function DMStoDD($deg,$min,$sec)
    {

        // Converting DMS ( Degrees / minutes / seconds ) to decimal format
        return $deg+((($min*60)+($sec))/3600);
    }    


    public function create($data)
    {
        $provinsi = explode("|", $data['provinsi']);
        $kecamatan = explode("|", $data['kecamatan']);
        $kelurahan = explode("|", $data['kelurahan']);
        // $provinsi_f = explode("|",$data['provinsi_f'][0]);
        // $kota_f = explode("|",$data['kota_f'][0]);
        // $kecamatan_f = explode("|",$data['kecamatan_f'][0]);

        $kantor = array($provinsi[1],$kecamatan[1],$kelurahan[1],$data['kodepos'],$data['contactperson'],$data['email']);

        // $lokasi = array($data['lokasi_f'][0],$provinsi_f[1],$kota_f[1],$kecamatan_f[1],$data['kelurahan_f'][0]); 

        // $koordinat =array($data['d_lat'][0]."°",$data['m_lat'][0]."'",$data['s_lat'][0].'"',$data['direction_lat'][0],"/ ".$data['d_long'][0]."°",$data['m_long'][0]."'",$data['s_long'][0].'"',$data['direction_long'][0]);

        // $koordinat_lat = $this->DMStoDD($data['d_lat'][0],$data['m_lat'][0],$data['s_lat'][0]);
        // $koordinat_long = $this->DMStoDD($data['d_long'][0],$data['m_long'][0],$data['s_long'][0]);

        $spek = "";
        // for($i=0;$i<count($data['dermaga']);$i++) 
        // {

        //     $data_spesifikasi =array ('TIPE:'.$data['dermaga'][$i].',',
        //                                 'SPESIFIKASI:'.$data['spesifikasi'][$i].',',
        //                                 'PERUNTUKAN:'.$data['peruntukan'][$i].',',
        //                                 'KEDALAMAN:'.$data['meter'][$i].'M LWS, ',
        //                                 'KAPASITAS:'.$data['kapasitas'][$i]." ".$data['satuan'][$i].' |');
        //     $spek = $spek.implode(" ",$data_spesifikasi);
        // };
        // $spek = substr($spek,0,-3);

// echo "<pre>";echo print_r($spek);
// die;
        for($j=0;$j<count($data['lokasi_f']);$j++)
        {

            $provinsi_f = explode("|",$data['provinsi_f'][$j]);
            $kota_f = explode("|",$data['kota_f'][$j]);
            $kecamatan_f = explode("|",$data['kecamatan_f'][$j]);

            $lokasi = array($data['lokasi_f'][$j],$provinsi_f[1],$kota_f[1],$kecamatan_f[1],$data['kelurahan_f'][$j]); 
            $koordinat =array($data['d_lat'][$j]."°",$data['m_lat'][$j]."'",$data['s_lat'][$j].'"',$data['direction_lat'][$j],"/ ".$data['d_long'][$j]."°",$data['m_long'][$j]."'",$data['s_long'][$j].'"',$data['direction_long'][$j]);
            $koordinat_lat = $this->DMStoDD($data['d_lat'][$j],$data['m_lat'][$j],$data['s_lat'][$j]);
            $koordinat_long = $this->DMStoDD($data['d_long'][$j],$data['m_long'][$j],$data['s_long'][$j]);

            for($i=0;$i<count($data['dermaga']);$i++) 
            {


                $data_spesifikasi =array ('TIPE:'.$data['dermaga'][$i].',',
                                            'SPESIFIKASI:'.$data['spesifikasi'][$i].',',
                                            'PERUNTUKAN:'.$data['peruntukan'][$i].',',
                                            'KEDALAMAN:'.$data['meter'][$i].'M LWS, ',
                                            'KAPASITAS:'.$data['kapasitas'][$i]." ".$data['satuan'][$i].' |');
                $spek = $spek.implode(" ",$data_spesifikasi);
            };
            $spek = substr($spek,0,-2);

            $data2 = array ('nm_perusahaan' => $data['name'],  
                        'provinsi_id' => $provinsi[0],
                        'bdgusaha_id' => $data['bidangusaha'][$j],
                        'ksop_id' => $data['kelas'][$j],
                        'alamat' => implode(" ", $kantor),
                        'lokasi' => implode(" ", $lokasi),
                        'koordinat' => implode(" ",$koordinat),
                        'koordinat_dd' => $koordinat_long." ".$koordinat_lat,
                        'k_lat' => $koordinat_lat,
                        'k_long' => $koordinat_long,
                        'spesifikasi' => $spek,
                        'sk' => $data['nosk'][$j],
                        'ter_tuk' => $data['tersus_tuks'][$j],
                        'status' => $data['status'][$j],
                        'tgl_terbit' => date("Y-m-d", strtotime($data['tgl_terbit'][$j])),
                        'ms_berlaku' => date("Y-m-d", strtotime($data['tgl_akhir'][$j]))

                        );            

            $exec = $this->db->insert('daftar_perusahaan', $data2);


        };

//         echo "<pre>";echo print_r($spek);
// die;

        // $data2 = array ('nm_perusahaan' => $data['name'],  
        //                 'provinsi_id' => $provinsi[0],
        //                 'bdgusaha_id' => $data['bidangusaha'][0],
        //                 'ksop_id' => $data['kelas'][0],
        //                 'alamat' => implode(" ", $kantor),
        //                 'lokasi' => implode(" ", $lokasi),
        //                 'koordinat' => implode(" ",$koordinat),
        //                 'koordinat_dd' => $koordinat_long." ".$koordinat_lat,
        //                 'k_lat' => $koordinat_lat,
        //                 'k_long' => $koordinat_long,
        //                 'spesifikasi' => $spek,
        //                 'sk' => $data['nosk'][0],
        //                 'ter_tuk' => $data['tersus_tuks'][0],
        //                 'status' => $data['status'][0],
        //                 'tgl_terbit' => date("Y-m-d", strtotime($data['tgl_terbit'][0])),
        //                 'ms_berlaku' => date("Y-m-d", strtotime($data['tgl_akhir'][0]))

        //                 );            

        // $exec = $this->db->insert('daftar_perusahaan', $data2);
        return $exec;


        
    }

    public function _getSingleData($id)
    {
        $data       = $this->db->where("id",$id)->get("daftar_perusahaan")->row();
        $kecamatan  = $this->db->where("substr(kode,1,2)",$data->provinsi_id)->where("LENGTH(kode)",5)->get("wilayah")->result();
        $kelurahan  = $this->db->where("substr(kode,1,2)",$data->provinsi_id)->where("LENGTH(kode)>5")->get("wilayah")->result();
        return array(
            "data" => $data,
            "kecamatan" => $kecamatan,
            "kelurahan" => $kelurahan
        );
    }

}