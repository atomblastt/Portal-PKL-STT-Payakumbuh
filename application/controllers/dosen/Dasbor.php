<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('dosen_model');

	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->dosen_model->detail_dosen($id_user);
		$id_dosen = $this->dosen_model->detail_dosen($id_user);
		// print_r($user);
		// die();
		$data = array(	'title' 	=> 	'Profil Dosen', 
						'user'		=>	$user,
						'id_dosen'	=>	$id_dosen,
						'isi'		=>	'dosen/dasbor/list'
						);
		$this->load->view('dosen/layout/wrapper', $data, FALSE);
	}


	public function foto($id_dosen)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->dosen_model->detail_dosen($id_user);

		$config['upload_path']          = './assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|docx|doc';
        $config['max_size']             = 20000;
        $config['max_width']            = 20000;
        $config['max_height']           = 20000;
        $this->upload->initialize($config);
         if ($this->upload->do_upload('gambar_dosen'))
        {
        	// die('JALAN');
        	$i= $this->input;
			$fl = $this->upload->data();
			$data = array(	'id_dosen' 	=> $user->id_dosen,
        					'gambar_dosen'	=> $fl['file_name']);
			// print_r($data);
			// die();
			$this->dosen_model->foto($data);
        	$this->session->flashdata('info','simpan');
        	redirect('dosen/dasbor');
        }
        else
        {
        	        			//die('JALAN');
        	print_r(array('error' => $this->upload->display_errors()));
        	die();

        	$data = array('id_user' => $id_user);
        	$this->dosen_model->foto($data);
        	$this->session->flashdata('info','simpan');
        	redirect('dosen/dasbor');
        }
	}
	public function edit($id_user)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->dosen_model->detail_dosen($id_user);
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
								'no_induk'		=>	$i->post('no_induk'),
								'password'		=>	SHA1($i->post('password'))
							);
				$this->dosen_model->edit_profil($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('dosen/dasbor'),'refresh');
		// masuk Database
	}

	public function edit_bio($id_dosen)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->dosen_model->detail_dosen($id_user);
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_dosen','Nama','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('prodi','Prodi','required',
			array( 'required'	=> '%s harus diisi'));

		$valid->run()===FALSE; 
			$i= $this->input;
				$data = array(	'id_dosen'	=>	$id_dosen,
								'id_user'		=>	$this->session->userdata('id_user'),
								'nama_dosen'=>	$i->post('nama_dosen'),
								'tanggal_lahir'	=>	$i->post('tanggal_lahir'),
								'tempat_lahir'	=>	$i->post('tempat_lahir'),
								'alamat'		=>	$i->post('alamat'),
								'agama'			=>	$i->post('agama'),
								'no_tlp'		=>	$i->post('no_tlp'),
							);
				// print_r($data);
				// die();
				$this->dosen_model->edit($data);
				$this->session->set_flashdata('sukses', 'Biodata diri berhasil di update');
				redirect(base_url('dosen/dasbor'),'refresh');
		// masuk Database
	}

}

/* End of file dasbor.php */
/* End of file Dasbor.php */
/* Location: ./application/controllers/pembimbing/Dasbor.php */