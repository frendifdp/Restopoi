<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'Administrator'){
			redirect('pelanggan.html','refresh');
		}
		$this->load->model('M_masakan');
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'level' => $this->session->userdata('level'),
			'menu' => 'masakan'
		);
		$this->load->view('v_masakan', $data);
	}

	public function tambah()
	{
		$var = "1234567890";
		$data['id_masakan'] = rand(0, $var);
		$data['nama_masakan'] = $this->input->post('nama');
		$data['harga_masakan'] = $this->input->post('harga');
		$data['jenis'] = $this->input->post('jenis');
		$data['status_masakan'] = $this->input->post('status');
		$data['gambar_masakan'] = $this->M_masakan->upload($data['id_masakan']);
		$this->M_masakan->tambah($data);
		redirect('masakan.html','refresh');
	}

	public function edit()
	{
		$id = $this->input->post('id_masakan');
		$data['nama_masakan'] = $this->input->post('nama');
		$data['harga_masakan'] = $this->input->post('harga');
		$data['jenis'] = $this->input->post('jenis');
		$data['status_masakan'] = $this->input->post('status');
		$data['gambar_masakan'] = $this->M_masakan->upload($id);
		$this->M_masakan->edit($id, $data);
		redirect('masakan.html','refresh');
	}

	public function hapus($id_masakan)
	{
		$this->M_masakan->hapus($id_masakan);
		redirect('masakan.html','refresh');
	}
}

/* End of file Masakan.php */
/* Location: ./application/controllers/Masakan.php */