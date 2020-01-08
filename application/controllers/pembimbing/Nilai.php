<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('pembimbing_model');
		$this->load->model('nilai_model');
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->pembimbing_model->detail_pembimbing($id_user);

		$mahasiswa = $this->nilai_model->detail_mahasiswa($id_user);

		// print_r($mahasiswa);
		// die();
		$data = array (	'title' 	=> 	'List Mahasiswa', 
						'mahasiswa'	=>	$mahasiswa,
						'user'		=>  $user,
						'isi'		=>	'pembimbing/mahasiswa/list_nilai'
						);
		$this->load->view('pembimbing/layout/wrapper', $data, FALSE);
	}

	public function beri($id_mahasiswa)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->pembimbing_model->detail_pembimbing($id_user);

		$cek = $this->nilai_model->cek_nilai_pkl($id_mahasiswa);

		$mahasiswa = $this->nilai_model->detail_mahasiswa_row($id_mahasiswa);

		$data = array (	'title' 	=> 	'Input nilai Mahasiswa '.$mahasiswa->nama_mahasiswa, 
						'mahasiswa'	=>	$mahasiswa,
						'user'		=>	$user,
						'cek'		=>	$cek,
						'isi'		=>	'pembimbing/mahasiswa/nilai'
						);
		// print_r($data);
		// die();
		$this->load->view('pembimbing/layout/wrapper', $data, FALSE);
	}

	public function tambah($id_mahasiswa)
	{
		$n1 = $this->input->post('nilai1');
		$n2 = $this->input->post('nilai2');
		$n3 = $this->input->post('nilai3');
		$n4 = $this->input->post('nilai4');
		$n5 = $this->input->post('nilai5');
		$n6 = $this->input->post('nilai6');

		$ntotal = $n1+$n2+$n3+$n4+$n5+$n6;

		$nakhir	= $ntotal/6;

		$id_user = $this->session->userdata('id_user');

		$mahasiswa = $this->nilai_model->detail_mahasiswa_row($id_mahasiswa);


		$data = array(	'id_mahasiswa'	 => $mahasiswa->id_mahasiswa,
						'total_lapangan' => $ntotal,
						'nilai_lapangan' => $nakhir );

		// print_r($data);
		// die();

		$this->nilai_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Nilai berhasil di Submit');
		redirect('pembimbing/nilai/beri/'.$mahasiswa->id_mahasiswa,'refresh');
	}

}

/* End of file Nilai.php */
/* Location: ./application/controllers/pembimbing/Nilai.php */