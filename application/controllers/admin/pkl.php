<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pkl extends CI_Controller {

	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pkl_model');
		//proteksi halaman 
		$this->simple_login->cek_login();
	}

	public function index()
	{

		$user 	= $this->user_model->listing_mhs();
		$mahasiswa 	= $this->user_model->listing_mhs();

		$data = array(	'title' 		=> 	'Daftar mahasiswa yang sudah menentukan lokasi PKL', 
						'user'			=>	$user,
						'mahasiswa'		=> $mahasiswa,
						'isi'			=>	'admin/pkl/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	public function update_status($id_pkl)
	{
		$user	= $this->pkl_model->detail_pkl($id_pkl);
		// $status_pkl = $this->input->post('status_pkl');
		// print_r($id_user);
		// die();
		$i = $this->input;
		$data = array(	'id_pkl'		=> $id_pkl,
						'status_pkl' 	=> 'disetujui' );
		
		$this->pkl_model->edit($data);
		$this->session->set_flashdata('sukses', 'Status PKL Berhasil di Update');
		redirect('admin/pkl','refresh');
	}

	public function update_status_proses($id_pkl)
	{
		$user	= $this->pkl_model->detail_pkl($id_pkl);
		// $status_pkl = $this->input->post('status_pkl');
		// print_r($id_user);
		// die();
		$i = $this->input;
		$data = array(	'id_pkl'		=> $id_pkl,
						'status_pkl' 	=> 'di proses' );
		
		$this->pkl_model->edit($data);
		$this->session->set_flashdata('sukses', 'Status PKL Berhasil di Update');
		redirect('admin/pkl','refresh');
	}

	public function batal_update_status($id_pkl)
	{
		$user	= $this->pkl_model->detail_pkl($id_pkl);
		// $status_pkl = $this->input->post('status_pkl');
		// print_r($id_user);
		// die();
		$i = $this->input;
		$data = array(	'id_pkl'		=> $id_pkl,
						'nama_tempat'	=> $i->post('komentar'),
						'lokasi'		=>	'',
						'status_pkl' 	=> 'di tolak' );
		$this->pkl_model->edit($data);
		$this->session->set_flashdata('sukses', 'Status PKL Berhasil di Update');
		redirect('admin/pkl','refresh');
	}

	
}

/* End of file pkl.php */
/* Location: ./application/controllers/admin/pkl.php */