<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_get_data extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function pengguna()
	{
		$baris = $this->db->order_by('id_user', 'desc')->get('user')->result();
		$out = array();
		$i = 1;
		foreach($baris as $row) {
			$level = $this->db->where('id_level', $row->id_level)->get('level')->result();
			if($level[0]->nama_level == "Pelanggan"){
				continue;
			}
			$temp = array();
			$temp[] = $i;
			$temp[] = $row->nama_user;
			$temp[] = $row->username;
			$temp[] = $level[0]->nama_level;
			$temp[] = '<button onclick="delete_user('.$row->id_user.')" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
			$out[] = $temp;
			$i++;
		}
		return array('data' => $out);
	}

	public function pelanggan()
	{
		$baris = $this->db->order_by('id_user', 'desc')->get('user')->result();
		$out = array();
		$i = 1;
		foreach($baris as $row) {
			$level = $this->db->where('id_level', $row->id_level)->get('level')->result();
			if($level[0]->nama_level == "Pelanggan"){
				$temp = array();
				$temp[] = $i;
				$temp[] = $row->nama_user;
				$temp[] = $row->username;
				$temp[] = '<button onclick="delete_user('.$row->id_user.')" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
				$out[] = $temp;
				$i++;
			}
		}
		return array('data' => $out);
	}

	public function meja()
	{
		$baris = $this->db->order_by('id_meja', 'desc')->get('meja')->result();
		$out = array();
		$i = 1;
		foreach($baris as $row) {
			if($row->status == '1'){
				$status = 'Tersedia';
			}
			elseif($row->status == '2'){
				$status = 'Dipesan';
			}
			elseif($row->status == '3'){
				$status = 'Dipakai';
			}
			elseif($row->status == '4'){
				$status = 'Kosong';
			}
			else{
				continue;
			}
			$temp = array();
			$temp[] = $i;
			$temp[] = $row->no_meja;
			$temp[] = $row->kursi;
			$temp[] = $status;
			$temp[] = '<button onclick="edit_meja('.$row->id_meja.')" type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_meja"><span class="glyphicon glyphicon-pencil"></span></button>
				<button onclick="delete_meja('.$row->id_meja.')" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
			$out[] = $temp;
			$i++;
		}
		return array('data' => $out);
	}

	public function masakan($id)
	{
		if($id != 'data'){
			$baris = $this->db->where('id_masakan', $id)->get('masakan')->result();
			return $baris;
		}
		else{
			$baris = $this->db->order_by('id_masakan', 'desc')->get('masakan')->result();
			$out = array();
			$i = 1;
			foreach($baris as $row) {
				$temp = array();
				$temp[] = $i;
				$temp[] = $row->nama_masakan;
				$temp[] = $row->harga_masakan;
				$temp[] = $row->jenis == 1  ? 'Makanan' : 'Minuman';
				$temp[] = $row->status_masakan == 1  ? 'Stok Tersedia' : 'Stok Habis';
				$temp[] = '<button onclick="edit_masakan('.$row->id_masakan.')" type="button" class="btn btn-info" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
				<button onclick="delete_masakan('.$row->id_masakan.')" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
				$out[] = $temp;
				$i++;
			}
			return array('data' => $out);
		}
	}

	public function laporan($param)
	{
		$q = $this->db->query("SELECT DISTINCT masakan.nama_masakan, masakan.harga_masakan, sum(detail_order.jumlah) as jumlah, (masakan.harga_masakan*sum(detail_order.jumlah)) as total from masakan inner join detail_order on masakan.id_masakan=detail_order.id_masakan
			inner join `order` on `order`.`id_order`=detail_order.id_order
			where $param GROUP by detail_order.id_masakan");
		if($q->num_rows() > 0){
			$t = $q->result();
			foreach ($t as $temp) {
				$laporan['masakan'][] = $temp->nama_masakan;
				$laporan['jumlah'][] = $temp->jumlah;
				$laporan['harga'][] = $temp->harga_masakan;
				$laporan['total'][] = $temp->total;
			}
			
			$out = array();
			for($i=0;$i<count($laporan['masakan']);$i++){
				$row = array();
				$row['masakan'] = $laporan['masakan'][$i];
				$row['jumlah'] = $laporan['jumlah'][$i];
				$row['harga'] = $laporan['harga'][$i];
				$row['total'] = $laporan['total'][$i];
				$out[] = $row;
			}
			return $out;
		}
		else{
			return 0;
		}	
	}

	public function get_order($param)
	{
		$q = $this->db->query("SELECT masakan.nama_masakan, masakan.harga_masakan, detail_order.jumlah, (masakan.harga_masakan*detail_order.jumlah) as total from masakan inner join detail_order on masakan.id_masakan=detail_order.id_masakan
			inner join `order` on `order`.`id_order`=detail_order.id_order
			where `order`.`id_meja` = '$param' and `order`.`status_order` = '0'");
		$res = array();
		if($q->num_rows() > 0){
			foreach ($q->result() as $row) {
				$out = array();
				$out['masakan'] = $row->nama_masakan;
				$out['jumlah'] = $row->jumlah;
				$out['harga'] = $row->harga_masakan;
				$out['total'] = $row->total;
				$res[] = $out;
			}
			return $res;
		}
		else{
			return 0;
		}
	}
}


// SELECT DISTINCT masakan.nama_masakan, masakan.harga_masakan, sum(detail_order.jumlah) as jumlah, (masakan.harga_masakan*sum(detail_order.jumlah)) as total, `order`.`tanggal` from masakan inner join detail_order on masakan.id_masakan=detail_order.id_masakan
// inner join `order` on `order`.`id_order`=detail_order.id_order
// GROUP by detail_order.id_masakan, `order`.`tanggal`

/* End of file  */
/* Location: ./application/models/ */