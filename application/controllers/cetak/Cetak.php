<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('pkl_model');
		$this->load->model('pembimbing_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('bimbingan_model_dsn');
		$this->load->model('judul_model');
	}

	public function permohonan()
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->user_model->detail_user($id_user);

		$surat_permohonan = $this->pkl_model->surat_pkl();

		$data = array(	'user'	=>	$user,
						'surat_permohonan'	=>			$surat_permohonan
						);
		$this->load->view('cetak/surat', $data, FALSE);
	}

	public function kegiatan($id_user)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->user_model->detail_user($id_user);
		
		$kegiatan = $this->pkl_model->detail_kegiatan($id_user);

		$pkl = $this->pkl_model->detail($id_user);
		
		$data = array(	'user'			=>	$user,
						'kegiatan'		=>	$kegiatan,
						'pkl'			=>	$pkl
						);

		$this->load->view('cetak/kegiatan', $data, FALSE);
	}

	public function bimbingan($id_mahasiswa)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->user_model->detail_user($id_user);
		
		$bimbingan = $this->bimbingan_model_dsn->bimbingan_dsn_cetak($id_mahasiswa);

		// print_r($bimbingan);
		// die();

		$judul = $this->judul_model->listing($id_user);
		
		$data = array(	'user'			=>	$user,
						'judul'			=>	$judul,
						'bimbingan'		=>	$bimbingan
						);

		$this->load->view('cetak/bimbingan', $data, FALSE);
	}

	public function output($id_mahasiswa)
	{
		# code...
	}

}

/* End of file Cetak.php */
/* Location: ./application/controllers/cetak/Cetak.php */