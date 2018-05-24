<?php
class Mkota extends CI_Model {
    var $tabel = 'as_members';   //variabel tabelnya
 
    function __construct() {
        parent::__construct();
    }
 
    //fungsi untuk menampilkan semua data dari tabel database
    function get_allkota($kode) {
         $this->db->select('*')->from('as_products');
        $this->db->like('productBarcode',$kode,'after');
		$this->db->or_like('productName',$kode,'after');
		$query = $this->db->get();
        //cek apakah ada data
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
}
?>