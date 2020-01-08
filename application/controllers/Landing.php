<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$data = array(	'title' => 'Selamat Datang',
						'isi'	=> 'landing/list'
					 );
		$this->load->view('landing/layout/wrapper', $data, FALSE);
	}

}

/* End of file Landing.php */
/* Location: ./application/controllers/Landing.php */