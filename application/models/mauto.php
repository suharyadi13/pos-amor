<?php
class Mauto extends CI_Model {
    var $tabel = 'as_members';   //variabel tabelnya
	  var $table = 'as_products';
    var $column_order = array('productBarcode','productName','productImei',null); //set column field database for datatable orderable
    var $column_search = array('productBarcode','productName','productImei'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('productID' => 'desc'); // default order 
    function __construct() {
        parent::__construct();
    }
	
	 function get_produk($kode) {
         $this->db->select('*')->from('as_products');
        $this->db->like('as_products.productBarcode',$kode,'after');
		$this->db->or_like('productName',$kode,'after');
		$this->db->or_like('productShortcut',$kode,'after');
		$query = $this->db->get();
        //cek apakah ada data
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
 
    function get_produk_promo($kode,$identity) {
         $this->db->select('*')->from('as_products');
		 $this->db->where('identityID', $identity);
        $this->db->like('productBarcode',$kode,'after');
		
		$query = $this->db->get();
        if ($query->num_rows() > 0) { 
            return $query->result();
        }
    }

    function get_bahan($kode) {
         $this->db->select('*')->from('as_bahan');
        $this->db->like('bahanBarcode',$kode,'after');
        $this->db->or_like('bahanName',$kode,'after');
        $query = $this->db->get();
        if ($query->num_rows() > 0) { 
            return $query->result();
        }
    }
	
	 function get_member($kode) {
         $this->db->select('*')->from('as_members');
        $this->db->like('memberCode',$kode,'after');
		$this->db->or_like('memberFullName',$kode,'after');
		$query = $this->db->get();
        //cek apakah ada data
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
	
	function get_proyek($kode) {
         $this->db->select('*')->from('as_proyek');
        $this->db->like('proyekCode',$kode,'after');
		$this->db->or_like('proyekFullName',$kode,'after');
		$query = $this->db->get();
        //cek apakah ada data
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
	
	
	private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
	
	 function get_datatables($kode) {
         $this->db->select('*')->from('as_members');
        $this->db->like('memberCode',$kode,'after');
		$this->db->or_like('memberFullName',$kode,'after');
		$query = $this->db->get();
        //cek apakah ada data
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
	
}
?>