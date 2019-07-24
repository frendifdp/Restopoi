<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengguna extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_level($level)
	{
		$out = $this->db->where('nama_level', $level)->get('level')->result();
		return $out[0]->id_level;
	}

	public function last()
	{
		$id = $this->db->where('nama_level', 'Pelanggan')->get('level')->result();
		$temp = $this->db->where('id_level', $id[0]->id_level)->get('user')->num_rows();
		return $temp+1;

	}

	public function tambah($data)
	{
		$this->db->insert('user', $data);
	}

	public function hapus($id)
	{
		$this->db->where('id_user', $id)->delete('user');
	}

}

/* End of file  */
/* Location: ./application/models/ */