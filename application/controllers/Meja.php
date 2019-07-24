<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'Administrator'){
			redirect('pelanggan.html','refresh');
		}
		$this->load->model('M_meja');
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'level' => $this->session->userdata('level'),
			'menu' => 'meja'
		);
		$this->load->view('v_meja', $data);
	}

	public function error()
	{
		echo "<script>alert('Meja sudah ada!')</script>";
		redirect('meja.html','refresh');
	}

	public function tambah_meja()
	{
		$var = '1234567890';
		$data['id_meja'] = rand(0, $var);
		$data['no_meja'] = $this->input->get_post('no_meja');
		$data['kursi'] = $this->input->post('kursi');
		$data['status'] = '1';
		$this->M_meja->tambah($data);
		redirect('meja.html','refresh');
	}

	public function edit_meja()
	{
		$id = $this->input->get_post('id_meja');
		$data['no_meja'] = $this->input->get_post('no_meja');
		$data['kursi'] = $this->input->post('kursi');
		$data['status'] = '1';
		$this->M_meja->edit($id, $data);
		redirect('meja.html','refresh');
	}

	public function hapus($id_meja)
	{
		$this->M_meja->hapus($id_meja);
		redirect('meja.html','refresh');
	}

	public function get_meja($id_meja)
	{
		echo json_encode($this->M_meja->get_meja($id_meja));
	}

}

/* End of file Meja.php */
/* Location: ./application/controllers/Meja.php */