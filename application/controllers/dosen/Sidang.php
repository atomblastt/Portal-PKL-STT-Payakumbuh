<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('dosen_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('judul_model');
		$this->load->model('bimbingan_model_dsn');
		$this->load->model('sidang_model');

	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');

		$id_dosen = $this->dosen_model->detail_dosen($id_user);

		$user = $this->dosen_model->detail_dosen($id_user);

		$sidang = $this->sidang_model->detail_sidang($id_dosen->id_dosen);

		$cek = $this->sidang_model->list_nilai_penguji($id_dosen->id_dosen);

		// print_r($cek);
		// die();

		$data = array(	'title' 	=> 	'Daftar mahasiswa yang akan di uji',
						'sidang'	=>	$sidang,
						'cek'		=>	$cek,
						'user'		=>	$user,
						'id_dosen'	=>	$id_dosen,
						'isi'		=>	'dosen/sidang/list'
					 );
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function mulai($id_mahasiswa)
	{	
		$id_user = $this->session->userdata('id_user');

		$id_dosen = $this->dosen_model->detail_dosen($id_user);

		$user = $this->dosen_model->detail_dosen($id_user);

		$cek = $this->sidang_model->list_nilai_penguji_2($id_mahasiswa);

		$mahasiswa = $this->sidang_model->detail_sidang_mahasiswa($id_mahasiswa);

		$data = array(	'title' 	=> 'Penilaian Sidang '.$mahasiswa->nama_mahasiswa,
						'mahasiswa'	=> $mahasiswa,
						'cek'		=> $cek,
						'user'		=> $user,
						'id_dosen'	=>	$id_dosen,
						'isi'		=> 'dosen/sidang/penilaian'
						 );

		$this->load->view('dosen/layout/wrapper', $data, FALSE);

		// print_r($cek);
		// die();
		

	}

	public function input_nilai($id_mahasiswa)
	{
		$id_user = $this->session->userdata('id_user');

		$id_dosen = $this->dosen_model->detail_dosen($id_user);

		$mahasiswa = $this->sidang_model->detail_sidang_mahasiswa($id_mahasiswa);

		$i=$this->input;
		$data = array(	'id_mahasiswa' 	=> $id_mahasiswa,
						'id_dosen'		=> $id_dosen->id_dosen,
						'n1'			=> $i->post('hasil1'),
						'n2'			=> $i->post('hasil2'),
						'n3'			=> $i->post('hasil3'),
						'n4'			=> $i->post('hasil4'),
						'n5'			=> $i->post('hasil5'),
						'penguji'		=> $i->post('penguji')
						 );
		// print_r($data);
		// die();
		$this->sidang_model->input_nilai($data);
		redirect('dosen/sidang','refresh');
	}

}

/* End of file Sidang.php */
/* Location: ./application/controllers/dosen/Sidang.php */