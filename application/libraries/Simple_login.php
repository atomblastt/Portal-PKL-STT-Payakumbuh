<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // load model
        $this->CI->load->model('user_model');
	}

	// fungsi login user
	public function login_prodi($username,$password)
	{
		$check = $this->CI->user_model->login_prodi($username,$password);
		// jika ada data user, maka buat session loginnya
		if ($check) {
			$id_user		=	$check->id_user;
			$email			=	$check->email;
			$akses_level	=	$check->akses_level;
			// buat session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('no_induk',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			if ($akses_level === 'prodi') {
				// lemparkan ke halaman admin yang di proteksi
			redirect(base_url('admin/dasbor'),'refresh');

			}elseif ($akses_level === 'pembimbing_lapangan') {
			redirect(base_url('pembimbing/dasbor'),'refresh');

			}elseif ($akses_level === 'mahasiswa') {
			redirect(base_url('home/dasbor'),'refresh');
			
			}elseif ($akses_level === 'dosen'){
			redirect(base_url('dosen/dasbor'),'refresh');

			}else{

				// jika username dan password salah
			$this->CI->session->set_flashdata('warning','Username atau Password yang anda masukan SALAH !!!');
			redirect(base_url('login/prodi'),'refresh');
			}
		}
	}

	// fungsi login user
	public function login_dosen($username,$password)
	{
		$check = $this->CI->user_model->login_dosen($username,$password);
		// jika ada data user, maka buat session loginnya
		if ($check) {
			$id_user		=	$check->id_user;
			$email			=	$check->email;
			$akses_level	=	$check->akses_level;
			// buat session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('no_induk',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			redirect(base_url('dosen/dasbor'),'refresh');
			}else{
				// jika username dan password salah
			$this->CI->session->set_flashdata('warning','Username atau Password yang anda masukan SALAH !!!');
			redirect(base_url('login'),'refresh');
			}
		}

	// fungsi login user
	public function login_mahasiswa($username,$password)
	{
		$check = $this->CI->user_model->login_mahasiswa($username,$password);
		// jika ada data user, maka buat session loginnya
		if ($check) {
			$id_user		=	$check->id_user;
			$email			=	$check->email;
			$akses_level	=	$check->akses_level;
			// buat session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('no_induk',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			redirect(base_url('home/dasbor'),'refresh');
			}else{

				// jika username dan password salah
			$this->CI->session->set_flashdata('warning','Username atau Password yang anda masukan SALAH !!!');
			redirect(base_url('login'),'refresh');
			}
		}

	// fungsi login user
	public function login_p_lapangan($username,$password)
	{
		$check = $this->CI->user_model->login_p_lapangan($username,$password);
		// jika ada data user, maka buat session loginnya
		if ($check) {
			$id_user		=	$check->id_user;
			$email			=	$check->email;
			$akses_level	=	$check->akses_level;
			// buat session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('no_induk',$username);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			redirect(base_url('pembimbing/dasbor'),'refresh');
			}else{
				// jika username dan password salah
			$this->CI->session->set_flashdata('warning','Username atau Password yang anda masukan SALAH !!!');
			redirect(base_url('login'),'refresh');
			}
		}

		
	// fungsi cek login
	public function cek_login()
	{
		// memeriksa apakah session sudah ada , jika belum maka lemparkan ke halaman login
		if ($this->CI->session->userdata('no_induk') == "") {
			$this->CI->session->set_flashdata('warning','Silahkan Login Terlebih Dahulu');
			redirect(base_url('login'),'refresh');
		}
	}

	// fungsi cek login
	public function cek_akses_level()
	{
		// memeriksa apakah session sudah ada , jika belum maka lemparkan ke halaman login
		if ($this->CI->session->userdata('akses_level') == "mahasiswa") {
			// $this->CI->session->set_flashdata('warning','Anda Bukan Admin');
			redirect(base_url('login/user'),'refresh');
		}
	}

	// fungsi logout
	public function logout()
	{
		// membuang semua session di saat login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('no_induk');
		$this->CI->session->unset_userdata('akses_level');
		// jika logout berhasil , redirect ke halaman login
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url(),'refresh');
		}

}
