<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'Administrator'){
			if($this->session->userdata('level') == 'Kasir'){
				redirect('kasir.html','refresh');
			}
			redirect('pelanggan.html','refresh');
		}
		$this->load->model('M_kasir');
	}

	public function index()
	{
		$data = array(
			'nama' => $this->session->userdata('nama'),
			'level' => $this->session->userdata('level'),
			'menu' => 'kasir',
			'order' => $this->M_kasir->get_data()
		);
		$this->load->view('v_kasir', $data);
	}

	public function konfirmasi_pembayaran()
	{
		$id = $this->input->post('no_meja');
		$order['status_order'] = '1';
		$id2 = $this->M_kasir->update_status_order($id, $order);
		$order2['status_detail_order'] = '1';
		$this->M_kasir->update_status_detail($id2, $order2);
		echo json_encode('success');
	}

}

/* End of file Waiter.php */
/* Location: ./application/controllers/Waiter.php */