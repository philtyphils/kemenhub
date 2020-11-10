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
        $data = $this->Export_model->getProvinsi();
        $spreadsheet = new Spreadsheet();
        $index = 0;
        foreach($data->result_array() as $r)
        {
            $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $r['nama']);
            $spreadsheet->addSheet($myWorkSheet, $index);
            $sheet = $spreadsheet->setActiveSheetIndex($index);
            $sheet->setCellValue('A1', 'No');
		    $sheet->setCellValue('B1', 'Nama');
		    $sheet->setCellValue('C1', 'Kelas');
		    $sheet->setCellValue('D1', 'Jenis Kelamin');
            $sheet->setCellValue('E1', 'Alamat');
            $index++;
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
