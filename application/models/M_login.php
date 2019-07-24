<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function login($data)
	{
		$cek = $this->db->where('username', $data['username'])->
							where('password', md5($data['password']))->
							get('user');
		if($cek->num_rows() > 0){
			$out = $cek->result();
			$lv = $this->db->where('id_level', $out[0]->id_level)->get('level')->result();
			$sess = array('id_user' => $out[0]->id_user, 'nama' => ucwords($out[0]->username), 'level' => $lv[0]->nama_level, 'login' => TRUE);
			$this->session->set_userdata($sess);
			if($this->session->userdata('level') == 'Pelanggan'){
				return 2;
			}
			else{
				return 1;
			}
		}
		else{
			return 0;
		}
	}

	public function registrasi($data)
	{
		$cek = $this->db->where('username', $data['username'])->get('user')->num_rows();
		if($cek == 1){
			return 0;
		}
		else{
			$this->db->insert('user', $data);
			return 1;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function get_meja()
	{
		return $this->db->where('status', '1')->get('meja')->result();
	}
}

/* End of file M_login.php */
/* Location: ./application/model/M_login.php */