<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('bimbingan_model_mhs');
	}

	public function index()
	{	
		$id_user = $this->session->userdata('id_user');

		$user = $this->bimbingan_model_mhs->detail_mhs($id_user);

		$id_dosen = $this->bimbingan_model_mhs->detail_mhs($id_user);

		$dosen = $this->bimbingan_model_mhs->listing_dsn($id_dosen->id_dosen);

		$bimbingan = $this->bimbingan_model_mhs->bimbingan_mhs($id_user);

		$id_mahasiswa = $user->id_mahasiswa;

		$bimbingan_dsn = $this->bimbingan_model_mhs->bimbingan_dsn($id_mahasiswa);
		// print_r($user);
		// die();


		$data = array(	'title' 	=> 'Bimbingan Mahasiswa', 
						'user'		=>	$user,
						'dosen'		=>	$dosen,
						'id_dosen'	=>	$id_dosen,
						'bimbingan'	=>	$bimbingan,
						'bimbingan_dsn'	=>	$bimbingan_dsn,
						'isi'		=>	'home/bimbingan/list'
					);
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		
		$id_user = $this->session->userdata('id_user');

		$user = $this->user_model->detail_user($id_user);

		$id_dosen = $this->bimbingan_model_mhs->detail_mhs($id_user);

		$config['upload_path']          = './assets/upload/file/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|docx|doc';
        $config['max_size']             = 20000;
        $config['max_width']            = 20000;
        $config['max_height']           = 20000;
        $this->upload->initialize($config);
         if ($this->upload->do_upload('file_bm_mhs'))
        {
        	// die('JALAN');
        	$i= $this->input;
			$fl = $this->upload->data();
			$data = array(	'id_user' 		=> $id_user,
							'id_mahasiswa'	=> $id_dosen->id_mahasiswa,
							'id_dosen'		=> $id_dosen->id_dosen,
        					'file_bm_mhs'	=> $fl['file_name'],
							'komentar_mhs' 	=> $i->post('komentar_mhs'));
			//print_r($data);
			//die();
			$this->bimbingan_model_mhs->tambah_bimbingan($data);
        	$this->session->flashdata('info','simpan');
        	redirect('home/bimbingan');
        }
        else
        {
        	        			//die('JALAN');
        	print_r(array('error' => $this->upload->display_errors()));
        	die();

        	$data = array('id_user' => $id_user);
        	$this->bimbingan_model_mhs->tambah_bimbingan($data);
        	$this->session->flashdata('info','simpan');
        	redirect('home/bimbingan');
        }
        /*
        $id_user = $this->session->userdata('id_user');

        $i= $this->input;
		
			$data = array(	'id_user' 		=> $id_user,
        					
							'komentar_mhs' 	=> $i->post('komentar_mhs'));
			print_r($data);
			die();
			$this->bimbingan_model_mhs->tambah_bimbingan($data);
        	$this->session->flashdata('info','simpan');
        	redirect('home/bimbingan');
        	*/

}

	public function download($id_bm_dsn)
	{
		$this->load->helper('download');
		$file_id = $this->bimbingan_model_mhs->download($id_bm_dsn);
		$file = 'assets/upload/file/dosen/'.$file_id->file_bm_dsn;
		// print_r($file);
		// die();
		force_download($file, NULL);
	}

}