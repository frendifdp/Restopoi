<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'Administrator'){
			redirect('pelanggan.html','refresh');
		}
		$this->load->model('M_pengguna');
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'level' => $this->session->userdata('level'),
			'menu' => 'pengguna'
		);
		$this->load->view('v_pengguna', $data);
	}

	public function tambah_pelanggan()
	{
		$data = array(
			'username' => strtolower($this->input->post('username')),
			'nama_user' => ucwords($this->input->post('nama_user')),
			'password' => md5($this->input->post('username')),
			'id_level' => $this->M_pengguna->get_level('Pelanggan')
		);
		$this->M_pengguna->tambah($data);
		redirect('pengguna','refresh');
	}

	public function hapus($id)
	{
		$this->M_pengguna->hapus($id);
		redirect('pengguna','refresh');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */