<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_model_dsn extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua user
		public function listing_mhs()
		{

			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->join('users', 'users.id_user = mahasiswa.id_user', 'left');
			$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen','left');
			// $this->db->where('mahasiswa.id_user', $id_user);
			$this->db->order_by('mahasiswa.id_user', 'desc');
			$query = $this->db->get();
			return $query->result();
			
		}

		public function detail_mhs($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('mahasiswa');
			$this->db->where('id_mahasiswa',$id_mahasiswa);
			$this->db->order_by('id_mahasiswa', 'desc');
			$query = $this->db->get();
			return $query->row();
			
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

		public function bimbingan_mhs($id_mahasiswa)
		{
			$this->db->select('bimbingan_mhs.id_bm_mhs,
								bimbingan_mhs.id_mahasiswa,
								bimbingan_mhs.file_bm_mhs,
								bimbingan_mhs.komentar_mhs,
								bimbingan_mhs.update_mhs,bimbingan_dsn.id_bm_dsn');
			$this->db->from('bimbingan_mhs');
			$this->db->join('bimbingan_dsn', 'bimbingan_dsn.id_bm_mhs = bimbingan_mhs.id_bm_mhs', 'left');
			$this->db->where('bimbingan_mhs.id_mahasiswa',$id_mahasiswa);
			$this->db->order_by('bimbingan_mhs.id_bm_mhs', 'desc');
			$query = $this->db->get();
			return $query->result();
			
		}

		public function tambah_bimbingan($data)
		{
			$this->db->insert('bimbingan_dsn', $data);
		}

		public function download($id_bm_mhs)
		{
			$this->db->select('*');
			$this->db->from('bimbingan_mhs');
			$this->db->where('id_bm_mhs',$id_bm_mhs);
			$query = $this->db->get();
			return $query->row();
			
		}	

		//  Total acc sidang
		public function total_bimbingan($id_mahasiswa)
		{
			$this->db->select('COUNT(*) AS total');
			$this->db->from('bimbingan_dsn');
			$this->db->where('id_mahasiswa', $id_mahasiswa);
			$query = $this->db->get();
			return $query->row();
		}

		public function bimbingan_dsn_cetak($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('bimbingan_dsn');
			$this->db->join('dosen', 'dosen.id_dosen = bimbingan_dsn.id_dosen', 'left');
			$this->db->where('id_mahasiswa',$id_mahasiswa);
			$this->db->order_by('id_mahasiswa', 'desc');
			$query = $this->db->get();
			return $query->result();
		}	

		public function acc_sidang($data)
		{
			$this->db->insert('sidang', $data);
		}

		// public function cek()
		// {
		// 	$id_user = $this->session->userdata('id_user');

		// 	$this->db->select('*');
		// 	$this->db->from('bimbingan_dsn');
		// 	$this->db->where('id_user', $id_user);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

}