<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_master extends CI_Model {

	
	
	public function hapus_trxpj($ideditpro)
	{
		return $this->db->delete('as_sales_detail_transactions', array('detailID' => $ideditpro));
	}


	
	public function batal_trxpj($trxid)
	{
		 $this->db->delete('as_sales_transactions', array('invoiceID' => $trxid));
	     $this->db->delete('as_sales_detail_transactions', array('invoiceID' => $trxid));
		
	}
	
	public function tampil_kategori()
	{
		$this->db->order_by('categoryID', 'DESC');
		return $this->db->get('as_categories');
	}
	
	public function tampil_kategori_prod()
	{
		$this->db->order_by('categoryID', 'ASC');
		return $this->db->get('as_categories_produk');
	}
	
	public function tampil_kategori_bahan()
	{
		$this->db->order_by('categoryID', 'DESC');
		return $this->db->get('as_categories_bahan');
	}
	
	public function tampil_satuan()
	{
		$this->db->order_by('satuanID', 'DESC');
		return $this->db->get('as_satuan');
	}
	
	public function tampil_brand()
	{
		$this->db->order_by('brandID', 'DESC');
		return $this->db->get('as_brands');
	}
	
	public function tampil_zona()
	{
		$this->db->order_by('zonaID', 'DESC');
		return $this->db->get('as_zona');
	}
	
	public function tampil_suplier()
	{
		$this->db->order_by('supplierID', 'DESC');
		return $this->db->get('as_suppliers');
	}

	public function tampil_suplier_one($id)
	{
		$this->db->where('supplierID', $id);
		$query = $this->db->get('as_suppliers');
		return $query->row();
	}
	
	public function tampil_produk($identity)
	{
		
		$this->db->select('*');
		$this->db->from('as_products');
		$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
		$this->db->order_by('productID', 'DESC');
		$this->db->where('identityID', $identity);
		return $this->db->get();
		
	}
	
	
	public function tampil_produk_cat()
	{
		
		$this->db->select('*');
		$this->db->select('as_categories_produk.categoryID as idcat');
		$this->db->from('as_products');
		$this->db->join('as_categories_produk', 'as_products.categoryID = as_categories_produk.categoryID', 'left'); 
		return $this->db->get();
		
	}
	
	public function tampil_produk_sum($identity,$user,$todaytgl)
	{
		
		$this->db->select('*');
		$this->db->select('sum(as_sales_transactions.trxTotal) as totalsum');
		$this->db->select('sum(as_sales_transactions.trxPay) as paysum');
		$this->db->select('sum(as_sales_transactions.trxChange) as changesum');
		$this->db->from('as_sales_transactions');
		$this->db->where('identityID', $identity);
		$this->db->where('userID', $user);
		$this->db->where('trxDate', $todaytgl);
		return $this->db->get();
		
	}
	
	public function cek_trx_close($identity,$user,$todaytgl)
	{
		
		$this->db->select('*');
		$this->db->from('as_sales_transactions_close');
		$this->db->where('identityID', $identity);
		$this->db->where('userID', $user);
		$this->db->where('trxDate', $todaytgl);
		return $this->db->get();
		
	}
	
	
	public function tampil_produk_mitra($identity)
	{
		
		$this->db->select('*');
		$this->db->from('as_products');
		$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
		$this->db->order_by('productID', 'DESC');
		$this->db->where('identityID', $identity);
		$this->db->where('productType', '2');
		return $this->db->get();
		
	}
	
	
	public function tampil_produk_amor($identity)
	{
		
		$this->db->select('*');
		$this->db->from('as_products');
		$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
		$this->db->order_by('productID', 'DESC');
		$this->db->where('identityID', $identity);
		return $this->db->get();
		
	}
	
	
	public function tampil_bahan($identity)
	{
		
		$this->db->select('*');
		$this->db->from('as_bahan');
		$this->db->join('as_satuan', 'as_bahan.bahanSat = as_satuan.satuanID', 'left'); 
		$this->db->join('as_categories_bahan', 'as_bahan.categoryID = as_categories_bahan.categoryID', 'left'); 
		$this->db->order_by('bahanID', 'DESC');
		$this->db->where('identityID', $identity);
		return $this->db->get();
		
	}
	
	public function tampil_member()
	{
		return $this->db->get('as_members');
	}
	
	public function tampil_proyek()
	{
		return $this->db->get('as_proyek');
	}

    public function tampil_bank(){

        $this->db->select('*');
        $this->db->from('as_bank');
        $query = $this->db->get();
        return $query->result();
    }
	
	public function tampil_trxpj($identityID)
	{
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->where('identityID', $identityID);
		return $this->db->get();
	}
	
	public function tampil_trxpjtoday_user($user)
	{
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->where('userID', $user);
		$this->db->order_by('trxID', 'DESC');
		return $this->db->get();
	}
	
	
	
	function get_produk(){
		$this->db->select('*');
		$this->db->from('as_products');
		$query = $this->db->get();

		//cek apakah ada data
		if ($query->num_rows() > 0) { //jika ada maka jalankan
			return $query->result();
		}
	}

	

	public function tampil_trx()
	{	
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		return $this->db->get();

	}



	
	function tampilkan_detail_transaksi ($invoiceID,$identity)
	{

		$this->db->select('*');
		$this->db->from('as_sales_detail_transactions');
		$this->db->join('as_products', 'as_products.productBarcode = as_sales_detail_transactions.productBarcode', 'left');
		$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
		$this->db->where('invoiceID', $invoiceID);
		$this->db->order_by('detailID', 'DESC');
		return $this->db->get();
	}
	
	function tampilkan_transaksi ($invoiceID)
	{

		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->where('invoiceID', $invoiceID);
		return $this->db->get();
	}


	
	function tampilkan_transaksi_getqty($trxid,$productBarcode)
	{

		$this->db->select('*');
		$this->db->from('as_sales_detail_transactions');
		$array = array('invoiceID' => $trxid, 'productBarcode' => $productBarcode);
		$this->db->where($array);
		return $this->db->get();
	}


	function tampil_produk_id($productBarcode)
	{
		$query="SELECT * from as_products
		WHERE productBarcode='$productBarcode'";
		return $this->db->query($query);
	}
	
	function tampil_produk_id_trx($productBarcode)
	{
		$query="SELECT * from as_products
		WHERE productBarcode='$productBarcode'";
		return $this->db->query($query);
	}

	

	function save_trx_detail()
	{

		$createdDate = date('Y-m-d H:i:s');
		$memberID = $this->input->post('idmember');
		$invoice = $this->input->post('nofak');
		$trxFullName = $this->input->post('namamember');
		$trxAddress = $this->input->post('alamatkirim');
		$trxPhone = $this->input->post('telpkirim');
		$trxDate = date('Y-m-d');
		$trxSubtotal = $this->input->post('subtotal');
		$trxModal = $this->input->post('trxModal');
		$trxDP = $this->input->post('dp');
		$ppn = $this->input->post('ppn');
		$trxTerminDate = $this->input->post('trxTerminDate');
		$trxDiscount = $this->input->post('discTotal');
		$trxStatus = $this->input->post('status');
		$nama_barang    =  $this->input->post('barang');
		$qty            =  $this->input->post('qty');
		$data           = array('barang_id'=>$idbarang['barang_id'],
		'qty'=>$qty,
		'harga'=>$idbarang['harga'],
		'status'=>'0');
		$this->db->insert('transaksi_detail',$data);
	}
	
	
	
	public function tampil_faktur()
	{
		$this->db->select('*');
		$this->db->from('as_sales_transactions');
		$this->db->join('as_receivables', 'as_sales_transactions.invoiceID = as_receivables.invoiceID', 'left'); 
		return $this->db->get();
		
	}
	
	public function tampil_faktur_one($id)
	{
		$this->db->select('*');
		$this->db->join('as_members', 'as_sales_transactions.memberID = as_members.memberID', 'left'); 
		$this->db->where('trxID', $id);
		$query = $this->db-> get('as_sales_transactions');
		return $query->row();
	}
	
	
	//Stock Opname
	function tampilkan_detail_so($invoiceID)
	{

		$this->db->select('*');
		$this->db->from('as_stock_opname_detail');
		$this->db->join('as_products', 'as_products.productBarcode = as_stock_opname_detail.productBarcode', 'left');
		$this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
		$this->db->where('noSO', $invoiceID);
		return $this->db->get();
	}

}
