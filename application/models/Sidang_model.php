<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidang_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
		// listing semua user
		public function listing()
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->order_by('id_sidang', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function listing_penguji()
		{
			$this->db->select('*');
			$this->db->from('penguji');
			$this->db->order_by('penguji', 'asc');
			$query = $this->db->get();
			return $query->result();
		}

		public function listing_join()
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('judul_pkl', 'judul_pkl.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = sidang.id_user', 'left');
			$this->db->where('sidang.jadwal_sidang', '0000-00-00');
			$this->db->order_by('sidang.id_sidang', 'desc');
			$query = $this->db->get();
			return $query->result();
		}	

		public  function listing_jadwal()
		{
			// $sql = "SELECT sidang.id_sidang,mahasiswa.id_mahasiswa,penguji1.nama_dosen as penguji1,penguji2.nama_dosen as penguji2 from sidang
			// 		inner join dosen penguji1 on sidang.id_penguji_1 = penguji1.id_dosen
			// 		inner join dosen penguji2 on sidang.id_penguji_2 = penguji2.id_dosen
			// 		inner join mahasiswa on sidang.id_mahasiswa = mahasiswa.id_mahasiswa
			// 		where sidang.status_sidang = 'acc'";
			$this->db->select('sidang.id_sidang, penguji1.nama_dosen AS penguji1, penguji2.nama_dosen AS penguji2, mahasiswa.id_mahasiswa, mahasiswa.nama_mahasiswa, sidang.jadwal_sidang, users.no_induk', FALSE);
			$this->db->from('sidang');
			$this->db->join('dosen AS penguji1', 'penguji1.id_dosen = sidang.id_penguji_1', 'inner');
			$this->db->join('dosen AS penguji2', 'penguji2.id_dosen = sidang.id_penguji_2', 'inner');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa');
			$this->db->join('users', 'users.id_user = sidang.id_user');
			$this->db->where('sidang.status_sidang', 'acc');

			$query = $this->db->get();
			
			return $query->result();
		}		

		public function detail_join($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('judul_pkl', 'judul_pkl.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = sidang.id_user', 'left');
			$this->db->where('sidang.id_mahasiswa', $id_mahasiswa);
			$this->db->order_by('sidang.id_sidang', 'desc');
			$query = $this->db->get();
			return $query->row();
		}		

		public function nama_penguji($id_dosen)
		{
			$this->db->select('penguji.id_penguji,mahasiswa.nama_mahasiswa,penguji.id_dosen,penguji.id_mahasiswa,dosen.nama_dosen,penguji.penguji');
			$this->db->from('penguji');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = penguji.id_mahasiswa', 'left');
			$this->db->join('dosen', 'dosen.id_dosen = penguji.id_dosen', 'left');
			$this->db->where('penguji.id_dosen', $id_dosen);
			$this->db->order_by('penguji.id_penguji', 'asc');
			$query = $this->db->get();
			return $query->result();
		}

		public function detail($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->where('id_mahasiswa', $id_mahasiswa);
			$this->db->order_by('id_sidang', 'desc');
			$query = $this->db->get();
			return $query->row();
			
		}

		public function update($data)
		{
			$this->db->where('id_mahasiswa', $data['id_mahasiswa']);
			$this->db->update('sidang', $data);
		}

		public function detail_sidang($id_dosen)
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('judul_pkl', 'judul_pkl.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = sidang.id_user', 'left');
			$this->db->where('sidang.id_penguji_1', $id_dosen);
			$this->db->or_where('sidang.id_penguji_2', $id_dosen);
			$this->db->order_by('sidang.id_sidang', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function detail_sidang_mahasiswa($id_mahasiswa)
		{
			$this->db->select('*');
			$this->db->from('sidang');
			$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('judul_pkl', 'judul_pkl.id_mahasiswa = sidang.id_mahasiswa', 'left');
			$this->db->join('users', 'users.id_user = sidang.id_user', 'left');
			$this->db->where('sidang.id_mahasiswa', $id_mahasiswa);
			$this->db->order_by('sidang.id_sidang', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		public function input_nilai($data)
		{
			$this->db->insert('nilai_penguji', $data);
		}

		public function list_nilai_penguji($id_dosen)
		{
			$this->db->select('*');
			$this->db->from('nilai_penguji');
			$this->db->where('id_dosen', $id_dosen);
			$query = $this->db->get();
			return $query->row();
		}

		public function list_nilai_penguji_2($id_mahasiswa)
		{
			$dosen = $this->db->select('*')
								   ->from('dosen')
								   ->where('id_user',$this->session->userdata('id_user'))
								   ->get()->row();
			$this->db->select('*');
			$this->db->from('nilai_penguji');
			$this->db->where('id_mahasiswa', $id_mahasiswa);
			$this->db->where('id_dosen', $dosen->id_dosen);
			$query = $this->db->get();
			return $query->row();
		}
}