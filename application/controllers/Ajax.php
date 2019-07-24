<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata() == FALSE){
			redirect('pelanggan.html','refresh');
		}
		$this->load->model('M_get_data');
	}

	public function table_pengguna()
	{
		echo json_encode($this->M_get_data->pengguna());	
	}

	public function table_pelanggan()
	{
		echo json_encode($this->M_get_data->pelanggan());
	}

	public function table_masakan($id_masakan)
	{
		echo json_encode($this->M_get_data->masakan($id_masakan));
	}

	public function table_meja()
	{
		echo json_encode($this->M_get_data->meja());
	}

	public function laporan($q)
	{
		$dd = getdate();
		if($q == 1){
			$var1 = $dd['year'].'-'.$dd['mon'].'-'.$this->input->post('tanggal');
	// public function laporan()
	// {
	// 	$q = 1;
	// 	$dd = getdate();
	// 	if($q == 1){
	// 		$var1 = $dd['year'].'-'.$dd['mon'].'-'.'06';
			$param =  "`order`.`tanggal` = '$var1'";
		}
		elseif($q == 2){
			$t = explode(" ", $this->input->post('rentang'));
			$s = implode(' to ', $t);
			$var1 = substr($s, 0, 10);
			$var2 = substr($s, -11);
			$param =  "`order`.`tanggal` >= '$var1' AND `order`.`tanggal` <= '$var2'";
		}
		elseif($q == 3) {
			$var1 = $dd['year'].'-'.$this->input->post('bulan');
			$param =  "`order`.`tanggal` >= '$var1-01' AND `order`.`tanggal` <= '$var1-31'";
		}
		elseif($q == 4) {
			$var1 = $this->input->post('tahun');
			$param =  "`order`.`tanggal` >= '$var1-01-01' AND `order`.`tanggal` <= '$var1-12-31'";
		}
		else{
			$param = 0;
		}
		echo json_encode($this->M_get_data->laporan($param));
	}

	public function order()
	{
		$id = $this->input->post('no_meja');
		echo json_encode($this->M_get_data->get_order($id));
	}

	public function tes($q)
	{
		if($q == 1){
			$data['nama'] = $this->input->post('tgl');
		}
		elseif($q==2) {
			$t = explode(" ", $this->input->post('rentang'));
			$s = implode(' to ', $t);
			$data['nama'] = substr($s, -11);
		}
		elseif($q==3) {
			$data['nama'] = $this->input->post('bulan');
		}
		echo json_encode($data);
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */