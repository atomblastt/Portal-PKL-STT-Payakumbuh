<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_akhir extends CI_Controller {

	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
		$this->load->model('dosen_model');
		$this->load->model('sidang_model');
		$this->load->model('nilai_model');
		//proteksi halaman 
	}

	public function index()
	{
		$user = $this->nilai_model->List_mahasiswa();


		// print_r($user);
		// die();

		$data = array(	'title' => 'Data Pengguna' ,
						'user' 	=> $user,
						'isi' 	=> 'admin/sidang/nilai_akhir'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function nilai_mhs($id_mahasiswa)
	{
		$mahasiswa = $this->sidang_model->detail_sidang_mahasiswa($id_mahasiswa);

		$nilai 	= $this->nilai_model->rekap($id_mahasiswa);

		$nilai_pkl = $this->nilai_model->rekap_pkl($id_mahasiswa);

		$cek2 = $this->nilai_model->cek($id_mahasiswa);

		$penguji1 = $this->nilai_model->penguji1($id_mahasiswa);

		$penguji2 = $this->nilai_model->penguji2($id_mahasiswa);

		// print_r($penguji2);
		// die();

		// $cek = $this->sidang_model->list_nilai_penguji_2($id_mahasiswa);

		if ($cek2->bro > 1) {
			$data = array(	'title' 		=> 	'Nilai Praktek Kerja Lapangan'.$mahasiswa->nama_mahasiswa,
						'mahasiswa'		=>	$mahasiswa,
						'nilai'			=>	$nilai,
						'nilai_pkl'		=>	$nilai_pkl,
						// 'cek'			=>	$cek,
						'penguji1'		=>	$penguji1,
						'penguji2'		=>	$penguji2,
						'isi'			=>	'admin/sidang/rekap_nilai'
					 );

			$this->load->view('admin/layout2/wrapper', $data, FALSE);
		}else{
			echo '<script type="text/javascript">
				  alert("Nilai mahasiswa belum di input");
   				  </script>';
   		redirect('admin/nilai_akhir','refresh'); 
		}
	}

	public function cetak_nilai($id_mahasiswa)
	{
		$mahasiswa = $this->sidang_model->detail_sidang_mahasiswa($id_mahasiswa);

		$nilai 	= $this->nilai_model->rekap($id_mahasiswa);

		$nilai_pkl = $this->nilai_model->rekap_pkl($id_mahasiswa);

		$cek2 = $this->nilai_model->cek($id_mahasiswa);

		$penguji1 = $this->nilai_model->penguji1($id_mahasiswa);

		$penguji2 = $this->nilai_model->penguji2($id_mahasiswa);

		// print_r($penguji2);
		// die();

		// $cek = $this->sidang_model->list_nilai_penguji_2($id_mahasiswa);
			$data = array(	
						'mahasiswa'		=>	$mahasiswa,
						'nilai'			=>	$nilai,
						'nilai_pkl'		=>	$nilai_pkl,
						// 'cek'			=>	$cek,
						'penguji1'		=>	$penguji1,
						'penguji2'		=>	$penguji2
					 );

			$this->load->view('admin/sidang/cetak_nilai', $data, FALSE); 
		
	}
}

/* End of file Nilai_akhir.php */
/* Location: ./application/controllers/admin/Nilai_akhir.php */