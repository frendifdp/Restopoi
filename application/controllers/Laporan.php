<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'Administrator'){
			redirect('pelanggan.html','refresh');
		}
		$this->load->model('M_get_data');
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'level' => $this->session->userdata('level'),
			'menu' => 'laporan'
		);
		$this->load->view('v_laporan', $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */