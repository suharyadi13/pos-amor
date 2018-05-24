<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {

	
	public function tampil_data()
	{
		
		
		$this->db->select('*');
		$this->db->select('m_admin.username as nipp');
		$this->db->from('as_pegawai');
		$this->db->join('m_admin', 'as_pegawai.nip = m_admin.username', 'left'); 
		$this->db->order_by('pegawai_id', 'DESC');
		return $this->db->get();
	}

	
}
