<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judul extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('judul_model');
		$this->load->model('mahasiswa_model');

	}

	public function index()
	{		
			
		$id_user = $this->session->userdata('id_user');
		
		$user = $this->user_model->detail_user($id_user);
		// print_r($user);
		// die();
		$judul = $this->judul_model->listing($id_user);
		
		$data = array(	'title' => 	'Pengajuan Judul Praktek Kerja Lapangan', 
						'user'	=>	$user,
						'judul' => 	$judul,
						'isi'	=>	'home/judul/list'
						);
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		$id_user = $this->session->userdata('id_user');
		
		$id_mahasiswa = $this->mahasiswa_model->detail2($id_user);

				$i= $this->input;
				$data = array(	'id_user'		=>	$id_user,
								'id_mahasiswa'	=>  $id_mahasiswa->id_mahasiswa,
								'judul'			=>	$i->post('judul')
							);
				// print_r($id_mahasiswa);
				// die();
				$this->judul_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
				redirect(base_url('home/judul'),'refresh');
		// end masuk database
	}

	public function edit($id_user)
	{
		$id_user = $this->session->userdata('id_user');
		
		$id_mahasiswa = $this->mahasiswa_model->detail2($id_user);

				$i= $this->input;
				$data = array(	'id_user'		=>	$id_user,
								'id_mahasiswa'	=>  $id_mahasiswa->id_mahasiswa,
								'judul'			=>	$i->post('judul')
							);
				// print_r($id_mahasiswa);
				// die();
				$this->judul_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
				redirect(base_url('home/judul'),'refresh');
		// end masuk database
	}

}

/* End of file index.php */
/* Location: ./application/controllers/home/index.php */