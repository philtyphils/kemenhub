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
        
        $sql ="SELECT * from wilayah where substr(kode,1,2) = '".$id."' and kode!='".$id."'";
        $query= $this->db->query($sql);
            
        return $query->result(); 
    }

    public function get_Kelas($id)
    {
        
        $sql ="SELECT * from ksop left join provinsi on ksop.provinsi_id=provinsi.id where provinsi_id ='".$id."'";
        $query= $this->db->query($sql);
            
        return $query->result(); 
    }

    public function getData($name,$provinsi,$kota,$kelas,$kategori,$bidangusaha,$dermaga,$meter,$kapasitas,$tuk_ter,$status,$tgl_akhir)
    {
            
        $arrayHasil=array();
        $counter=0;
        $html = "";
        $sql ="SELECT a.* from daftar_perusahaan as a where nm_perusahaan like('%".$name."%') order by nm_perusahaan ASC ";
        // $sql ="SELECT a.* from daftar_perusahaan as a limit 0,1 ";
        $sql1 = $this->db->query($sql);
        $sql1 = $this->db->query($sql);
        
        

        if($sql1->num_rows()>0){
            foreach ($sql1->result_array() as $row){
                $arrayHasil[$counter]['no'] = ($counter+1);
                $arrayHasil[$counter]['id'] = trim($row['id']);
                $arrayHasil[$counter]['nm_perusahaan'] = "<font style='font-weight: bold;'>".trim($row['nm_perusahaan'])."</font>";
                $arrayHasil[$counter]['alamat'] = "<font class='td-status2'>".trim($row['alamat'])."</font>";
                $arrayHasil[$counter]['ksop_id'] = $row['ksop_id'];
                $arrayHasil[$counter]['provinsi_id'] = $row['provinsi_id'];
                $arrayHasil[$counter]['bdgusaha_id'] = $row['bdgusaha_id'];
                $arrayHasil[$counter]['lokasi'] = trim($row['lokasi']);
                $arrayHasil[$counter]['kategori_id'] = $row['kategori_id'];
                $arrayHasil[$counter]['koordinat'] = trim($row['koordinat']);
                if(trim($row['ter_tuk'])=='TUKS')
                {
                    $arrayHasil[$counter]['ter_tuk'] = "<font class='td-status' style='color: #A3A0FB;'>".trim($row['ter_tuk'])."</font>";
                }else{
                    $arrayHasil[$counter]['ter_tuk'] = "<font class='td-status' style='color: #6bd189;'>".trim($row['ter_tuk'])."</font>";
                }

                $arrayHasil[$counter]['sk'] = trim($row['sk']);
                $arrayHasil[$counter]['tgl_terbit'] = date('d-m-Y', strtotime(trim($row['tgl_terbit'])));
                if(trim($row['status'])=='Y')
                {
                    $arrayHasil[$counter]['status'] = "<font class='td-status' style='color: #649e07;'>".trim($row['status'])."</font>";
                }else{
                    $arrayHasil[$counter]['status'] = "<font class='td-status' style='color: red;'>".trim($row['status'])."</font>";                
                }
                $arrayHasil[$counter]['ms_berlaku'] = date('d-m-Y', strtotime(trim($row['ms_berlaku'])));
                $counter++;
            }
        }

        return $arrayHasil; 

        // $html.="<table id='datatables' class='table table-responsive  table-no-bordered table-hover' cellspacing='0' width='100%'' style='width:100%;font-size: 13px;'>";
        // $html.="<thead style='color: #FFFFFF;font-weight: 600;font-size: 12px;'>";
        //     $html.="<tr role='row' style='background-color:#43425D;'>";
        //     $html.="<th>No</th>
        //             <th>NAMA</th>
        //             <th>ALAMAT</th>
        //             <th>WILAYAH KERJA</th>
        //             <th>BIDANG USAHA</th>
        //             <th>KATEGORI</th>
        //             <th>LOKASI</th>
        //             <th>KOORDINAT</th>
        //             <th>SPESIFIKASI</th>
        //             <th>TERSUS / TUKS</th>
        //             <th>LEGALITAS</th>
        //             <th>TERBIT</th>
        //             <th>STATUS</th>
        //             <th>MASA BERLAKU</th>
        //             <th class='disabled-sorting' style='idth:50px'>ACTIONS</th>
        //         </tr>
        //     </thead>
        //     <tbody>";

        // $a=0;
        // if($sql1->num_rows()>0){
        //     foreach ($sql1->result_array() as $row){
        //         $html.="<tr role='row'>";
        //         $html.="<td>".($a+1)."</td>";
        //         $html.="<td>".$row['nm_perusahaan']."</td>";
        //         $html.="<td>".$row['alamat']."</td>";
        //         $html.="<td>".$row['ksop_id']."</td>";
        //         $html.="<td>".$row['bdgusaha_id']."</td>";
        //         $html.="<td>".$row['kategori_id']."</td>";
        //         $html.="<td>".$row['lokasi']."</td>";
        //         $html.="<td>".$row['koordinat']."</td>";
        //         $html.="<td>".$row['spesifikasi']."</td>";
        //         $html.="<td>".$row['ter_tuk']."</td>";
        //         $html.="<td>".$row['sk']."</td>";
        //         $html.="<td>".$row['tgl_terbit']."</td>";
        //         $html.="<td>".$row['status']."</td>";
        //         $html.="<td>".$row['ms_berlaku']."</td>";
        //         $html.="<td></td>";
        //         $html.="</tr>";
        //         $a++;
        //     }
            // $html.="<tr role='row'>";
            //     $html.="<td>1</td>";
            //     $html.="<td>2</td>";
            //     $html.="<td>3</td>";
            //     $html.="<td>4</td>";
            //     $html.="<td>5</td>";
            //     $html.="<td>6</td>";
            //     $html.="<td>7</td>";
            //     $html.="<td>8</td>";
            //     $html.="<td>9</td>";
            //     $html.="<td>10</td>";
            //     $html.="<td>11</td>";
            //     $html.="<td>12</td>";
            //     $html.="<td>13</td>";
            //     $html.="<td>14</td>";
            //     $html.="<td>15</td>";
            //     $html.="</tr>";
        


        //     $html.="</tbody>";
        // $html.="</table>";



        // $arrayHasil[0]['html']=$html;
        // echo json_encode($arrayhasil[0]['html']);
        
    }
}