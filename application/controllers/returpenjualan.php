<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Returpenjualan extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('model_admin');
		$this->load->model('model_penerimaan');
		$this->load->model('model_perusahaan');
		$this->load->model('model_user');
		$this->load->model('model_master');

	}

	public function index(){
		$a['page'] = "master/retur/test";
		$a['title'] = "Pembelian test";
		$this->load->view('admin/index',$a);
	}

	public function daftar_po(){
		$a['list_buy'] = $this->model_master->tampilkan_transaksi_all_order();
		$a['page'] = "master/pembelian/view_list";
		$a['title'] = "Daftar Penerimaan Barang";
		$this->load->view('admin/index',$a);
	}

	public function pop_detail(){
		$invoiceID = $this->input->post('id');
		$a['invoiceID'] = $invoiceID;
		$a['detail'] = $this->model_penerimaan->tampilkan_detail_po($invoiceID);
		$po = $this->model_master->tampilkan_transaksi_Order($invoiceID);
		$a['dt_suppliers'] = $this->model_master->tampil_suplier_one($po->supplierID);
		$this->load->view('admin/master/pembelian/view_pop_detail',$a);
	}

	function addtrt() {
		$trxid= mysql_fetch_array(mysql_query('SELECT * from as_retur_transactions order by trxID desc limit 1;'));
		$trxdate = $trxid['trxDate'];
		$invoiceID = $trxid['invoiceReturID'];
		$d=date("my", strtotime($trxdate));
		$tglfktr=date('my');
		$invoiceIDfil=substr($invoiceID,3,8);
		if($invoiceIDfil=="")
		{
			$trxDate = date('ym');
			$trx=1;
			$invoice=sprintf("%04d", $trx);
			$invno = $trxDate.$invoice;
		}
		else
		{
			$trxDate = date('ym');
			$trxd=substr($invoiceIDfil,0,4);
			if($trxDate==$trxd)
			{
				$invno=$invoiceIDfil+1;
				$invno=sprintf("%08d", $invno);
			}
			else
			{
				$trxDate = date('ym');
				$trx=1;
				$invoice=sprintf("%04d", $trx);
				$invno = $trxDate.$invoice;
			}


		}
		
		$invno = "RPJ".$invno;
		$invoiceID = $invno;
		$tgltrx =date('Y-m-d');
		$a['trxid'] = $invoiceID;
		$a['tgltrx'] = $tgltrx;
		$a['supplier'] = $this->input->post('supplier');
		$a['alamat'] = $this->input->post('alamat');
		$a['telp'] = $this->input->post('telp');
		$productBarcode = $this->input->post('kdproduk');
		$qty = $this->input->post('qty');
		$ket = $this->input->post('ket');
		$data = $this->model_master->tampil_produk_id($productBarcode);
		$a['suplier']	= $this->model_master->tampil_suplier()->result_object();
		$a['datapo']	= $this->model_master->tampil_faktur()->result_object();
		if($this->input->post('submit') == "tambah")
		{
			$price=0;
			$detailprice=0;
			$discPercent=0;
			$satuan =$this->input->post('satuan');
			$detailbonus =$this->input->post('bonus');
			foreach($data->result() as $row)
			{

				$price = $row->productSalePrice;
				$prostok = $row->productStock;
				$productDiscounttype = $row->productDiscounttype;
				$discPercent = $row->productDiscount;
				$detailSubtotal =$price*$qty;
				if($productDiscounttype=="1")
				{
					$detailBuySubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
				}
				else
					if($productDiscounttype=="2")
					{
						$detailBuySubtotal=($detailSubtotal-$discPercent);
					}
					else
					{
						$detailBuySubtotal=$detailSubtotal;
					}
				}

				$object = array(
					'invoiceReturID' => $invoiceID,
					'productBarcode' => $productBarcode,
					'detailReturPrice' => $price,
					'detailReturQty' => $qty,
					'detailReturSubtotal' => $detailBuySubtotal,
					'createdDate' => $tgltrx,
					'detailReturKet' => $ket
					);
				$this->db->insert('as_retur_detail_transactions', $object); 
				$stokpro=($prostok)+($qty);
				$object = array(
					'productStock' => $stokpro
					);
				$this->db->where('productBarcode', $productBarcode);
				$this->db->update('as_products', $object); 
				$a['detail']= $this->model_master->tampilkan_detail_retur_pembelian($invoiceID)->result();
				 // echo $this->db->last_query();
				$a['page'] = "master/retur/addpj";
				$a['title'] = "Retur Penjualan";
				$this->load->view('admin/index',$a);
			}
			else if($this->input->post('submit') == "edittrx")
			{

				$ideditpro = $this->input->post('ideditpro');
				$qtypro = $this->input->post('qtypro');
				$bonus = $this->input->post('bonus');
				$productbarcode = $this->input->post('productbarcode');
				$dataup = $this->model_master->tampil_produk_id($productbarcode);
				foreach($dataup->result() as $row)
				{

					$price = $row->productSalePrice;
					$productDiscounttype = $row->productDiscounttype;
					$discPercent = $row->productDiscount;
					$detailSubtotal =$price*$qtypro;
					if($productDiscounttype=="1")
					{
						$detailSubtotal=$detailSubtotal-($detailSubtotal*$discPercent)/100;
					}
					else
						if($productDiscounttype=="2")
						{
							$detailSubtotal=($detailSubtotal-$discPercent);
						}
						else
						{
							$detailSubtotal=$detailSubtotal;
						}
					}
					$data = array (
						'detailBuyQty'  => $qtypro,
						'detailBuySubtotal' => $detailSubtotal

						);
					$this->db->where('detailID', $ideditpro);
					$this->db->update('as_retur_detail_transactions', $data);
					$a['detail']= $this->model_master->tampilkan_detail_retur_pembelian($invoiceID)->result();
				    $a['page'] = "master/retur/addpj";
					$a['title'] = "Retur Penjualan";
					$a['zona'] = $this->model_master->tampil_zona()->result_object();
					$this->load->view('admin/index',$a);
				}
			else if($this->input->post('submit') == 'selesaitrx')
			{
				
				$supplierID= $this->input->post('supplierID');
				$invoiceOrderID=$this->input->post('invoiceOrderID');
				$trxFullNamesave=$this->input->post('namamember2');
				$trxAddress= $this->input->post('alamatsuplier');
				$trxPhone =$this->input->post('telpsuplier');
				$trxDate = date('Y-m-d');
				$nopo =$this->input->post('nopo');
				$trxTotalModal = $this->input->post('harga');
				$trxTotalModalnum = intval(preg_replace('/[^\d.]/', '', $trxTotalModal));
				$trxSubtotal = $this->input->post('subtotal');
				$trxSubtotalnum = intval(preg_replace('/[^\d.]/', '', $trxSubtotal));
				$trxTotal = $this->input->post('total');
				$trxTotalnum = intval(preg_replace('/[^\d.]/', '', $trxTotal));
				$trxPay = $this->input->post('bayar');
				$trxPaynum = intval(preg_replace('/[^\d.]/', '', $trxPay));
				$trxChange = $this->input->post('kembali');
				$trxChangenum = intval(preg_replace('/[^\d.]/', '', $trxChange));
				$trxStatus = $this->input->post('tipebayar');
				$trxTerminDate = $this->input->post('terminpjdate');
				$trxbankmethod = $this->input->post('banktipe');
				$trxpayno = $this->input->post('bankno');
				$datetermin  = mktime(0,0,0,date("n"),date("j")+$trxTerminDate,date("Y"));
				$datetrmn   = date("Y-m-d", $datetermin);
				$object = array(
					'supplierID' => $supplierID,
					'invoiceReturID' => $invoiceID,
					'trxFullName' => $trxFullNamesave,
					'trxAddress' => $trxAddress,
					'trxPhone' => $trxPhone,
					'trxDate' => $trxDate,
					'trxTotal' => $trxTotalnum,
					'returtype' => '1'
					);
				$this->db->insert('as_retur_transactions', $object);   
				
				$data = $this->model_master->tampil_receiveble_id($invoiceOrderID);
				
				foreach($data->result() as $row)
			{

				$receivableID = $row->receivableID;
			}
				
					$object2 = array(
						'receivablePay' => $trxTotalnum,
						'receivableID' => $receivableID,
						'keterangan' => 'Retur Penjualan dengan no Faktur : '.$invoiceOrderID.'' ,
						'createdDate' => $trxDate
						
						);
					$this->db->insert('as_receivables_payment', $object2);
				

				$a['perusahaan']= $this->model_perusahaan->tampil_data()->result();
				$a['membersupplier']= $this->model_master->tampil_member_data($supplierID)->result();
				$a['nofak']= $invoiceID;
				$a['noPO']= $invoiceOrderID;
				$a['member']= $trxFullNamesave;
				$a['trxAddress']= $trxAddress;
				$a['termin']= $datetrmn;
				$a['tgltrx']= $tgltrx;
				$a['detail']= $this->model_master->tampilkan_detail_retur_pembelian($invoiceID)->result();
											// echo $this->db->last_query();
				$a['title'] = "Detail Transaksi";
				$a['total']= $trxTotal;
				$a['page'] = "master/retur/showtrxpen";
				$a['title'] = "Detail Transaksi Retur";
				$this->load->view('admin/index',$a);


			}
			else
			{

				$a['detail']= $this->model_master->tampilkan_detail_retur_pembelian($invoiceID)->result();
				$a['total']= 0;
				$a['trxid'] = $invno;
				$a['page'] = "master/retur/addpj";
				$a['title'] = "Retur Penjualan";
				$this->load->view('admin/index',$a);
			}


		}

		function hapus_tpm(){
		$trxid = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$id= $this->input->get('idtrxpj');
		$qtyremove= $this->input->get('qtyremove');
		$this->model_master->hapus_trxpm($id);
		$productBarcode= $this->input->get('productBarcode');
		$data = $this->model_master->tampil_produk_id($productBarcode);
		 
		redirect('pembelian/addtpm/?nofak='.$trxid.'&tgltrx='.$tgltrx.'');
	}

		/* print */

		function addtrt_nota_print() {
								$idname= $this->input->post('idname');
								$idaddress= $this->input->post('idaddress');
								$idphone=$this->input->post('idphone');
								$idmail=$this->input->post('idmail');
								$nofak= $this->input->post('nofak');
								$invoiceID= $this->input->post('nofak');
								$tgltrx =$this->input->post('tgltrx');
								$termin =$this->input->post('termin');
								$trxfullname= $this->input->post('supname');
								$trxaddres= $this->input->post('supaddress');
								$trxcartype= $this->input->post('trxcartype');
								$trxcarno= $this->input->post('trxcarno');
								$nopo= $this->input->post('nopo');
								$zona= $this->input->post('zona');
								$member = $this->input->post('memname');
								$alamat = $this->input->post('memaddres');
								$telp = $this->input->post('memtelp');
								$sales = $this->input->post('sales');
								$driver = $this->input->post('driver');
								$nabar = $this->input->post('nabar');
								$price = $this->input->post('price');
								$qty = $this->input->post('qty');
								$bonus = $this->input->post('bonus');
								$sat = $this->input->post('sat');
								$diskontype = $this->input->post('diskontype');
								$diskonpercent = $this->input->post('diskonpercent');
								$subtotal = $this->input->post('subtotal');
								$totharga = $this->input->post('totharga');
								$nama1 = $this->input->post('nama1');
								$nama2 = $this->input->post('nama2');
								$nama3 = $this->input->post('nama3');
								$nama4 = $this->input->post('nama4');
								$jab1 = $this->input->post('jab1');
								$jab2 = $this->input->post('jab2');
								$jab3 = $this->input->post('jab3');
								$jab4 = $this->input->post('jab4');

								$a['idname'] = $idname;
								$a['idaddress'] = $idaddress;
								$a['idphone'] = $idphone;
								$a['idmail'] = $idmail;
								$a['nofak'] = $nofak;
								$a['tgltrx'] = $tgltrx;
								$a['termin'] = $termin;
								$a['member'] = $member;
								$a['trxfullname'] = $trxfullname;
								$a['trxaddres'] = $trxaddres;
								$a['trxcartype'] = $trxcartype;
								$a['trxcarno'] = $trxcarno;
								$a['nopo'] = $nopo;
								$a['sales'] = $sales;
								$a['zona'] = $zona;
								$a['alamat'] = $alamat;
								$a['telp'] = $telp;
								$a['nabar'] = $nabar;
								$a['price'] = $price;
								$a['qty'] = $qty;
								$a['bonus'] = $bonus;
								$a['sat'] = $sat;
								$a['diskontype'] = $diskontype;
								$a['diskonpercent'] = $diskonpercent;
								$a['subtotal'] = $subtotal;
								$a['totharga'] = $totharga;
								$a['nama1'] = $nama1;
								$a['nama2'] = $nama2;
								$a['nama3'] = $nama3;
								$a['nama4'] = $nama4;
								$a['jab1'] = $jab1;
								$a['jab2'] = $jab2;
								$a['jab3'] = $jab3;
								$a['jab4'] = $jab4;
								$a['detail']= $this->model_master->tampilkan_detail_retur_pembelian($invoiceID)->result();
								if($this->input->post('submit') == "trxprint")
								{
									$this->load->view('admin/master/retur/print-act',$a);
									$html = $this->output->get_output();
									$this->load->library('dompdf_gen');
									$this->dompdf->load_html($html);
									$this->dompdf->render();
									$this->dompdf->stream($invoiceID,array('Attachment'=>0));
									redirect('admin/addtpj');
								}

							}
		
		function showtrxrtpen()
		{
		$a['data'] = $this->model_master->tampil_trxrtpenj()->result_object();
		$a['page'] = "master/retur/show-trxrt-pen";
		$a['title'] = "Daftar Retur Pembelian";
		$this->load->view('admin/index',$a);
		}

	}
