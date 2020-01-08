<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		//proteksi halaman 
		// $this->simple_login->cek_login();
	}

	// registrasi mahasiswa
	public function index()
	{
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_mahasiswa','Nama Lengkap','required',
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

		$data = array(	'title' => 'Registrasi');	

		$this->load->view('login/registrasi', $data, FALSE);
		// masuk Database
			}else{
			$i= $this->input;
			$p1= $i->post('password'); 
			$p2= $i->post('password2');
			if ($p1 <> $p2) {
				echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";
			}else{
				$user 	 		= array(	
											'email'			=>	$i->post('email'),
											'no_induk'		=>	$i->post('no_induk'),
											'password'		=>	SHA1($i->post('password'))
							);

				$data_mahasiswa = array(	'nama_mahasiswa'=>	$i->post('nama_mahasiswa'),
											'tanggal_lahir'	=>	$i->post('tanggal_lahir'),
											'tempat_lahir'	=>	$i->post('tempat_lahir'),
											'prodi'			=>	$i->post('prodi'),
											'alamat'		=>	$i->post('alamat'),
											'agama'			=>	$i->post('agama'),
											'no_tlp'		=>	$i->post('no_tlp')
							);

		$this->user_model->registrasi($user,$data_mahasiswa);
  		redirect('login');
			}
		}
	}
}

/* End of file registrasi.php */
/* Location: ./application/controllers/registrasi.php */