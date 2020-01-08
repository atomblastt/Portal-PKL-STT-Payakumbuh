<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pkl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('pkl_model');
		$this->load->model('pembimbing_model');
		$this->load->model('mahasiswa_model');
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->user_model->detail_user($id_user);

		// print_r($user);
		// die();
		
		$data = array(	'title' => 	'Profil PKL', 
						'user'	=>	$user,
						'isi'	=>	'home/pkl/list'
						);
		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	// Tambah user
	public function tambah()
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->user_model->detail_user($id_user);

		$data_user = $this->user_model->listing_user_data();

		// print_r($data_user);
		// die();
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_tempat','Nama Instusi Harus Lengkap','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('lokasi','Lokasi','required',
			array( 	'required'		=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' => 'Pendaftaran Lokasi PKL' ,
						'user'			=>	$user,
						'data_user'		=> $data_user,
						'isi' 	=> 'home/pkl/tambah'
						);	
		$this->load->view('home/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i= $this->input;
				$data = array(	'id_user'		=>  $id_user,
								'nama_tempat'	=>	$i->post('nama_tempat'),
								'lokasi'		=>	$i->post('lokasi')
							);
				$teman = $this->input->post('teman[]');
				
				// print_r($data);
				// die();
				$this->pkl_model->tambah($data,$teman);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
				
				redirect(base_url('home/pkl'),'refresh');
		}
		// end masuk database
	}

	// edit Lokasi PKL
	public function edit($id_user)
	{
		$user = $this->user_model->detail_user($id_user);
		
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_tempat','Nama Lengkap Instusi','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('lokasi','Lokasi PKL','required',
			array( 	'required'		=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' => 	'Edit Lokasi PKL' ,
						'user'	=>	$user,
						'isi' 	=> 	'home/pkl/edit'
						);	
		$this->load->view('home/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i= $this->input;
				$data = array(	'id_user'		=> 	$id_user,
								'nama_tempat'	=>	$i->post('nama_tempat'),
								'lokasi'		=>	$i->post('lokasi')
							);
				$this->pkl_model->edit_lokasi($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('home/pkl'),'refresh');
		}
		// end masuk database
	}

	// edit Lokasi PKL
	public function edit_tolak($id_pkl)
	{
		$id_user = $this->session->userdata('id_user');
		$user = $this->pkl_model->detail_pkl2($id_pkl);
		$data_user = $this->user_model->listing_user_data();
		
		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_tempat','Nama Lengkap Instusi','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('lokasi','Lokasi PKL','required',
			array( 	'required'		=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi

		$data = array(	'title' 	=> 	'Edit Lokasi PKL' ,
						'user'		=>	$user,
						'data_user'	=>	$data_user,
						'isi' 		=> 	'home/pkl/edit'
						);	
		$this->load->view('home/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{
				$i= $this->input;
				$data = array(	'id_pkl'		=> 	$id_pkl,
								'nama_tempat'	=>	$i->post('nama_tempat'),
								'lokasi'		=>	$i->post('lokasi'),
								'status_pkl'	=> 'peninjauan'
							);

				$this->pkl_model->edit_lokasi_tolak($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				// die();
				redirect(base_url('home/pkl'),'refresh');
		}
		// end masuk database
	}


	public function kegiatan()
	{
		$id_user = $this->session->userdata('id_user');

		$user = $this->user_model->detail_user($id_user);
		
		$kegiatan = $this->pkl_model->detail_kegiatan($id_user);

		$cek = $this->pkl_model->detail_input($id_user);
		
		
		// print_r($cek);
		// die();
		$data = array(	'title' 		=> 	'Kegiatan Praktek Kerja Lapangan', 
						'user'			=>	$user,
						'kegiatan'		=>	$kegiatan,
						'cek'			=> 	$cek,
						'isi'			=>	'home/pkl/kegiatan'
						);
		// print_r($kegiatan_edit);
		// die();

		$this->load->view('home/layout/wrapper', $data, FALSE);
	}

	public function tambah_kegiatan()
	{
		$id_user = $this->session->userdata('id_user');
		$id_mahasiswa = $this->mahasiswa_model->detail3($id_user);
		$user = $this->user_model->detail_user($id_user);
		$i = $this->input;
		$data = array(	'id_user' 			=> $id_user,
						'id_mahasiswa'		=> $id_mahasiswa->id_mahasiswa,
						'kegiatan'			=> $i->post('kegiatan'),
						'tanggal_update'	=> date("Y-m-d"),
						'waktu_update'		=> date("H:i:s")
						 );
		// print_r($data);
		// die();
		$this->pkl_model->tambah_kegiatan($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Tambahkan');
		redirect(base_url('home/pkl/kegiatan'),'refresh');
	}

	public function edit_kegiatan($id_kegiatan)
	{
		$user = $this->pkl_model->detail_kegiatan_edit($id_kegiatan);
		
		$valid = $this->form_validation;

		$valid->set_rules('kegiatan','Kegiatan','required',
			array( 	'required'		=> '%s harus diisi'));
		
		if ($valid->run()===FALSE) {

		$data = array(	'title' => 	'Edit Kegiatan' ,
						'user'	=>	$user,
						'isi' 	=> 	'home/pkl/edit_kegiatan'
						);	
		$this->load->view('home/layout/wrapper', $data, FALSE);
		}else{
		// masuk Database
				$i= $this->input;
				$data = array(	'id_kegiatan' 	=> $id_kegiatan,
								'kegiatan'		=> $i->post('kegiatan')
							);
				$this->pkl_model->edit_kegiatan($data);
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
				redirect(base_url('home/pkl/kegiatan'),'refresh');
		}
		// end masuk database
	}

	public function hapus_kegiatan($id_kegiatan)
	{
		$data = array('id_kegiatan' => $id_kegiatan );
		$this->pkl_model->hapus_kegiatan($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		redirect(base_url('home/pkl/kegiatan'),'refresh');
	}

		public function tambah_image(){
		$id_user = $this->session->userdata('id_user');
		$config['upload_path']          = './assets/upload/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 20000;
        $config['max_width']            = 20000;
        $config['max_height']           = 20000;
        $this->upload->initialize($config);
         if ($this->upload->do_upload('image'))
        {
			$gbr = $this->upload->data();
			$data = array(	'id_user' 	=> $id_user,
        					'gambar'	=> $gbr['file_name']);
			$this->pkl_model->tambah_kegiatan($data);
        	$this->session->flashdata('info','simpan');
        	redirect('home/pkl/kegiatan');
        }
        else
        {
        	$data = array('id_user' => $id_user);
        	$this->pkl_model->tambah_kegiatan($data);
        	$this->session->flashdata('info','simpan');
        	redirect('home/pkl/kegiatan');
        }
		}

		public function list_pembimbing()
		{
			$id_user = $this->session->userdata('id_user');
			
			$user = $this->user_model->detail_user($id_user);

			$id_pembimbing = $user;

			$pembimbing = $this->pembimbing_model->listing();

			$pembimbing_pilihan = $this->mahasiswa_model->detail_pembimbing($id_user);

			$tampil_pilih = $this->mahasiswa_model->detail_pm($id_user);

			$data = array(	'title' 				=> 	'Pilih pembimbing lapangan sesuai lokasi pkl',
							'user'					=> 	$user,
							'pembimbing'			=> 	$pembimbing,
							'pembimbing_pilihan'	=>	$pembimbing_pilihan,
							'tampil_pilih'			=>	$tampil_pilih,
							'isi'					=>	'home/pkl/pembimbing'
						 );
			$this->load->view('home/layout/wrapper', $data, FALSE);
		}

		public function pilih_pembimbing($id_pembimbing)
		{	
		$id_user= $this->session->userdata('id_user');
		$id_mahasiswa= $this->mahasiswa_model->detail2($id_user);
		// $status_pkl = $this->input->post('status_pkl');
		$id_pembimbing = $this->pembimbing_model->detail($id_pembimbing);
		// print_r($id_pembimbing);
		// die();
		$i = $this->input;
		$data = array(	'id_user' 			=> $this->session->userdata('id_user'),
						'id_pembimbing' 	=> $id_pembimbing->id_pembimbing, 
						'id_mahasiswa'		=> $id_mahasiswa->id_mahasiswa
					);
		$this->mahasiswa_model->tambah_tengah($data);
		$this->session->set_flashdata('sukses', 'Pembimbing Lapangan berhasil di Update');
		redirect('home/pkl/list_pembimbing','refresh');
		
		}

		public function batal_pilih_pembimbing($id_user)
		{
			$id_user = $this->session->userdata('id_user');

			$id_mahasiswa= $this->mahasiswa_model->detail2($id_user);

			$i = $this->input;
				$data = array(	'id_user'			=>$this->session->userdata('id_user'),
								'id_pembimbing' 	=> '',
								'id_mahasiswa'		=> $id_mahasiswa->id_mahasiswa
							);
				$this->mahasiswa_model->edit_tengah($data);
				$this->session->set_flashdata('sukses', 'Pembimbing Lapangan berhasil di Update');
				redirect('home/pkl/list_pembimbing','refresh');
		}

}

/* End of file pkl.php */
/* Location: ./application/controllers/home/pkl.php */