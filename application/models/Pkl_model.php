<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pkl_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('user_model');
		}	
		// listing semua pkl
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('pkl');
			$this->db->order_by('pkl.id_pkl', 'desc');
			$query = $this->db->get();
			return $query->result();	
		}

				// listing semua pkl
		public function listing_kegiatan($id_user)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('kegiatan_pkl', 'kegiatan_pkl.id_user = users.id_user');
			$this->db->where('users.id_user', $id_user);
			// $this->db->order_by('kegiatan_pkl.id_kegiatan', 'desc');
			$query = $this->db->get();
			return $query->result();	
		}

		public function detail($id_user)
		{
			$this->db->select('*');
			$this->db->from('pkl');
			$this->db->where('id_user', $id_user);
			$this->db->order_by('id_pkl', 'desc');
			$query = $this->db->get();
			return $query->row();
		}


		// Detail Mahasiswa untuk home page
		public function detail_user($id_user)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('pembimbing_lapangan', 'pembimbing_lapangan.id_user = users.id_user', 'left');
			$this->db->join('mahasiswa', 'mahasiswa.id_user = users.id_user', 'left');
			$this->db->join('pkl', 'pkl.id_user = users.id_user', 'left');
			$this->db->join('kegiatan_pkl', 'kegiatan_pkl.id_user = users.id_user', 'left');
			$this->db->where('users.id_user', $id_user);
			$this->db->order_by('users.id_user', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		// Detail Mahasiswa untuk home page
		public function detail_pkl($id_pkl)
		{
			$this->db->select('*');
			$this->db->from('pkl');
			$this->db->join('users', 'users.id_user = pkl.id_user', 'left');
			$this->db->where('pkl.id_pkl', $id_pkl);
			$this->db->order_by('pkl.id_pkl', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		// Detail Mahasiswa untuk home page
		public function detail_pkl2($id_pkl)
		{
			$this->db->select('*');
			$this->db->from('pkl');
			$this->db->join('users', 'users.id_user = pkl.id_user', 'left');
			$this->db->join('mahasiswa', 'mahasiswa.id_user = pkl.id_user', 'left');
			$this->db->where('pkl.id_pkl', $id_pkl);
			$this->db->order_by('pkl.id_pkl', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		// Detail Mahasiswa untuk home page
		public function detail_kegiatan($id_user)
		{
			$this->db->select('*');
			$this->db->from('kegiatan_pkl');
			$this->db->join('users', 'users.id_user = kegiatan_pkl.id_user', 'left');
			$this->db->where('kegiatan_pkl.id_user', $id_user);
			$this->db->order_by('kegiatan_pkl.id_kegiatan', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		// Detail Mahasiswa untuk home page
		public function detail_kegiatan_edit($id_kegiatan)
		{
			$this->db->select('*');
			$this->db->from('kegiatan_pkl');
			$this->db->join('users', 'users.id_user = kegiatan_pkl.id_user', 'left');
			$this->db->where('kegiatan_pkl.id_kegiatan', $id_kegiatan);
			$this->db->order_by('kegiatan_pkl.id_kegiatan', 'desc');
			$query = $this->db->get();
			return $query->row();
		}


		public function tambah($data,$teman)
		{	
			$input = array(
				'id_user'	=> $data['id_user'],
				'nama_tempat' => $data['nama_tempat'],
				'lokasi'	=> $data['lokasi']
			);
			$this->db->insert('pkl',$input);

			foreach ($teman as $i){
				$input = array(
					'id_user' => $i,
					'nama_tempat'	=> $data['nama_tempat'],
					'lokasi'	=>	$data['lokasi']
				);
				$this->db->insert('pkl',$input);
			}
			
		}


		// edit data lokasi PKL
		public function edit_lokasi($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->update('pkl',$data);
		}

		// edit data lokasi PKL
		public function edit_lokasi_tolak($data)
		{
			$this->db->where('id_pkl', $data['id_pkl']);
			$this->db->update('pkl',$data);
		}

		// edit data
		public function edit($data)
		{
			$this->db->where('id_pkl', $data['id_pkl']);
			$this->db->update('pkl',$data);
		}

		// edit data
		public function update($data)
		{	
			$this->db->where('id_kegiatan', $data['id_kegiatan']);
			$this->db->update('kegiatan_pkl', $data);
		}

					// kegiatan PKL
					public function tambah_kegiatan($data)
					{
						$this->db->insert('kegiatan_pkl',$data);
						$this->db->insert_id();
					}

					// edit kegiatan
					public function edit_kegiatan($data)
					{
						$this->db->where('id_kegiatan', $data['id_kegiatan']);
						$this->db->update('kegiatan_pkl',$data);
					}

					// delete data
					public function hapus_kegiatan($data)
					{
						$this->db->where('id_kegiatan', $data['id_kegiatan']);
						$this->db->delete('kegiatan_pkl',$data);
					}

		public function update_pembimbing($data)
		{
			$this->db->where('id_mahasiswa', $data['id_mahasiswa']);
			$this->db->update('mahasiswa',$data);
		}

		public function surat_pkl()
		{
			$id_user = $this->session->userdata('id_user');

			$user = $this->user_model->detail_user($id_user);

			$this->db->select('*');
			$this->db->from('pkl');
			$this->db->join('users', 'users.id_user = pkl.id_user', 'left');
			$this->db->join('mahasiswa', 'mahasiswa.id_user = pkl.id_user', 'left');
			$this->db->where('pkl.nama_tempat', $user->nama_tempat);
			$query = $this->db->get();
			return $query->result();
		}

		public function detail_input($id_user)
		{
			$this->db->select('tanggal_update');
			$this->db->from('kegiatan_pkl');
			$this->db->where('id_user', $id_user);
			$this->db->order_by('tanggal_update', 'desc');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->row();
		}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */