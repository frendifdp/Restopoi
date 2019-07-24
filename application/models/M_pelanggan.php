<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_data($i)
	{
		if($i == 0){
			return $this->db->get('masakan')->result();
		}
		else{
			return $this->db->where('jenis', $i)->get('masakan')->result();
		}
	}

	public function tambah_order($data)
	{
		$this->db->insert('order', $data);
	}

	public function tambah_detail_order($data)
	{
		$this->db->insert_batch('detail_order', $data);
	}

	public function tambah_transaksi($data)
	{
		$id = $data['id_order'];
		$q = $this->db->query("SELECT sum((detail_order.jumlah*masakan.harga_masakan)) as total from masakan
			inner join detail_order on masakan.id_masakan=detail_order.id_masakan 
			where detail_order.id_order = '$id'")->row();
		$data['total_bayar'] = $q->total;
		$this->db->insert('transaksi', $data);
	}

}

/* End of file M_pelanggan.php */
/* Location: ./application/models/M_pelanggan.php */