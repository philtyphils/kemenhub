<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Export extends CI_Controller 
{
    /* installing phpspresheet

        change value config.php become like this
        $config['composer_autoload'] = "vendor/autoload.php";

        run composer
        composer require phpoffice/phpspreadsheet

    */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Export_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('encrypt');
		
	}
	
	public function index()
	{
        //sample paramter
        $provinsi_id = array();
        $kategori_id = array();
        $wilayah_kerja = array();
        $data = $this->Export_model->getData($provinsi_id,$kategori_id,$wilayah_kerja);
        //echo "<pre>";print_r($data->result_array());die();
        $spreadsheet = new Spreadsheet();
        $index = 0;
        $wilayah = "";$row = 8;$no = 0;
        $wilayah_kerja = "";
        foreach($data->result_array() as $r)
        {
            //style FONT CENTER * BOLD
            $style = array(
                'font' => array(
                    'bold' => true,
                ),
                'alignment' => array(
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                )
            );
            if($wilayah != $r['provinsi'])
            {
                #title EXCEL
                $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $r['provinsi']);
                $spreadsheet->addSheet($myWorkSheet, $index);
                $sheet = $spreadsheet->setActiveSheetIndex($index);
                $sheet->mergeCells('B3:O3');
                $sheet->getStyle("B3")->applyFromArray($style);
                $sheet->mergeCells('B4:O4');
                $sheet->getStyle("B4")->applyFromArray($style);
                $sheet->mergeCells('B5:O5');
                $sheet->getStyle("B5")->applyFromArray($style);
                $sheet->setCellValue('B3', 'DAFTAR TERSUS & TUKS DI WILAYAH KERJA');
                $sheet->setCellValue('B4', 'KANTOR UPT DITJEN HUBLA');
                $sheet->setCellValue('B5', 'PROVINSI '.$r['provinsi']);
                $index++; $row = 8;
            }

            // wilayah kerja
            if($wilayah_kerja != $r['wilayah_kerja'])
            {
                $row += 3;
                //WILAYAH KERJA
                $wilayah_kerja = $r['wilayah_kerja'];
                $sheet->setCellValue("C".$row, $wilayah_kerja);$row++;
                //HEADER TABLE
                $sheet->setCellValue("B".$row, 'No');
                $sheet->setCellValue("C".$row, 'NAMA PERUSAHAAN');
                $sheet->setCellValue("D".$row, 'BIDANG USAHA');
                $sheet->setCellValue("E".$row, 'KATEGORI');
                $sheet->setCellValue("F".$row, 'LOKASI');
                $sheet->setCellValue("G".$row, 'ALAMAT');
                $sheet->setCellValue("H".$row, 'PENANGGUNG JAWAB');
                $sheet->setCellValue("I".$row, 'NPWP');
                $sheet->setCellValue("J".$row, 'KOORDINAT');
                $sheet->setCellValue("K".$row, 'TERSUS/TUKS');
                $sheet->setCellValue("L".$row, 'SPESIFIKASI');
                $sheet->setCellValue("M".$row, 'LEGALITAS');
                $sheet->setCellValue("N".$row, 'TANGGAL TERBIT');
                $sheet->setCellValue("O".$row, 'STATUS');
                $sheet->setCellValue("P".$row, 'MASA BERLAKU');

                #indexing autoincrement number
                $no = 1;
            }
            #parameter new table
            $wilayah_kerja = $r['wilayah_kerja'];
            
            $col = "B";$row++;
		    $sheet->setCellValue($col.$row,$no);$col++;
            $sheet->setCellValue($col.$row,$r['perusahaan']);$col++; #perusahaan
            $sheet->setCellValue($col.$row,$r['bidang_usaha']);$col++; #bisang usaha
            $sheet->setCellValue($col.$row,$r['kategori']);$col++; #kategori
            $sheet->setCellValue($col.$row,$r['lokasi']);$col++;    # lokasi    
            $sheet->setCellValue($col.$row,$r['alamat']);$col++; # alamat
            $sheet->setCellValue($col.$row,$r['png_jwb']);$col++; #penganggung jawab
            $sheet->setCellValue($col.$row,$r['npwp']);$col++; #npwp
            $sheet->setCellValue($col.$row,$r['koordinat']);$col++; #koordinat
            $sheet->setCellValue($col.$row,$r['ter_tuk']);$col++; #ter_tuk
            $sheet->setCellValue($col.$row,$r['spesifikasi']);$col++; #spesifikasi
            $sheet->setCellValue($col.$row,$r['legalitas']);$col++; #legalitas
            $sheet->setCellValue($col.$row,$r['tgl_terbit']);$col++; #tanggal terbit
            $status = "TIDAK AKTIF";
            if(strtoupper($r['status']) == "Y")
            {
                $status = "AKTIF";
            }
            $sheet->setCellValue($col.$row,$status);$col++;

            $sheet->setCellValue($col.$row,$r['ms_berlaku']);$col++;
            $wilayah = $r['provinsi'];$no++;

        }
		
		
		$writer = new Xlsx($spreadsheet);
		$filename = 'Data-TUKS-TERSUS-Indonesia';
		
        header('Content-Disposition: attachment;filename="'. $filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Transfer-Encoding: binary');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');

		
	}
	
	
	
}
