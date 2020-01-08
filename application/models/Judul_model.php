<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judul_Model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua user
		public function listing($id_user)
		{
			$this->db->select('*');
			$this->db->from('judul_pkl');
			$this->db->where('id_user', $id_user);
			$query = $this->db->get();
			return $query->row();
			
		}

		public function tambah($data)
		{
			$this->db->insert('judul_pkl', $data);
		}

		public function edit($data)
		{
			$this->db->where('id_user', $data['id_user']);
			$this->db->update('judul_pkl', $data);
		}

		public function tolak($data)
		{
			$this->db->where('id_mahasiswa', $data['id_mahasiswa']);
			$this->db->delete('judul_pkl', $data);
		}

}