<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	

	// Detail Mahasiswa untuk Pembimbing
	public function detail_mahasiswa($id_user)
	{
		$this->db->select('*');
		$this->db->from('pembimbing_mahasiswa');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembimbing_mahasiswa.id_mahasiswa', 'left');
		$this->db->where('pembimbing_mahasiswa.id_user_pm', $id_user);
		$query = $this->db->get();
		return $query->result();
	}

	// Detail Mahasiswa untuk Pembimbing
	public function detail_mahasiswa_row($id_mahasiswa)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('nilai_mhs', 'nilai_mhs.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
		$this->db->join('pembimbing_mahasiswa', 'pembimbing_mahasiswa.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
		$this->db->where('pembimbing_mahasiswa.id_mahasiswa', $id_mahasiswa);
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		$this->db->insert('nilai_mhs', $data);
	}

	public function cek_nilai_pkl($id_mahasiswa)
	{
		$this->db->select('id_mahasiswa');
		$this->db->from('nilai_mhs');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$query = $this->db->get();
		return $query->row();
	}

	// ------------------------------------------------------------------------------------------

	// Detail Mahasiswa untuk Pembimbing
	public function list_mahasiswa()
	{	
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('mahasiswa', 'mahasiswa.id_user = users.id_user', 'left');
		$this->db->join('judul_pkl', 'judul_pkl.id_user = users.id_user', 'left');
		$this->db->where('users.akses_level', 'mahasiswa');
		$query = $this->db->get();
		return $query->result();
	}

	// Rekap Nilai
	public function rekap($id_mahasiswa)
	{	
		$this->db->select('*');
		$this->db->from('nilai_penguji');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = nilai_penguji.id_mahasiswa', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = nilai_penguji.id_dosen', 'left');
		$this->db->join('sidang', 'sidang.id_mahasiswa = nilai_penguji.id_mahasiswa', 'left');
		$this->db->where('nilai_penguji.id_mahasiswa', $id_mahasiswa);
		$query = $this->db->get();
		return $query->result();
	}	

	// Rekap Nilai
	public function rekap_pkl($id_mahasiswa)
	{	
		$this->db->select('*');
		$this->db->from('nilai_mhs');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$query = $this->db->get();
		return $query->row();
	}	

	public function cek($id_mahasiswa)
	{
		$this->db->select('count(id_mahasiswa) as bro');
		$this->db->from('nilai_penguji');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$query = $this->db->get();
		return $query->row();
	}

	// Rekap Nilai
	public function penguji1($id_mahasiswa)
	{	
		$this->db->select('*');
		$this->db->from('nilai_penguji');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = nilai_penguji.id_mahasiswa', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = nilai_penguji.id_dosen', 'left');
		$this->db->join('sidang', 'sidang.id_mahasiswa = nilai_penguji.id_mahasiswa', 'left');
		$this->db->where('nilai_penguji.id_mahasiswa', $id_mahasiswa);
		$this->db->where('nilai_penguji.penguji', 1);
		$query = $this->db->get();
		return $query->row();
	}	

	// Rekap Nilai
	public function penguji2($id_mahasiswa)
	{	
		$this->db->select('*');
		$this->db->from('nilai_penguji');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = nilai_penguji.id_mahasiswa', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = nilai_penguji.id_dosen', 'left');
		$this->db->join('sidang', 'sidang.id_mahasiswa = nilai_penguji.id_mahasiswa', 'left');
		$this->db->where('nilai_penguji.id_mahasiswa', $id_mahasiswa);
		$this->db->where('nilai_penguji.penguji', 2);
		$query = $this->db->get();
		return $query->row();
	}	
}

/* End of file Nilai_model.php */
/* Location: ./application/models/Nilai_model.php */