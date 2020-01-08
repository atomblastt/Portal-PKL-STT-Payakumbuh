<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	//halaman login
	// public function index(){

	// 	// // validasi
	// 	// $this->form_validation->set_rules('no_induk','Id','required',
	// 	// 		array('required' => 'Harus di isi' ));
	// 	// $this->form_validation->set_rules('password','Password','required',
	// 	// 		array('required' => 'Harus di isi' ));

	// 	// if ($this->form_validation->run()) {
	// 	// 	$username 	= $this->input->post('no_induk');
	// 	// 	$password 	= $this->input->post('password');
	// 	// 	// prosses ke simple login
	// 	// 	$this->simple_login->login($username,$password);
	// 	// }
	// 	// // end validasi
	// 	// $data = array( 'title' 	=> 	'Login');
	// 	// $this->load->view('login/list', $data, FALSE);
	// 	 }

		public function prodi(){

		// validasi
		$this->form_validation->set_rules('no_induk','Id','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('no_induk');
			$password 	= $this->input->post('password');

			// print_r($username);
			// print_r($password);
			// die();
			// prosses ke simple login
			$this->simple_login->login_prodi($username,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login');
		$this->load->view('login/list_prodi', $data, FALSE);
		}

		public function dosen(){

		// validasi
		$this->form_validation->set_rules('no_induk','Id','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('no_induk');
			$password 	= $this->input->post('password');
			// prosses ke simple login
			$this->simple_login->login_dosen($username,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login');
		$this->load->view('login/list_dosen', $data, FALSE);
		}

		public function mahasiswa(){

		// validasi
		$this->form_validation->set_rules('no_induk','Id','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('no_induk');
			$password 	= $this->input->post('password');
			// prosses ke simple login
			$this->simple_login->login_mahasiswa($username,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login');
		$this->load->view('login/list_mahasiswa', $data, FALSE);
		}

		public function p_lapangan(){

		// validasi
		$this->form_validation->set_rules('no_induk','Id','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('no_induk');
			$password 	= $this->input->post('password');
			// prosses ke simple login
			$this->simple_login->login_p_lapangan($username,$password);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login');
		$this->load->view('login/list_p_lapangan', $data, FALSE);
		}
		
		// ambil fungsi logout
		public function logout()
		{
			$this->simple_login->logout();
		}
		
}