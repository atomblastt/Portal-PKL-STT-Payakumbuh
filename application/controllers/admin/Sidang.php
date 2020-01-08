<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang extends CI_Controller {

	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
		$this->load->model('dosen_model');
		$this->load->model('sidang_model');
		//proteksi halaman 
	}

	public function index()
	{
		$sidang = $this->sidang_model->listing_join();
		// print_r($sidang);
		// die();

		// $penguji = $this->sidang_model->listing_penguji();

		$data = array(	'title' 	=> 'Daftar Mahasiswa ACC Sidang PKL', 
						'sidang'	=> $sidang,
						// 'penguji'	=> $penguji,
						'isi'		=> 'admin/sidang/list'
						);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function penguji($id_mahasiswa)
	{
		$dosen = $this->dosen_model->listing();

		$valid = $this->form_validation;

		$sidang = $this->sidang_model->detail($id_mahasiswa);

		$valid->set_rules('id_penguji_1','Harus pilih Dosen','required',
			array( 	'required'		=> '%s '));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' 		=> 	'Pilih Penguji Sidang',
						'dosen'			=> 	$dosen,
						'sidang'		=>	$sidang,
						'isi' 			=> 	'admin/sidang/penguji'
						);	
		// print_r($data);
		// die();
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i= $this->input;
				$data = array(	'id_mahasiswa'	=>  $id_mahasiswa,
								'jadwal_sidang'	=>	$i->post('jadwal_sidang'),
								'id_penguji_1'	=>	$i->post('id_penguji_1'),
								'id_penguji_2'	=>	$i->post('id_penguji_2'),
								'status_sidang'	=>	'acc'
								);
				// $data = array_merge($data1,$data2);
				// print_r($data);
				// die();
				$this->sidang_model->update($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
				redirect(base_url('admin/sidang'),'refresh');
		}
	}

	public function jadwal()
	{
	 	$sidang = $this->sidang_model->listing_jadwal();

	 	// print_r($sidang);
	 	// die();

	 	$data = array(	'title' 	=> 'Jadwal Sidang Mahasiswa',
	 					'sidang'	=>	$sidang,
	 					'isi'		=>	'admin/sidang/list_jadwal'
	 				 );
	 	$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}

/* End of file sidang.php */
/* Location: ./application/controllers/admin/sidang.php */