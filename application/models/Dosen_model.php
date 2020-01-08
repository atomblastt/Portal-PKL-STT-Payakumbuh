<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua user
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('dosen');
			$this->db->join('users', 'users.id_user = dosen.id_user', 'left');
			$this->db->order_by('dosen.id_dosen', 'desc');
			$query = $this->db->get();
			return $query->result();
			
		}

		public function detail_dosen($id_user)
		{
			$this->db->select('*');
			$this->db->from('dosen');
			$this->db->join('users', 'users.id_user = dosen.id_user', 'left');
			$this->db->where('dosen.id_user', $id_user);
			$this->db->order_by('dosen.id_dosen', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		public function detail_mahasiswa($id_bm_mhs)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('bimbingan_mhs', 'bimbingan_mhs.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
			$this->db->where('bimbingan_mhs.id_bm_mhs', $id_bm_mhs);
			$query = $this->db->get();
			return $query->row();
		}

		public function mahasiswa_bimbingan($id_dosen)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->where('mahasiswa.id_dosen', $id_dosen);
			$query = $this->db->get();
			return $query->result();
		}

		public function mahasiswa_bimbingan_detail($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->where('mahasiswa.id_mahasiswa', $id_mahasiswa);
			$this->db->order_by('mahasiswa.id_mahasiswa', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		public function listing_judul($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('judul_pkl');
			$this->db->where('id_mahasiswa', $id_mahasiswa);
			$this->db->order_by('id_mahasiswa', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		// edit data user
		public function edit($data)
		{
			$this->db->where('id_dosen', $data['id_dosen']);
			$this->db->update('dosen',$data);
		}

		public function edit_profil($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->update('users',$data);
		}

		public function foto($data)
		{
			$this->db->where('id_dosen', $data['id_dosen']);
			$this->db->update('dosen', $data);
		}
}