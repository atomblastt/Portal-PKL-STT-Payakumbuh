<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		//proteksi halaman 
		// $this->simple_login->cek_login();
	}

	// data user
	public function index()
	{
		$user = $this->user_model->tampil();

		// print_r($user);
		// die();

		$data = array(	'title' => 'Data Pengguna' ,
						'user' 	=> $user ,
						'isi' 	=> 'admin/user/list'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_data()
	{
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Lengkap','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array( 	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('no_induk','Username / Nim','required|min_length[6]|max_length[32]|is_unique[users.no_induk]',
			array( 	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter',
					'is_unique'		=> '%s sudah ada. harap masukan no_induk yang baru'));

		$valid->set_rules('password','Password','required',
			array( 'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' => 'Tambahkan Pengguna' ,
						'isi' 	=> 'admin/user/tambah'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
			$i= $this->input;
				$akun_user_dosen = array(	
											'email'			=>	$i->post('email'),
											'no_induk'		=>	$i->post('no_induk'),
											'password'		=>	SHA1($i->post('password')),
											'akses_level'	=>	$i->post('akses_level')
							);

				$data_dosen = array(		'nama_dosen'	=>	$i->post('nama'),
											'tanggal_lahir'	=>	$i->post('tanggal_lahir'),
											'tempat_lahir'	=>	$i->post('tempat_lahir'),
											'alamat'		=>	$i->post('alamat'),
											'agama'			=>	$i->post('agama'),
											'no_tlp'		=>	$i->post('no_tlp')
							);
	if ($akun_user_dosen['akses_level']=== 'dosen') {
		$this->user_model->tambah_data_dosen($akun_user_dosen,$data_dosen);
		redirect('admin/user');
		}else{

				$akun_user_pembimbing = array(	
												'email'			=>	$i->post('email'),
												'no_induk'		=>	$i->post('no_induk'),
												'password'		=>	SHA1($i->post('password')),
												'akses_level'	=>	$i->post('akses_level')
							);

				$data_pembimbing = array(	'nama_pembimbing'=>	$i->post('nama'),
											'tanggal_lahir'	=>	$i->post('tanggal_lahir'),
											'tempat_lahir'	=>	$i->post('tempat_lahir'),
											'alamat'		=>	$i->post('alamat'),
											'agama'			=>	$i->post('agama'),
											'no_tlp'		=>	$i->post('no_tlp')
							);
		$this->user_model->tambah_data_pembimbing($akun_user_pembimbing,$data_pembimbing);
  		redirect('admin/user');
			}
		}
	}

	

	// edit user
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('email','Email','required|valid_email',
			array( 	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('password','Password','required',
			array( 'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' => 	'Edit Pengguna' ,
						'user'	=>	$user,
						'isi' 	=> 	'admin/user/edit'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i= $this->input;
				$data = array(	'id_user'		=> 	$id_user,
								'email'			=>	$i->post('email'),
								'no_induk'		=>	$i->post('no_induk'),
								'password'		=>	SHA1($i->post('password')),
								'akses_level'	=>	$i->post('akses_level')
							);
				$this->user_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('admin/user'),'refresh');
		}
		// end masuk database
	}

	// delete data
	public function delete($id_user)
	{	
		$data = array('id_user' => $id_user );
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */