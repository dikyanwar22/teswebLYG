<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ImportExcel extends CI_Controller {
	private $filename = "import_data";

	public function __construct() {
		parent::__construct();
		$this->load->model('SiswaModel');
	}

	public function index(){
		$data['siswa'] = $this->SiswaModel->view();
		$this->load->view('excel/view', $data);
	}

	public function form(){
		$data = array(); // Buat variabel $data sebagai array

		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->SiswaModel->upload_file($this->filename);

			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet;
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}

		$this->load->view('excel/form', $data);
	}

	public function import() {
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'nis'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama'=>$row['B'], // Insert data nama dari kolom B di excel
					'jenis_kelamin'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'alamat'=>$row['D'], // Insert data alamat dari kolom D di excel
				));
			}
			$numrow++; // Tambah 1 setiap kali looping
		}
		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->SiswaModel->insert_multiple($data);
		redirect("ImportExcel"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

	public function export() {
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		foreach(range('A','F') as $coulumID) {
			$spreadsheet->getActiveSheet()->getColumnDimension($coulumID)->setAutosize(true);
		}

		$sheet->setCellValue('A1','ID');
		$sheet->setCellValue('B1','Name');
		$sheet->setCellValue('C1','EMAIL');
		$sheet->setCellValue('D1','PASSWORD');
		$sheet->setCellValue('E1','AVATAR');
		$sheet->setCellValue('F1','LEVEL');

		$users = $this->db->query("SELECT * FROM users")->result_array();
		$x = 2; //start from row 2
		foreach($users as $key => $row) {
			$sheet->setCellValue('A'.$x, $row['id']);
			$sheet->setCellValue('B'.$x, $row['username']);
			$sheet->setCellValue('C'.$x, $row['email']);
			$sheet->setCellValue('D'.$x, $row['password']);
			$sheet->setCellValue('E'.$x, $row['avatar']);
			$sheet->setCellValue('F'.$x, $row['level_id']);
			$x++;
		}

		$writer = new Xlsx($spreadsheet);
		$fileName='users_details_export2022.xlsx';
		//$writer->save($fileName);  //this is for save in folder

		/* for force download */
		header('Content-Type: appliction/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$fileName.'"');
		$writer->save('php://output');
		/* force download end */
	}

}
