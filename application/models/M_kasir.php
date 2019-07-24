<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kasir extends CI_Model {


	public function __construct()
	{
		parent::__construct();
	}

	public function get_data()
	{
		return $this->db->query("SELECT `order`.`id_meja`, `meja`.`no_meja` FROM `order`
			INNER JOIN `meja` ON `order`.`id_meja`=`meja`.`id_meja` WHERE `order`.`status_order` = '0'")->result();
	}

	public function update_status_order($id, $data)
	{
		$row = $this->db->where('id_meja', $id)->
								where('status_order', '0')->
								get('order')->row();
		$this->db->where('status_order', '0')->where('id_meja', $id)->update('order', $data);
		return $row->id_order;
	}

	public function update_status_detail($id, $data)
	{
		$this->db->where('status_detail_order', '0')->where('id_order', $id)->update('detail_order', $data);
	}
}

/* End of file  */
/* Location: ./application/models/ */