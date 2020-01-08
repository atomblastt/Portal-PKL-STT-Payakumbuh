<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		//proteksi halaman 
		$this->simple_login->cek_login();
	}

	public function index()
	{
		$total_mhs 				= $this->user_model->total_mhs();
		$total_pkl 				= $this->user_model->total_pkl();
		$total_setuju 			= $this->user_model->total_setuju();
		$total_belum 			= $this->user_model->total_belum();
		$user 					= $this->user_model->listing_mhs();

		$data = array(	'title' 		=> 	'Dashboard', 
						'total_mhs'		=>	$total_mhs,
						'total_pkl'		=>	$total_pkl,
						'total_setuju'	=>	$total_setuju,
						'total_belum'	=>	$total_belum,
						'user'			=>	$user,
						'isi'			=>	'admin/dasbor/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function cetak()
	{
		$user = $this->user_model->listing_mhs(); 

		$data = array(	'user' => $user,
						 );
		$this->load->view('admin/dasbor/cetak', $data, FALSE);
	}

}

/* End of file dasbor.php */
/* Location: ./application/controllers/admin/dasbor.php */