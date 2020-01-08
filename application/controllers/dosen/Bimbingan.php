<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

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

		$mahasiswa = $this->dosen_model->mahasiswa_bimbingan($id_dosen->id_dosen);

		// print_r($mahasiswa);
		// die();
		$sidang = $this->sidang_model->listing();
		
		$data = array(	'title' 	=> 	'Mahasiswa Bimbingan', 
						'mahasiswa'	=>	$mahasiswa,
						'sidang'	=>	$sidang,
						'user'		=>	$user,
						'id_dosen'	=> 	$id_dosen,
						'isi'		=>	'dosen/bimbingan/list'
						);
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function detail($id_mahasiswa)
	{
		$id_user = $this->session->userdata('id_user');

		$id_dosen = $this->dosen_model->detail_dosen($id_user);

		$user = $this->dosen_model->detail_dosen($id_user);

		$mahasiswa = $this->dosen_model->mahasiswa_bimbingan_detail($id_mahasiswa);

		$total_sidang = $this->bimbingan_model_dsn->total_bimbingan($id_mahasiswa);

		$judul = $this->dosen_model->listing_judul($id_mahasiswa);

		$bimbingan_dsn = $this->bimbingan_model_dsn->bimbingan_dsn($id_mahasiswa);

		$bimbingan_mhs = $this->bimbingan_model_dsn->bimbingan_mhs($id_mahasiswa);

		// print_r($bimbingan_mhs);
		// die();
		$sidang = $this->sidang_model->detail($id_mahasiswa);

		// $cek = $this->bimbingan_model_dsn->cek($id_dosen->id_dosen);

		// foreach ($cek as $i) {
		// $data1 = array(	'i' => $i );	
		// }
		$data = array(	'title' 		=> 	'Mahasiswa Bimbingan', 
						'mahasiswa'		=>	$mahasiswa,
						'user'			=>	$user,
						'bimbingan_dsn' =>	$bimbingan_dsn,
						'bimbingan_mhs' =>	$bimbingan_mhs,
						'total_sidang'	=>	$total_sidang,
						'judul'			=>	$judul,
						'sidang'		=>	$sidang,
						'id_dosen'		=>	$id_dosen,
						'isi'			=>	'dosen/bimbingan/mahasiswa'
						);
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}

	public function tambah($id_bm_mhs)
	{
		
		$id_user = $this->session->userdata('id_user');

		$id_dosen = $this->dosen_model->detail_dosen($id_user);

		$detail_mhs = $this->dosen_model->detail_mahasiswa($id_bm_mhs); 

		$bimbingan_mhs = $this->bimbingan_model_dsn->bimbingan_mhs($detail_mhs->id_mahasiswa);

		$mahasiswa = $detail_mhs->id_mahasiswa;

		

		$config['upload_path']          = './assets/upload/file/dosen/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|docx|doc';
        $config['encrypt_name']         = TRUE;
        $config['max_size']             = 20000;
        $config['max_width']            = 20000;
        $config['max_height']           = 20000;
        $this->upload->initialize($config);
         if ($this->upload->do_upload('file_bm_dsn'))
        {
        	// die('JALAN');
        	$i= $this->input;
			$fl = $this->upload->data();
			$data = array(	'id_user' 		=> $id_user,
							'id_bm_mhs'		=> $detail_mhs->id_bm_mhs,
							'id_dosen'		=> $id_dosen->id_dosen,
							'id_mahasiswa'	=> $detail_mhs->id_mahasiswa,
        					'file_bm_dsn'	=> $fl['file_name'],
							'komentar_dsn' 	=> $i->post('komentar_dsn'));
			$this->bimbingan_model_dsn->tambah_bimbingan($data);
        	$this->session->flashdata('info','simpan');
        	redirect('dosen/bimbingan/detail/'.$detail_mhs->id_mahasiswa);
        }
        else
        {
        	        			//die('JALAN');
        	// print_r(array('error' => $this->upload->display_errors()));
        	// die();
        	$i= $this->input;
        	$data = array('id_user' 		=> $id_user,
							'id_dosen'		=> $id_dosen->id_dosen,
							'id_bm_mhs'		=> $detail_mhs->id_bm_mhs,
							'id_mahasiswa'	=> $detail_mhs->id_mahasiswa,
        					// 'file_bm_dsn'	=> $fl['file_name'],
							'komentar_dsn' 	=> $i->post('komentar_dsn'));
			// print_r($data);
			// die();
        	$this->bimbingan_model_dsn->tambah_bimbingan($data);
        	$this->session->flashdata('info','simpan');
        	redirect('dosen/bimbingan/detail/'.$detail_mhs->id_mahasiswa);
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

	public function judul_acc($id_mahasiswa)
	{
		$mahasiswa = $this->dosen_model->mahasiswa_bimbingan_detail($id_mahasiswa);
		$i= $this->input;
		$data = array(	'id_mahasiswa' 	=> 	$id_mahasiswa,
						'status_judul'	=>	'acc'
						 );
		$this->mahasiswa_model->edit($data);
		redirect('dosen/bimbingan/detail/'.$mahasiswa->id_mahasiswa,'refresh');
	}

	public function judul_tolak($id_mahasiswa)
	{
		$mahasiswa = $this->dosen_model->mahasiswa_bimbingan_detail($id_mahasiswa);

		$data = array('id_mahasiswa' => $id_mahasiswa );
		$this->judul_model->tolak($data);
		$this->session->set_flashdata('sukses', 'Judul Ditolak');
		redirect('dosen/bimbingan/detail/'.$mahasiswa->id_mahasiswa,'refresh');
	}

	public function batal_judul($id_mahasiswa)
	{
		$mahasiswa = $this->dosen_model->mahasiswa_bimbingan_detail($id_mahasiswa);
		$i= $this->input;
		$data = array(	'id_mahasiswa' 	=> 	$id_mahasiswa,
						'status_judul'	=>	''
						 );
		$this->mahasiswa_model->edit($data);
		redirect('dosen/bimbingan/detail/'.$mahasiswa->id_mahasiswa,'refresh');
	}

	public function download($id_bm_mhs)
	{
		$this->load->helper('download');
		$file_id = $this->bimbingan_model_dsn->download($id_bm_mhs);
		$file = 'assets/upload/file/'.$file_id->file_bm_mhs;
		// print_r($file);
		// die();
		force_download($file, NULL);
	}

	public function acc($id_mahasiswa)
	{
		$mahasiswa = $this->dosen_model->mahasiswa_bimbingan_detail($id_mahasiswa);

		$data = array(	'id_user' 			=> $mahasiswa->id_user,
						'id_mahasiswa'		=> $mahasiswa->id_mahasiswa,
						'status_sidang'		=> 'acc dosen'
						 );
		// print_r($data);
		// die();
		$this->bimbingan_model_dsn->acc_sidang($data);
		redirect('dosen/bimbingan','refresh');
	}


}

/* End of file dasbor.php */
/* End of file Dasbor.php */
/* Location: ./application/controllers/pembimbing/Dasbor.php */