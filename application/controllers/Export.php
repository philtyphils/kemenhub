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
        $rekap_provinsi = $this->Export_model->rekapProvinsi($provinsi_id);
        //echo "<pre>";print_r($rekap_provinsi->result_array());die();
        $spreadsheet = new Spreadsheet();
        $index = 0;
        $wilayah = "";$row = 8;$no = 0;
        $wilayah_kerja = "";
        //style FONT CENTER * BOLD
        $style = array(
            'font' => array(
                'bold' => true,
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            )
        );
        $styleTitle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            //'borders' => [
            //    'top' => [
            //        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            //    ],
            //],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'DDEBF7',
                ],
            ],
        ];

        $styleData = [
            'font' => [
                'name' => "calibri",
                'size' => 9
            ]
        ];
        foreach($data->result_array() as $r)
        {
            
            
            if($wilayah != $r['provinsi'])
            {
                # create new sheet and activeted it
                $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $r['provinsi']);
                $spreadsheet->addSheet($myWorkSheet, $index);
                $sheet = $spreadsheet->setActiveSheetIndex($index);

                /* set width column */
                $sheet->getColumnDimension('B')->setWidth(6.5);
                $sheet->getColumnDimension('C')->setWidth(36);
                $sheet->getColumnDimension('D')->setWidth(23);
                $sheet->getColumnDimension('E')->setWidth(24.5);
                $sheet->getColumnDimension('F')->setWidth(29.15);
                $sheet->getColumnDimension('G')->setWidth(30);
                $sheet->getColumnDimension('H')->setWidth(28.56);
                $sheet->getColumnDimension('I')->setWidth(20);
                $sheet->getColumnDimension('J')->setWidth(33);
                $sheet->getColumnDimension('K')->setWidth(13);
                $sheet->getColumnDimension('L')->setVisible(false);
                $sheet->getColumnDimension('M')->setWidth(24.4);
                $sheet->getColumnDimension('N')->setWidth(22.89);
                $sheet->getColumnDimension('O')->setWidth(16.78);
                $sheet->getColumnDimension('P')->setWidth(18);
                $sheet->getColumnDimension('Q')->setVisible(false);
                $sheet->getColumnDimension('R')->setVisible(false);


                /* create title */
                $sheet->mergeCells('B3:O3');
                $sheet->getStyle("B3")->applyFromArray($style);
                $sheet->mergeCells('B4:O4');
                $sheet->getStyle("B4")->applyFromArray($style);
                $sheet->mergeCells('B5:O5');
                $sheet->getStyle("B5")->applyFromArray($style);
                $sheet->setCellValue('B3', 'DAFTAR TERSUS & TUKS DI WILAYAH KERJA');
                $sheet->setCellValue('B4', 'KANTOR UPT DITJEN HUBLA');
                $sheet->setCellValue('B5', 'PROVINSI '.strtoupper($r['provinsi']));
                $index++; $row = 8;
            }
            
            
            // wilayah kerja
            if($wilayah_kerja != $r['wilayah_kerja'])
            {
                $row += 3;
                //WILAYAH KERJA
                $wilayah_kerja = $r['wilayah_kerja'];
                $sheet->setCellValue("C".$row, $wilayah_kerja);
                $sheet->getStyle("C".$row)->applyFromArray(array("font" => array("bold" => true)));$row++;

                /* set row style for title */                
                $sheet->getRowDimension($row)->setRowHeight(45);

                /* set vertical center */
                $sheet->getStyle('B'.$row.':P'.$row)->getAlignment()->setVertical('center');

                //HEADER TABLE
                $sheet->setCellValue("B".$row, 'No');
                $sheet->getStyle("B".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("C".$row, 'NAMA PERUSAHAAN');
                $sheet->getStyle("C".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("D".$row, 'BIDANG USAHA');
                $sheet->getStyle("D".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("E".$row, 'KATEGORI');
                $sheet->getStyle("E".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("F".$row, 'LOKASI');
                $sheet->getStyle("F".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("G".$row, 'ALAMAT');
                $sheet->getStyle("G".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("H".$row, 'PENANGGUNG JAWAB');
                $sheet->getStyle("H".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("I".$row, 'NPWP');
                $sheet->getStyle("I".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("J".$row, 'KOORDINAT');
                $sheet->getStyle("J".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("K".$row, 'TERSUS/TUKS');
                $sheet->getStyle("K".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("L".$row, 'SPESIFIKASI');
                $sheet->getStyle("L".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("M".$row, 'LEGALITAS');
                $sheet->getStyle("M".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("N".$row, 'TANGGAL TERBIT');
                $sheet->getStyle("N".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("O".$row, 'STATUS');
                $sheet->getStyle("O".$row)->applyFromArray($styleTitle);
                $sheet->setCellValue("P".$row, 'MASA BERLAKU');
                $sheet->getStyle("P".$row)->applyFromArray($styleTitle);

                #indexing autoincrement number
                $no = 1;
            }
            #parameter new table
            $wilayah_kerja = $r['wilayah_kerja'];
            
            $col = "B";$row++;
            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->setCellValue($col.$row,$no);$col++;

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['perusahaan']);$col++; #perusahaan

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['bidang_usaha']);$col++; #bisang usaha

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['kategori']);$col++; #kategori

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['lokasi']);$col++;    # lokasi
            
            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['alamat']);$col++; # alamat

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['png_jwb']);$col++; #penganggung jawab

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['npwp']);$col++; #npwp

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['koordinat']);$col++; #koordinat

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['ter_tuk']);$col++; #ter_tuk

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->setCellValue($col.$row,$r['spesifikasi']);$col++; #spesifikasi

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$r['legalitas']);$col++; #legalitas

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,date("d F Y",strtotime($r['tgl_terbit'])));$col++; #tanggal terbit
            $status = "TIDAK AKTIF";
            if(strtoupper($r['status']) == "Y")
            {
                $status = "AKTIF";
            }
            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,$status);$col++;

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->getStyle($col.$row)->getAlignment()->setVertical('center');
            $sheet->getStyle($col.$row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($col.$row)->getAlignment()->setWrapText(true);
            $sheet->setCellValue($col.$row,date("d F Y",strtotime($r['ms_berlaku'])));$col++;

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->setCellValue($col.$row,date($r['latitude']));$col++;

            $sheet->getStyle($col.$row)->applyFromArray($styleData);
            $sheet->setCellValue($col.$row,date($r['longitude']));$col++;
            $wilayah = $r['provinsi'];$no++;

        }
        
        /* rekaptulasi provinsi */
        $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, "REKAPiTULASI PROVINSI");
        $spreadsheet->addSheet($myWorkSheet, $index);
        $sheet = $spreadsheet->setActiveSheetIndex($index);
        
        $sheet->mergeCells('B3:H3');
        $sheet->getStyle('B3:H3')->getAlignment()->setVertical('center');
        $sheet->getStyle('B3:H3')->getAlignment()->setHorizontal('center');
        $sheet->getRowDimension(3)->setRowHeight(36);
        $sheet->setCellValue('B3', 'REKAPITULASI JUMLAH TERSUS DAN TUKS PER PROVINSI');
       
        $sheet->mergeCells('B4:B5'); $sheet->mergeCells('D4:E4'); $sheet->mergeCells('F4:G4'); 
        $sheet->mergeCells('C4:C5'); $sheet->mergeCells('H4:H5');

        $sheet->setCellValue('B4', 'NO'); $sheet->setCellValue('C4', 'PROVINSI'); $sheet->setCellValue('D4', 'TERSUS');
        $sheet->setCellValue('F4', 'TUKS'); $sheet->setCellValue('H4', 'JUMLAH');
        $sheet->setCellValue('D5','AKTIF'); $sheet->setCellValue('E5','TIDAK AKTIF');
        $sheet->setCellValue('F5','AKTIF'); $sheet->setCellValue('G5','TIDAK AKTIF');
        
        $no = 1; $cols = "B"; $rows="6";
        foreach($rekap_provinsi->result_array() as $key => $value)
        {
            $sheet->setCellValue($cols.$rows, $no);$cols++;
            $sheet->setCellValue($cols.$rows, $value['provinsi']);$cols++;
            $sheet->setCellValue($cols.$rows, $value['TERSUS_AKTIF']);$cols++;
            $sheet->setCellValue($cols.$rows, $value['TERSUS_NONAKTIF']);$cols++;
            $sheet->setCellValue($cols.$rows, $value['TUKS_AKTIF']);$cols++;
            $sheet->setCellValue($cols.$rows, $value['TUKS_NONAKTIF']);$cols++;
            $sheet->setCellValue($cols.$rows, $value['JUMLAH']);
            $rows++;$cols= "B";$no++;
            
        }
        
		$writer = new Xlsx($spreadsheet);
		$filename = 'Data-TUKS-TERSUS-INDONESIA_'.date("Ymd");
		
        header('Content-Disposition: attachment;filename="'. $filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Transfer-Encoding: binary');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');

		
	}
	
	
	
}
