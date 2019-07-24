<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_meja extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function tambah($data)
	{
		$cek = $this->db->where('status != 0')->get('meja')->result();
		foreach ($cek as $row) {
			if($row->no_meja == $data['no_meja']){
				redirect('meja/error','refresh');
			}
			else{
				$ok = '1';
			}
		}
		if($i == '1'){
			$this->db->insert('meja', $data);
		}
	}

	public function edit($id, $data)
	{
		$cek = $this->db->where('status != 0')->get('meja')->result();
		foreach ($cek as $row) {
			if($row->no_meja == $data['no_meja']){
				redirect('meja/error','refresh');
			}
			else{
				$ok = '1';
			}
		}
		if($i == '1'){
			$this->db->where('id_meja', $id)->update('meja');
		}
	}

	public function hapus($id_meja)
	{
		$data['status'] = '0';
		return $this->db->where('id_meja', $id_meja)->update('meja', $data);
	}

	public function get_meja($id_meja)
	{
		return $this->db->where('id_meja', $id_meja)->get('meja')->result();
	}

}

/* End of file M_meja.php */
/* Location: ./application/models/M_meja.php */