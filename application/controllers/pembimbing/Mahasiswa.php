<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('pembimbing_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('pkl_model');

	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		
		$user = $this->pembimbing_model->detail_pembimbing($id_user);

		$mahasiswa = $this->pembimbing_model->tengah();
		// print_r($mahasiswa);
		// die();

		$data = array(	'title' 		=> 	'Mahasiswa bimbingan', 
						'mahasiswa'		=>	$mahasiswa,
						'user'			=> 	$user,
						'isi'			=>	'pembimbing/mahasiswa/list'
						);
		$this->load->view('pembimbing/layout/wrapper', $data, FALSE);
	}

	public function setujui($id_mahasiswa)
	{
		$id_user= $this->session->userdata('id_user');
		$mahasiswa = $this->pembimbing_model->tengah();
		// $status_pkl = $this->input->post('status_pkl');
		$id_pembimbing = $this->pembimbing_model->detail_pembimbing($id_user);
		$i = $this->input;
		$data = array(	'id_mahasiswa'		=> $id_mahasiswa, 
						'id_user_pm'		=> $this->session->userdata('id_user'),
						'id_pembimbing' 	=> $id_pembimbing->id_pembimbing,
					);
		// print_r($data);
		// die();
		$this->pembimbing_model->edit_tengah($data);
		$this->session->set_flashdata('sukses', 'Pembimbing Lapangan berhasil di Update');
		redirect('pembimbing/mahasiswa','refresh');
	}

	public function list_mahasiswa()
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->pembimbing_model->detail_pembimbing($id_user);

		$mahasiswa= $this->pembimbing_model->detail_mahasiswa_kegiatan2($id_user);
		// print_r($mahasiswa);
		// die();

		$data = array(  	'title' 		=> 'Daftar mahasiswa bimbingan',
								'mahasiswa'		=> $mahasiswa,
								'user'			=> $user,
								'isi'			=> 'pembimbing/mahasiswa/list_kegiatan'
								 );
		$this->load->view('pembimbing/layout/wrapper', $data, FALSE);
	}

	public function kegiatan($id_mahasiswa)
	{
		$id_user= $this->session->userdata('id_user');

		$user = $this->pembimbing_model->detail_pembimbing($id_user);

		$mahasiswa= $this->pembimbing_model->detail_mahasiswa_kegiatan3($id_mahasiswa);

		// print_r($mahasiswa);
		// die();
		$this->session->set_userdata('referred_from', current_url());

		$nama_mhs = $this->pembimbing_model->detail_mahasiswa3($id_mahasiswa);

		$id_pembimbing = $this->pembimbing_model->detail_pembimbing($id_user);

		// print_r($mahasiswa);
		// die();
		
		$data = array(	'title' 		=> 	'Kegiatan Praktek Kerja Lapangan', 
						'mahasiswa'		=> 	$mahasiswa,
						'user'			=>	$user,
						'nama_mhs'		=>	$nama_mhs,
						'isi'			=>	'pembimbing/mahasiswa/kegiatan'
						);
		// print_r($kegiatan_edit);
		// die();

		$this->load->view('pembimbing/layout/wrapper', $data, FALSE);
	}
	public function hadir($id_kegiatan)
	{
		$kegiatan	= $this->pembimbing_model->detail_kegiatan($id_kegiatan);
		// $status_pkl = $this->input->post('status_pkl');
		// print_r($kegiatan);
		// die();
		$i = $this->input;
		$data = array(	'id_kegiatan'		=> $id_kegiatan,
						'absen' 			=> 'hadir' );
		
		$this->pembimbing_model->edit_kegiatan($data);
		$this->session->set_flashdata('sukses', 'Absen Berhasil di Update');
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
		
	}

	public function izin($id_kegiatan)
	{
		$kegiatan	= $this->pembimbing_model->detail_kegiatan($id_kegiatan);
		// $status_pkl = $this->input->post('status_pkl');
		// print_r($id_user);
		// die();
		$i = $this->input;
		$data = array(	'id_kegiatan'		=> $id_kegiatan,
						'absen' 			=> 'izin' );
		
		$this->pembimbing_model->edit_kegiatan($data);
		$this->session->set_flashdata('sukses', 'Absen Berhasil di Update');
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
		
	}

	public function mangkir($id_kegiatan)
	{
		$kegiatan	= $this->pembimbing_model->detail_kegiatan($id_kegiatan);
		// $status_pkl = $this->input->post('status_pkl');
		// print_r($id_user);
		// die();
		$i = $this->input;
		$data = array(	'id_kegiatan'		=> $id_kegiatan,
						'absen' 			=> 'mangkir' );
		
		$this->pembimbing_model->edit_kegiatan($data);
		$this->session->set_flashdata('sukses', 'Absen Berhasil di Update');
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
		
	}

}

/* End of file Pkl.php */
/* Location: ./application/controllers/pembimbing/Pkl.php */