<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_model_mhs extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua user
		public function listing_dsn($id_dosen)
		{
			$this->db->select('*');
			$this->db->from('dosen');
			$this->db->where('id_dosen', $id_dosen);
			$query = $this->db->get();
			return $query->row();
			
		}

		public function detail_mhs($id_user)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->where('id_user',$id_user);
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get();
			return $query->row();	
		}

		public function bimbingan_mhs($id_user)
		{
			$this->db->select('*');
			$this->db->from('bimbingan_mhs');
			$this->db->where('id_user',$id_user);
			$this->db->order_by('id_user', 'desc');
			$query = $this->db->get();
			return $query->result();
			
		}

		public function bimbingan_dsn($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('bimbingan_dsn');
			$this->db->where('id_mahasiswa',$id_mahasiswa);
			$this->db->order_by('id_mahasiswa', 'desc');
			$query = $this->db->get();
			return $query->result();
			
		}

		public function tambah_bimbingan($data)
		{
			$this->db->insert('bimbingan_mhs', $data);
		}

		public function download($id_bm_dsn)
		{
			$this->db->select('*');
			$this->db->from('bimbingan_dsn');
			$this->db->where('id_bm_dsn',$id_bm_dsn);
			$query = $this->db->get();
			return $query->row();
			
		}		

		

}