<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pelanggan');
	}

	public function index()
	{
		$data['makanan'] = $this->M_pelanggan->get_data('1');
		$data['minuman'] = $this->M_pelanggan->get_data('2');
		$data['nama'] = $this->session->userdata('nama');
		$data['level'] = $this->session->userdata('level');
		$this->load->view('v_pelanggan', $data);
	}

	public function order()
	{
		if($this->session->userdata('login') == false){
			redirect('login.html','refresh');
		}

		$list = $this->M_pelanggan->get_data('0');
		$dtorder = array();
		$var = '1234567890';
		$data['id_order'] = rand(0, $var);
		$data['id_meja'] = $this->session->userdata('id_meja');
		$data['keterangan'] = '';
		$data['status_order'] = '0';
		$data['id_user'] = $this->session->userdata('id_user');
		$this->M_pelanggan->tambah_order($data);
		$id = $data['id_order'];

		foreach($list as $row){
			if($this->input->post($row->id_masakan) != ''){
				if($this->input->post('j_'.$row->id_masakan) > 0){
					$temp = array();
					$temp['id_detail_order'] = rand(0, $var);
					$temp['id_masakan'] = $row->id_masakan;
					$temp['status_detail_order'] = '0';
					$temp['jumlah'] = $this->input->post('j_'.$row->id_masakan);
					$temp['id_order'] = $id;
					$dtorder[] = $temp;
				}
			}
		}
		$this->M_pelanggan->tambah_detail_order($dtorder);

		$trans['id_transaksi'] = rand(0, $var);
		$trans['id_user'] = $data['id_user'];
		$trans['id_order'] = $id;
		$this->M_pelanggan->tambah_transaksi($trans);

		redirect('pelanggan.html', 'refresh');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */