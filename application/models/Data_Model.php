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

    public function create($data)
    {
        $provinsi = explode("|", $data['provinsi']);
        $kecamatan = explode("|", $data['kecamatan']);
        $kelurahan = explode("|", $data['kelurahan']);
        $provinsi_f = explode("|",$data['provinsi_f'][0]);
        $kota_f = explode("|",$data['kota_f'][0]);
        $kecamatan_f = explode("|",$data['kecamatan_f'][0]);

        $kantor = array($provinsi[1],$kecamatan[1],$kelurahan[1],$data['kodepos'],$data['contactperson'],$data['email']);
        $lokasi = array($data['lokasi_f'][0],$provinsi_f[1],$kota_f[1],$kecamatan_f[1],$data['kelurahan_f'][0]); 
        // $koordinat_lat = array($data['d_lat'][0]."°",$data['m_lat'][0]."'",$data['s_lat'][0].'"',$data['direction_lat'][0]);
        // $koordinat_long = array($data['d_long'][0]."°",$data['m_long'][0]."'",$data['s_long'][0].'"',$data['direction_long'][0]);
        $koordinat =array($data['d_lat'][0]."°",$data['m_lat'][0]."'",$data['s_lat'][0].'"',$data['direction_lat'][0],"/ ".$data['d_long'][0]."°",$data['m_long'][0]."'",$data['s_long'][0].'"',$data['direction_longx'][0]);
        // $spesifikasi = array('Tipe:'.$data['dermaga'][0],'Spesifikasi:'.$data['spesifikasi'][0],'Peruntukan:'.$data['peruntukan'][0],'Meter:'.$data['meter'][0],'Kapasitas:'.$data['kapasitas'][0],'Satuan:'.$data['satuan'][0]);



        for($i=0;$i<sizeof($data['dermaga']);$i++) 
        {

            $data_spesifikasi =array ('Tipe:' => $data['dermaga'][$i],
                                        'Spesifikasi:' => $data['spesifikasi'][$i],
                                        'Peruntukan:'=> $data['peruntukan'][$i],
                                        'Meter:' => $data['meter'][$i],
                                        'Kapasitas:' => $data['kapasitas'][$i],
                                        'Satuan:'=> $data['satuan'][$i].' |');  

        };

        var_dump($data_spesifikasi);
die();

        $data2 = array ('nm_perusahaan' => $data['name'],  
                        'provinsi_id' => $provinsi[0],
                        'bdgusaha_id' => $data['bidangusaha'][0],
                        'ksop_id' => $data['kelas'][0],
                        'alamat' => implode(" ", $kantor),
                        'lokasi' => implode(" ", $lokasi),
                        'koordinat' => implode(" ",$koordinat),
                        'spesifikasi' => $data_spesifikasi,
                        'sk' => $data['nosk'][0]."".$data['jenissk'][0],
                        'ter_tuk' => $data['tersus_tuks'][0],
                        'status' => $data['status'][0],
                        'tgl_terbit' => date("Y-m-d", strtotime($data['tgl_terbit'][0])),
                        'ms_berlaku' => date("Y-m-d", strtotime($data['tgl_akhir'][0]))

                        );            

        $exec = $this->db->insert('daftar_perusahaanx', $data2);
        return $exec;


        
    }


    // public function getData($name,$provinsi,$kota,$kelas,$kategori,$bidangusaha,$dermaga,$meter,$kapasitas,$tuk_ter,$status,$tgl_akhir)
    // {
            
    //     $arrayHasil=array();
    //     $counter=0;
    //     $html = "";

    //     $sql ="SELECT a.*, b.name as nmprov,c.nama as nmksop,d.nama as nmusaha,e.nama as nmkateg from daftar_perusahaan as a left join provinsi as b on a.provinsi_id=b.id left join ksop as c on a.ksop_id=c.ksop_id left join bdg_usaha as d on a.bdgusaha_id=d.bdg_usaha_id left join kategori as e on a.kategori_id=e.kategori_id where a.nm_perusahaan like('%".$name."%') AND a.provinsi_id like('%".$provinsi."%') AND a.ksop_id like('%".$kelas."%') AND a.kategori_id like('%".$kategori."%') AND a.bdgusaha_id like('%".$bidangusaha."%') order by nm_perusahaan ASC ";
        

    //      // $sql ="SELECT a.*, b.name as nmprov,c.nama as nmksop,d.nama as nmusaha,e.nama as nmkateg from daftar_perusahaanx as a left join provinsi as b on a.provinsi_id=b.id left join ksop as c on a.ksop_id=c.ksop_id left join bdg_usaha as d on a.bdgusaha_id-d.bdg_usaha_id left join kategori as e on a.kategori_id=e.kategori_id where a.nm_perusahaan like('%".$name."%') AND a.provinsi_id like('%".$provinsi."%') AND a.lokasi like('%".$kota."%') AND a.ksop_id like('%".$kelas."%') AND a.kategori_id like('%".$kategori."%') AND a.bdgusaha_id like('%".$bidangusaha."%') AND a.spesifikasi like('%".$dermaga."%') AND a.spek_kedalaman like('%".$meter."%') AND a.spek_kapasitas like('%".$kapasitas."%') AND a.ter_tuk like('%".$tuk_ter."%') AND a.status like('%".$status."%') AND a.ms_berlaku like('%".$tgl_akhir."%')  order by nm_perusahaan ASC ";


    //     $sql1 = $this->db->query($sql);
        
        

    //     if($sql1->num_rows()>0){
    //         foreach ($sql1->result_array() as $row){
    //             $arrayHasil[$counter]['no'] = ($counter+1);
    //             $arrayHasil[$counter]['id'] = trim($row['id']);
    //             $arrayHasil[$counter]['nm_perusahaan'] = "<font style='font-weight: bold;'>".trim($row['nm_perusahaan'])."</font>";
    //             $arrayHasil[$counter]['alamat'] = "<font class='td-status2'>".trim($row['alamat'])."</font>";
    //             $arrayHasil[$counter]['ksop_id'] = $row['nmksop'];
    //             $arrayHasil[$counter]['provinsi_id'] = $row['nmprov'];
    //             $arrayHasil[$counter]['bdgusaha_id'] = $row['nmusaha'];
    //             $arrayHasil[$counter]['lokasi'] = trim($row['lokasi']);
    //             $arrayHasil[$counter]['kategori_id'] = $row['nmkateg'];
    //             $arrayHasil[$counter]['koordinat'] = trim($row['koordinat']);
    //             if(trim($row['ter_tuk'])=='TUKS')
    //             {
    //                 $arrayHasil[$counter]['ter_tuk'] = "<font class='td-status' style='color: #A3A0FB;'>".trim($row['ter_tuk'])."</font>";
    //             }else{
    //                 $arrayHasil[$counter]['ter_tuk'] = "<font class='td-status' style='color: #6bd189;'>".trim($row['ter_tuk'])."</font>";
    //             }

    //             $arrayHasil[$counter]['sk'] = trim($row['sk']);
    //             $arrayHasil[$counter]['tgl_terbit'] = date('d-m-Y', strtotime(trim($row['tgl_terbit'])));
    //             if(trim($row['status'])=='Y')
    //             {
    //                 $arrayHasil[$counter]['status'] = "<font class='td-status' style='color: #649e07;'>AKTIF</font>";
    //             }else{
    //                 $arrayHasil[$counter]['status'] = "<font class='td-status' style='color: red;'>TIDAK AKTIF</font>";                
    //             }
    //             $arrayHasil[$counter]['ms_berlaku'] = date('d-m-Y', strtotime(trim($row['ms_berlaku'])));
    //             $counter++;
    //         }
    //     }
    //     return $arrayHasil; 

    //     // $html.="<table id='datatables' class='table table-responsive  table-no-bordered table-hover' cellspacing='0' width='100%'' style='width:100%;font-size: 13px;'>";
    //     // $html.="<thead style='color: #FFFFFF;font-weight: 600;font-size: 12px;'>";
    //     //     $html.="<tr role='row' style='background-color:#43425D;'>";
    //     //     $html.="<th>No</th>
    //     //             <th>NAMA</th>
    //     //             <th>ALAMAT</th>
    //     //             <th>WILAYAH KERJA</th>
    //     //             <th>BIDANG USAHA</th>
    //     //             <th>KATEGORI</th>
    //     //             <th>LOKASI</th>
    //     //             <th>KOORDINAT</th>
    //     //             <th>SPESIFIKASI</th>
    //     //             <th>TERSUS / TUKS</th>
    //     //             <th>LEGALITAS</th>
    //     //             <th>TERBIT</th>
    //     //             <th>STATUS</th>
    //     //             <th>MASA BERLAKU</th>
    //     //             <th class='disabled-sorting' style='idth:50px'>ACTIONS</th>
    //     //         </tr>
    //     //     </thead>
    //     //     <tbody>";

    //     // $a=0;
    //     // if($sql1->num_rows()>0){
    //     //     foreach ($sql1->result_array() as $row){
    //     //         $html.="<tr role='row'>";
    //     //         $html.="<td>".($a+1)."</td>";
    //     //         $html.="<td>".$row['nm_perusahaan']."</td>";
    //     //         $html.="<td>".$row['alamat']."</td>";
    //     //         $html.="<td>".$row['ksop_id']."</td>";
    //     //         $html.="<td>".$row['bdgusaha_id']."</td>";
    //     //         $html.="<td>".$row['kategori_id']."</td>";
    //     //         $html.="<td>".$row['lokasi']."</td>";
    //     //         $html.="<td>".$row['koordinat']."</td>";
    //     //         $html.="<td>".$row['spesifikasi']."</td>";
    //     //         $html.="<td>".$row['ter_tuk']."</td>";
    //     //         $html.="<td>".$row['sk']."</td>";
    //     //         $html.="<td>".$row['tgl_terbit']."</td>";
    //     //         $html.="<td>".$row['status']."</td>";
    //     //         $html.="<td>".$row['ms_berlaku']."</td>";
    //     //         $html.="<td></td>";
    //     //         $html.="</tr>";
    //     //         $a++;
    //     //     }
    //         // $html.="<tr role='row'>";
    //         //     $html.="<td>1</td>";
    //         //     $html.="<td>2</td>";
    //         //     $html.="<td>3</td>";
    //         //     $html.="<td>4</td>";
    //         //     $html.="<td>5</td>";
    //         //     $html.="<td>6</td>";
    //         //     $html.="<td>7</td>";
    //         //     $html.="<td>8</td>";
    //         //     $html.="<td>9</td>";
    //         //     $html.="<td>10</td>";
    //         //     $html.="<td>11</td>";
    //         //     $html.="<td>12</td>";
    //         //     $html.="<td>13</td>";
    //         //     $html.="<td>14</td>";
    //         //     $html.="<td>15</td>";
    //         //     $html.="</tr>";
        


    //     //     $html.="</tbody>";
    //     // $html.="</table>";



    //     // $arrayHasil[0]['html']=$html;
    //     // echo json_encode($arrayhasil[0]['html']);
        
    // }

    // public function getData($param1)
    // {
    //     $a=array();
    //     $prm= explode("|",$param1);
    //     $xa = count($prm);
    //     $where1 = "";
    //     $where2 = "";
        
    //     for($a=0; $a<$xa; $a++) 
    //     {               
    //         $prm2=explode("~",$prm[$a]);

    //         if($prm2[2] ==''){
    //             $where2 .="";
    //         }else{
    //             $where2 .= " AND a.".$prm2[1]." like '%".$prm2[2]."%'";
    //         }

    //     }

    //     $where1 = "IS NOT NULL";
    //     $query1 = "SELECT a.*, b.name as nmprov,c.nama as nmksop,d.nama as nmusaha,e.nama as nmkateg from daftar_perusahaan as a left join provinsi as b on a.provinsi_id=b.id left join ksop as c on a.ksop_id=c.ksop_id left join bdg_usaha as d on a.bdgusaha_id=d.bdg_usaha_id left join kategori as e on a.kategori_id=e.kategori_id where a.id ".$where1." ".$where2." order by nm_perusahaan ASC";

    //     $query = $this->db->query($query1); 
    //     return $query->result();
        
    // }
}