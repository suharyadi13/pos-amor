<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auto extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->model('mauto'); 
		$this->load->helper(array('url'));

	}

	public function index()
	{
	}
	
	public function get_bahan_formula() {
		
		$kode = strtolower($_GET['term']); 
		$query = $this->mauto->get_bahan_formula($kode); 

		$produk       =  array();
		foreach ($query as $d) {
			$produk[]     = array(
			'label' => $d->productBarcode." - ". $d->productName, 
			'kdproduk' => $d->productBarcode,
			'stokproduk' => $d->productStock
			);
		}
		echo json_encode($produk);    
	}
	
	
	public function get_produk() {
		$kode = strtolower($_GET['term']); 
		$query = $this->mauto->get_produk($kode); 

		$produk       =  array();
		foreach ($query as $d) {
			$produk[]     = array(
			'label' => $d->productBarcode." - ". $d->productName." - ". $d->productShortcut, 
			'kdproduk' => $d->productBarcode,
			'stokproduk' => $d->productStock
			);
		}
		echo json_encode($produk);    
	}
	
	public function get_member() {
		
		$kode = strtolower($_GET['term']); 
		$query = $this->mauto->get_member($kode); 

		$produk       =  array();
		foreach ($query as $d) {
			$produk[]     = array(
			'label' => $d->memberCode." | ". $d->memberFullName,
			'idmember' => $d->memberCode,
			'nama' => $d->memberFullName , 
			'alamat' => $d->memberAddress, 
			'telp' => $d->memberPhone 
			);
		}
		echo json_encode($produk);      
	}
	
	
	
	public function get_proyek() {
		
		$kode = strtolower($_GET['term']); 
		$query = $this->mauto->get_proyek($kode); 

		$proyek       =  array();
		foreach ($query as $d) {
			$proyek[]     = array(
			'label' => $d->proyekCode." | ". $d->proyekFullName,
			'idproyek' => $d->proyekCode,
			'namaproyek' => $d->proyekFullName , 
			'alamatproyek' => $d->proyekAddress, 
			'telpproyek' => $d->proyekPhone 
			);
		}
		echo json_encode($proyek);      
	}
	
	
	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->productID;
			$row[] = $person->productBarcode;
			$row[] = $person->productName;
			$row[] = $person->productImei;

			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->person->count_all(),
		"recordsFiltered" => $this->person->count_filtered(),
		"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}


	public function get_bahan() {
		
		$kode = strtolower($_GET['term']); 
		$query = $this->mauto->get_bahan($kode); 

		$produk       =  array();
		foreach ($query as $d) {
			$bahan[]     = array(
			'label' => $d->bahanBarcode." - ". $d->bahanName, 
			'idbahan' => $d->bahanID,
			'bahanBarcode' => $d->bahanBarcode,
			'bahanBuyPrice' => $d->bahanBuyPrice,
			'stokbahan' => $d->bahanStock
			);
		}
		echo json_encode($bahan);    
	}

}
