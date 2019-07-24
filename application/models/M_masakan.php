<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_masakan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function tambah($data)
	{
		$this->db->insert('masakan', $data);
	}

	public function edit($id, $data)
	{
		$this->db->where('id_masakan', $id)->update('masakan', $data);
	}

	public function upload($name)
	{
		$config['file_name']            = $name;
		$config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        $config['overwrite']			= true;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('gambar')){
        	return $this->upload->data('file_name');
        }
	}

	public function hapus($id_masakan)
	{
		$this->db->where('id_masakan', $id_masakan)->delete('masakan');
	}

}

/* End of file M_masakan.php */
/* Location: ./application/models/M_masakan.php */