<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('mahasiswa_model');

	}

	public function index()
	{		
			
		$id_user = $this->session->userdata('id_user');
		
		$user = $this->user_model->detail_user($id_user);
		
		$data = array(	'title' => 	'Profil', 
						'user'	=>	$user,
						'isi'	=>	'home/dasbor/list'
						);
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	public function foto()
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->mahasiswa_model->detail3($id_user);

		$config['upload_path']          = './assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|docx|doc';
        $config['max_size']             = 20000;
        $config['max_width']            = 20000;
        $config['max_height']           = 20000;
        $this->upload->initialize($config);
         if ($this->upload->do_upload('gambar_mahasiswa'))
        {
        	// die('JALAN');
        	$i= $this->input;
			$fl = $this->upload->data();
			$data = array(	'id_mahasiswa' 		=> $user->id_mahasiswa,
        					'gambar_mahasiswa'	=> $fl['file_name']);
			// print_r($data);
			// die();
			$this->mahasiswa_model->foto($data);
        	$this->session->flashdata('info','simpan');
        	redirect('home/dasbor');
        }
        else
        {
        	        			//die('JALAN');
        	print_r(array('error' => $this->upload->display_errors()));
        	die();

        	$data = array('id_user' => $id_user);
        	$this->mahasiswa_model->foto($data);
        	$this->session->flashdata('info','simpan');
        	redirect('home/dasbor');
        }
	}
	public function edit($id_user)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->user_model->detail_user($id_user);
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('email','Email','required|valid_email',
			array( 	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('password','Password','required',
			array( 'required'	=> '%s harus diisi'));

		$valid->run()===FALSE; 
			$i= $this->input;
				$data = array(	'id_user'		=> 	$id_user,
								'email'			=>	$i->post('email'),
								'no_induk'			=>	$i->post('no_induk'),
								'password'		=>	SHA1($i->post('password'))
							);
				$this->mahasiswa_model->edit_profil($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('home/dasbor'),'refresh');
		// masuk Database
	}

	public function edit_bio($id_mahasiswa)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->user_model->detail_user($id_user);
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_mahasiswa','Nama','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('prodi','Prodi','required',
			array( 'required'	=> '%s harus diisi'));

		$valid->run()===FALSE; 
			$i= $this->input;
				$data = array(	'id_mahasiswa'	=>	$id_mahasiswa,
								'id_user'		=>	$this->session->userdata('id_user'),
								'nama_mahasiswa'=>	$i->post('nama_mahasiswa'),
								'tanggal_lahir'	=>	$i->post('tanggal_lahir'),
								'tempat_lahir'	=>	$i->post('tempat_lahir'),
								'prodi'			=>	$i->post('prodi'),
								'alamat'		=>	$i->post('alamat'),
								'agama'			=>	$i->post('agama'),
								'no_tlp'		=>	$i->post('no_tlp'),
							);
				// print_r($data);
				// die();
				$this->mahasiswa_model->edit($data);
				$this->session->set_flashdata('sukses', 'Biodata diri berhasil di update');
				redirect(base_url('home/dasbor'),'refresh');
		// masuk Database
	}
}

/* End of file index.php */
/* Location: ./application/controllers/home/index.php */