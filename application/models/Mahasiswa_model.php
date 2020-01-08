<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua user
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('dosen', 'dosen.id_user = users.id_user', 'left');
			$this->db->join('mahasiswa', 'mahasiswa.id_user = users.id_user', 'left');
			$this->db->join('pembimbing_lapangan', 'pembimbing_lapangan.id_user = users.id_user', 'left');
			$this->db->order_by('users.id_user', 'desc');
			$query = $this->db->get();
			return $query->result();
			
		}
		// Detail Mahasiswa untuk Pembimbing
		public function detail3($id_user)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->where('mahasiswa.id_user', $id_user);
			$this->db->order_by('mahasiswa.id_mahasiswa', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		// Detail Mahasiswa untuk Pembimbing
		public function detail2($id_user)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->where('mahasiswa.id_user', $id_user);
			$this->db->order_by('mahasiswa.id_mahasiswa', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}
		
		// Detail Mahasiswa untuk Pembimbing
		public function detail($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->where('mahasiswa.id_mahasiswa', $id_mahasiswa);
			$this->db->order_by('mahasiswa.id_mahasiswa', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		// Detail Mahasiswa untuk home page
		public function detail_user($id_user)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('mahasiswa', 'mahasiswa.id_user = users.id_user', 'left');
			$this->db->join('pkl', 'pkl.id_user = users.id_user', 'left');
			$this->db->join('kegiatan_pkl', 'kegiatan_pkl.id_user = users.id_user', 'left');
			$this->db->where('users.id_user', $id_user);
			$this->db->order_by('users.id_user', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		public function detail_pmb($id_user)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('pembimbing_lapangan', 'pembimbing_lapangan.id_pembimbing = mahasiswa.id_pembimbing', 'left');
			$this->db->where('mahasiswa.id_user', $id_user);
			$query = $this->db->get();
			return $query->row();
		}
		

		public function detail_pembimbing($id_user)
		{

			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('pembimbing_lapangan', 'pembimbing_lapangan.id_pembimbing = mahasiswa.id_pembimbing', 'left');
			$this->db->where('mahasiswa.id_user', $id_user);
			$this->db->order_by('mahasiswa.id_user', 'ASC');
			$query = $this->db->get();
			return $query->row();			

			// $this->db->select('*');
			// $this->db->from('users');
			// $this->db->join('mahasiswa', 'mahasiswa.id_user = users.id_user', 'left');
			// $this->db->join('pembimbing_lapangan', 'pembimbing_lapangan.id_user = users.id_user', 'left');
			// $this->db->where('users.id_user', $id_user);
			// // $this->db->order_by('mahasiswa.id_mahasiswa', 'ASC');
			// $query = $this->db->get();
			// return $query->row();
		}
		// edit data user
		public function edit($data)
		{
			$this->db->where('id_mahasiswa', $data['id_mahasiswa']);
			$this->db->update('mahasiswa',$data);
		}

		public function edit_profil($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->update('users',$data);
		}

	// delete data
		public function delete($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->delete('users',$data);
		}

		public function tambah_tengah($data)
		{
			$this->db->insert('pembimbing_mahasiswa', $data);
		}

		public function edit_tengah($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->update('pembimbing_mahasiswa', $data);
		}

		public function detail_pm($id_user)
		{

			$this->db->select('*');
			$this->db->from('pembimbing_mahasiswa');
			$this->db->join('pembimbing_lapangan', 'pembimbing_lapangan.id_pembimbing = pembimbing_mahasiswa.id_pembimbing', 'left');
			$this->db->where('pembimbing_mahasiswa.id_user', $id_user);
			$query = $this->db->get();
			return $query->row();			
		}

		public function foto($data)
		{
			$this->db->where('id_mahasiswa', $data['id_mahasiswa']);
			$this->db->update('mahasiswa', $data);
		}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */