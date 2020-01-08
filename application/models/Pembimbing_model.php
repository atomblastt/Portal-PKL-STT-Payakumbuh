<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	

		// listing semua pkl
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('pembimbing_lapangan');
			$this->db->join('users', 'users.id_user = pembimbing_lapangan.id_user', 'left');
			$this->db->order_by('pembimbing_lapangan.id_pembimbing', 'desc');
			$query = $this->db->get();
			return $query->result();	
		}

		// Detail pembimbing untuk home page
		public function detail_pembimbing($id_user)
		{
			$this->db->select('*');
			$this->db->from('pembimbing_lapangan');
			$this->db->join('users', 'users.id_user = pembimbing_lapangan.id_user', 'left');
			$this->db->where('pembimbing_lapangan.id_user', $id_user);
			$this->db->order_by('pembimbing_lapangan.id_user', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}

		// // Detail Mahasiswa untuk Pembimbing
		// public function detail_mahasiswa2($id_user)
		// {
		// 	$this->db->select('*');
		// 	$this->db->from('pembimbing_lapangan');
		// 	$this->db->join('mahasiswa', 'mahasiswa.id_pembimbing = pembimbing_lapangan.id_pembimbing', 'left');
		// 	$this->db->where('pembimbing_lapangan.id_user', $id_user);
		// 	$this->db->order_by('pembimbing_lapangan.id_pembimbing', 'ASC');
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// Detail Mahasiswa untuk Pembimbing
		public function detail_mahasiswa2($id_user)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('pembimbing_mahasiswa', 'pembimbing_mahasiswa.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
			$this->db->where('pembimbing_mahasiswa.id_user_pm', $id_user);
			$query = $this->db->get();
			return $query->row();
		}

		// Detail Mahasiswa untuk Pembimbing
		public function detail_mahasiswa3($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->where('id_mahasiswa', $id_mahasiswa);
			$query = $this->db->get();
			return $query->row();
		}

		// Detail Mahasiswa untuk home page
		public function detail($id_pembimbing)
		{
			$this->db->select('*');
			$this->db->from('pembimbing_lapangan');
			$this->db->join('users', 'users.id_user = pembimbing_lapangan.id_user', 'left');
			$this->db->where('pembimbing_lapangan.id_pembimbing', $id_pembimbing);
			$this->db->order_by('pembimbing_lapangan.id_pembimbing', 'ASC');
			$query = $this->db->get();
			return $query->row();
		}


		// Detail Mahasiswa untuk home page
		public function detail_mahasiswa()
		{
			$pembimbing = $this->db->select('*')
								   ->from('pembimbing_lapangan')
								   ->where('id_user',$this->session->userdata('id_user'))
								   ->get()->row();
			$this->db->select('mahasiswa.*');
			$this->db->from('mahasiswa');
			$this->db->join('pembimbing_lapangan', 'pembimbing_lapangan.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
			$this->db->where('mahasiswa.id_pembimbing',$pembimbing->id_pembimbing);
			// $this->db->order_by('users.id_user', 'ASC');
			$query = $this->db->get();
			return $query->result();
		}

		// // Detail kegiatan Mahasiswa untuk Pembimbing
		// public function detail_mahasiswa_kegiatan($id_user)
		// {
		// 	$this->db->select('*');
		// 	$this->db->from('pembimbing_lapangan');
		// 	$this->db->join('users', 'users.id_user = pembimbing_lapangan.id_user', 'left');
		// 	$this->db->join('kegiatan_pkl', 'kegiatan_pkl.id_mahasiswa = pembimbing_lapangan.id_mahasiswa', 'left');
		// 	$this->db->where('pembimbing_lapangan.id_user', $id_user);
		// 	$this->db->order_by('pembimbing_lapangan.id_user', 'ASC');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// Detail kegiatan Mahasiswa untuk Pembimbing
		public function detail_mahasiswa_kegiatan($id_user)
		{
			$this->db->select('*');
			$this->db->from('kegiatan_pkl');
			$this->db->join('users', 'users.id_user = kegiatan_pkl.id_user', 'left');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = kegiatan_pkl.id_mahasiswa', 'left');
			$this->db->join('pembimbing_mahasiswa', 'pembimbing_mahasiswa.id_mahasiswa = kegiatan_pkl.id_mahasiswa', 'left');
			$this->db->where('pembimbing_mahasiswa.id_user_pm', $id_user);
			$query = $this->db->get();
			return $query->result();
		}

		// Detail kegiatan Mahasiswa untuk Pembimbing
		public function detail_mahasiswa_kegiatan2($id_user)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('pembimbing_mahasiswa', 'pembimbing_mahasiswa.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
			$this->db->where('pembimbing_mahasiswa.id_user_pm', $id_user);
			$this->db->order_by('pembimbing_mahasiswa.id_user_pm', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		// Detail kegiatan Mahasiswa untuk Pembimbing
		public function detail_mahasiswa_kegiatan3($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('kegiatan_pkl');
			// $this->db->join('pembimbing_mahasiswa', 'pembimbing_mahasiswa.id_mahasiswa = kegiatan_pkl.id_mahasiswa', 'left');
			$this->db->where('id_mahasiswa', $id_mahasiswa);
			$this->db->order_by('id_kegiatan', 'ASC');
			$query = $this->db->get();
			return $query->result();
		}

		
		public function detail_kegiatan($id_kegiatan)
		{
			$this->db->select('*');
			$this->db->from('kegiatan_pkl');
			$this->db->join('users', 'users.id_user = kegiatan_pkl.id_user', 'left');
			$this->db->where('kegiatan_pkl.id_kegiatan', $id_kegiatan);
			$this->db->order_by('kegiatan_pkl.id_kegiatan', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function tengah()
		{
			$pembimbing = $this->db->select('*')
								   ->from('pembimbing_lapangan')
								   ->where('id_user',$this->session->userdata('id_user'))
								   ->get()->row();

			$this->db->select('*');
			$this->db->from('pembimbing_mahasiswa');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembimbing_mahasiswa.id_mahasiswa', 'left');
			$this->db->join('pembimbing_lapangan', 'pembimbing_lapangan.id_pembimbing = pembimbing_mahasiswa.id_pembimbing', 'left');
			$this->db->where('pembimbing_mahasiswa.id_pembimbing', $pembimbing->id_pembimbing);
			$query = $this->db->get();
			return $query->result();
		}

		public function edit_kegiatan($data)
		{
			$this->db->where('id_kegiatan', $data['id_kegiatan']);
			$this->db->update('kegiatan_pkl',$data);
		}

		// edit data user
		public function edit($data)
		{
			$this->db->where('id_pembimbing', $data['id_pembimbing']);
			$this->db->update('pembimbing_lapangan',$data);
		}

		public function edit_profil($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->update('users',$data);
		}

		public function edit_tengah($data)
		{
			$this->db->where('id_mahasiswa', $data['id_mahasiswa']);
			$this->db->update('pembimbing_mahasiswa',$data);
		}

		public function foto($data)
		{
			$this->db->where('id_pembimbing', $data['id_pembimbing']);
			$this->db->update('pembimbing_lapangan', $data);
		}
}

/* End of file Pembimbing_model.php */
/* Location: ./application/models/Pembimbing_model.php */