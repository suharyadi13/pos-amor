<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_perusahaan extends CI_Model {

	
	public function tampil_data()
	{
		return $this->db->query("SELECT * from as_identity");
	}
	
	public function tampil_data_cabang()
	{
		return $this->db->query("SELECT * from as_identity where identityType='2'");
	}
	
	public function tampil_data_identity($identity)
	{
		return $this->db->query("SELECT * from as_identity where identityID=$identity");
	}

	
}
