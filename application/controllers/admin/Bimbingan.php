<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bimbingan_model_dsn');
		$this->load->model('mahasiswa_model');
		$this->load->model('dosen_model');
		//proteksi halaman 
	}
	public function index()
	{
		$user = $this->bimbingan_model_dsn->listing_mhs();

		// print_r($user);
		// die();

		$data = array(	'title' 		=> 'Daftar Mahasiswa Bimbingan',
						'user'			=>	$user,
						'isi'			=>	'admin/bimbingan/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function pilih_pembimbing($id_mahasiswa)
	{
		$daftar_dosen = $this->dosen_model->listing();

		$user = $this->bimbingan_model_dsn->detail_mhs($id_mahasiswa);


		$valid = $this->form_validation;

		$valid->set_rules('id_dosen','Dosen Pembimbing','required',
			array( 	'required'		=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' 		=> 	'Pilih Dosen Pembimbing' ,
						'daftar_dosen'	=>	$daftar_dosen,
						'user'			=>	$user,
						'isi' 			=> 	'admin/bimbingan/edit'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i= $this->input;
				$data = array(	'id_mahasiswa'		=> 	$id_mahasiswa,
								'id_dosen' 			=>	$i->post('id_dosen'));

				$this->mahasiswa_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('admin/bimbingan'),'refresh');
		}
		// end masuk database
	}
	public function download($id_bm_mhs)
	{
		$file_id = $this->bimbingan_model_dsn->download($id_bm_mhs);
		$file = 'assets/upload/file/'.$file_id->id_bm_mhs;
		force_download($file, NULL);
	}

}

/* End of file Bimbingan.php */
/* Location: ./application/controllers/admin/Bimbingan.php */