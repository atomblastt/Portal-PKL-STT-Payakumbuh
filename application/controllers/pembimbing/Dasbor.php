<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('pembimbing_model');

	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->pembimbing_model->detail_pembimbing($id_user);
		// print_r($user);
		// die();
		$data = array(	'title' => 	'Profil Pembimbing Lapangan', 
						'user'	=>	$user,
						'isi'	=>	'pembimbing/dasbor/list'
						);
		$this->load->view('pembimbing/layout/wrapper', $data, FALSE);
	}


	public function foto($id_pembimbing)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->pembimbing_model->detail_pembimbing($id_user);

		$config['upload_path']          = './assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|docx|doc';
        $config['max_size']             = 20000;
        $config['max_width']            = 20000;
        $config['max_height']           = 20000;
        $this->upload->initialize($config);
         if ($this->upload->do_upload('gambar_p_lapangan'))
        {
        	// die('JALAN');
        	$i= $this->input;
			$fl = $this->upload->data();
			$data = array(	'id_pembimbing' 	=> $user->id_pembimbing,
        					'gambar_p_lapangan'	=> $fl['file_name']);
			// print_r($data);
			// die();
			$this->pembimbing_model->foto($data);
        	$this->session->flashdata('info','simpan');
        	redirect('pembimbing/dasbor');
        }
        else
        {
        	        			//die('JALAN');
        	print_r(array('error' => $this->upload->display_errors()));
        	die();

        	$data = array('id_user' => $id_user);
        	$this->pembimbing_model->foto($data);
        	$this->session->flashdata('info','simpan');
        	redirect('pembimbing/dasbor');
        }
	}
	public function edit($id_user)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->pembimbing_model->detail_pembimbing($id_user);
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
				$this->pembimbing_model->edit_profil($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('pembimbing/dasbor'),'refresh');
		// masuk Database
	}

	public function edit_bio($id_pembimbing)
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->pembimbing_model->detail_pembimbing($id_user);
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_pembimbing','Nama','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('prodi','Prodi','required',
			array( 'required'	=> '%s harus diisi'));

		$valid->run()===FALSE; 
			$i= $this->input;
				$data = array(	'id_pembimbing'	=>	$id_pembimbing,
								'id_user'		=>	$this->session->userdata('id_user'),
								'nama_pembimbing'=>	$i->post('nama_pembimbing'),
								'tanggal_lahir'	=>	$i->post('tanggal_lahir'),
								'tempat_lahir'	=>	$i->post('tempat_lahir'),
								'instusi'		=>	$i->post('instusi'),
								'alamat'		=>	$i->post('alamat'),
								'agama'			=>	$i->post('agama'),
								'no_tlp'		=>	$i->post('no_tlp'),
							);
				// print_r($data);
				// die();
				$this->pembimbing_model->edit($data);
				$this->session->set_flashdata('sukses', 'Biodata diri berhasil di update');
				redirect(base_url('pembimbing/dasbor'),'refresh');
		// masuk Database
	}

}

/* End of file dasbor.php */
/* End of file Dasbor.php */
/* Location: ./application/controllers/pembimbing/Dasbor.php */