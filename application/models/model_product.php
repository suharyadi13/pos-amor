<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_product extends CI_Model {


	function get_product_transaction($con = NULL){
		$this->db->select('*');
		$this->db->from('as_produksi_transactions A');
        $this->db->join('as_produksi_detail_transactions B', 'A.ProduksiID = B.ProduksiID');
        $this->db->join('as_produksi C', 'C.ProduksiID = B.ProduksiID');
        $query = $this->db->get();
        if ($query->num_rows() > 0) { //jika ada maka jalankan
        	return $query->result();
        }

    }

    function get_ALL_product_formula()
    {

     $this->db->select('*');
     $this->db->from('as_produksi_formula');
	  $this->db->join('as_categories_produk', 'as_categories_produk.categoryID = as_produksi_formula.produkCat', 'left');
     $query = $this->db->get();
     return $query->result();
 }
	
	function get_ALL_product_formula_aktif()
    {

     $this->db->select('*');
     $this->db->from('as_produksi_formula');
	  $this->db->join('as_categories_produk', 'as_categories_produk.categoryID = as_produksi_formula.produkCat', 'left');
	  $this->db->where('productStatus', '1');
     $query = $this->db->get();
     return $query->result();
 }
	
	function get_ALL_product_formula_cek($produk)
    {
	 $this->db->select('*');
     $this->db->select('as_bahan.*');
	 $this->db->select('sat1.satuanName as satPro');
	 $this->db->select('sat1.satuanID as satID');
	 $this->db->select('sat2.satuanID as satID2');
     $this->db->from('as_produksi_formula_detail');
	 $this->db->join('as_bahan', 'as_bahan.bahanID = as_produksi_formula_detail.bahanID', 'left');
	  $this->db->join('as_satuan as sat1', 'sat1.satuanID = as_produksi_formula_detail.bahanUom', 'left');
	   $this->db->join('as_satuan as sat2', 'sat2.satuanID = as_bahan.bahanSat', 'left');
	  $this->db->where('produkID', $produk);
	  
     $query = $this->db->get();
     return $query->result();
 }

	
	function get_ALL_produksi_plan()
    {

     $this->db->select('*');
     $this->db->from('as_produksi_plan');
	  $this->db->join('as_produksi_formula', 'as_produksi_plan.produkID = as_produksi_formula.produkID', 'left');
     $query = $this->db->get();
     return $query->result();
 }
	
 function get_product_one($productBarcode)
    {

     $this->db->select('*');
     $this->db->from('as_products');
    $this->db->where('productBarcode', $productBarcode);
     $query = $this->db->get();
     return $query->row();
 }

	function tampil_data_kategori()
    {	
		$this->db->select('*');
    	$this->db->from('as_categories_produk');
    	return $this->db->get();
    }	
	

 function tampilkan_detailbahan_product($produksiID)
 {
   $this->db->select('*');
   $this->db->from('as_produksi_detail_transactions');
   $this->db->join('as_produksi_transactions', 'as_produksi_transactions.produksiID = as_produksi_detail_transactions.produksiID');
   $this->db->join('as_bahan', 'as_bahan.bahanBarcode = as_produksi_detail_transactions.bahanBarcode');
   
   if($produksiID)
       $this->db->where('as_produksi_detail_transactions.produksiID', $produksiID);
   $query = $this->db->get();
     return $query->result();
}

function tampilkan_detail_penerimaan($invoiceID)
{

 $this->db->select('*');
 $this->db->from('as_buy_detail_transactions');
 $this->db->join('as_products', 'as_products.productBarcode = as_buy_detail_transactions.productBarcode', 'left');
 $this->db->join('as_satuan', 'as_products.productSat = as_satuan.satuanID', 'left'); 
 $this->db->where('invoiceBuyID', $invoiceID);
 $query = $this->db->get();
 return $query->result();
}

}