<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		redirect('login.html','refresh');
	}	

	public function login()
	{
		$this->load->view('v_login');
	}

	public function login_veriv()
	{
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$cek = $this->M_login->login($data);
		echo json_encode($cek);
	}

	public function nomor_meja()
	{
		if($this->session->userdata('login') == true){
			$data['baris'] = $this->M_login->get_meja();
			$this->load->view('v_no_meja', $data);
		}
	}

	public function set_meja()
	{
		$array = array(
			'id_meja' => $this->input->post('no_meja')
		);
		$this->session->set_userdata($array);
		redirect('pelanggan.html','refresh');
	}

	public function registrasi()
	{
		if($this->session->userdata('level') != 'Administrator'){
			echo "<script>alert('Halaman ini hanya bisa diakses oleh admin!')</script>";
			newt_delay(3000);
			redirect('login.html','refresh');
		}
		else{
			$data['baris'] = $this->db->get('level')->result();
			$this->load->view('v_registrasi', $data);
		}
	}

	public function registrasi_veriv()
	{
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		$data['nama_user'] = $this->input->post('nama_user');
		$data['id_level'] = $this->input->post('level');
		echo json_encode($this->M_login->registrasi($data));
	}

	public function logout()
	{
		$this->M_login->logout();
		redirect('login.html','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */