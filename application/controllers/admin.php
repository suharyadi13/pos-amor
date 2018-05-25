<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function act_login() {
		
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		
		$password2	= md5($password);
		
		$q_data		= $this->db->query("SELECT a.*, b.* FROM m_admin a left join as_pegawai b on a.username=b.nip WHERE a.username = '".$username."' AND a.password = '$password2' and b.status='1'");
		$j_data		= $q_data->num_rows();
		$a_data		= $q_data->row();
		
		$_log		= array();
		if ($j_data === 1) {
			$sess_nama_user = "";
			if ($a_data->level_user == "1") {
				$det_user = $this->db->query("SELECT nama_lengkap FROM as_pegawai WHERE nip = '".$a_data->username."'")->row();
				if (!empty($det_user)) {
					$sess_nama_user = "Administrator Pusat";
				}
			} else if ($a_data->level_user == "2") {
				$det_user = $this->db->query("SELECT nama_lengkap FROM as_pegawai WHERE nip = '".$a_data->username."'")->row();
				if (!empty($det_user)) {
					$sess_nama_user = "Administrator Cabang";
				}
			}
			else  {
				$det_user = $this->db->query("SELECT nama_lengkap FROM as_pegawai WHERE nip = '".$a_data->username."'")->row();
				if (!empty($det_user)) {
					$sess_nama_user = $det_user->nama_lengkap;
				}
			}
			$data = array(
			'admin_id' => $a_data->id,
			'admin_user' => $a_data->username,
			'admin_level' => $a_data->level_user,
			'identityID' => $a_data->identityID,
			'admin_nama' => $a_data->nama_lengkap,
			'gender' => $a_data->gender,
			'admin_valid' => true
			);
			$this->session->set_userdata($data);
			$invno = $this->getNewTrxID(); // ambil no transaksi terbaru
			redirect('4d111-t1272/?__fn='.$this->encryption->encode($invno).'&submit='.$this->encryption->encode("newtrx"));
			//redirect('4d111');
		} else {
			redirect('auth');
		}
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
	
	public function cek_aktif() {
		if ($this->session->userdata('admin_valid') == false && $this->session->userdata('admin_id') == "") {
			redirect('auth');
		} 
	}
	
	function index(){
		$this->cek_aktif();
		$level=$this->session->userdata('admin_level');
		$user=$this->session->userdata('admin_user');
		$identity=$this->session->userdata('identityID');
		$today=date('Y-m-d');
		$a['lev_user']	= $level;
		$this->cek_aktif();
		
		$invno = $this->getNewTrxID(); // ambil no transaksi terbaru
		
		$todaytgl=date('Y-m-d');
		$a['trxid'] = $invno;
		$a['total']= $this->model_admin->tampil_trx_sum_user($user)->result();
		$a['trxtoday_tot']	= $this->model_admin->tampil_trx_user_today($user,$today)->num_rows();
		$a['trxuser_tot']	= $this->model_admin->tampil_trx_user($user)->num_rows();
		$a['trxunclose_tot']	= $this->model_admin->tampil_trx_unclose_tot($user)->num_rows();
		$a['trx_tot_prod']	= $this->model_admin->tampil_trx_tot_prod($user)->result();
		$a['detailunclose']= $this->model_admin->tampil_trx_unclose_tot($user)->result();
		$data = $this->model_master->cek_trx_close($identity,$user,$todaytgl);
		$statustrx="";
		$trxidclose="";
		$trxTotalRealStat="";
		foreach($data->result() as $row)
		{
			$statustrx = $row->trxStatus;
			$trxidclose = $row->trxID;
			$trxTotalRealStat = $row->trxTotalRealStat;
		}
		$a['trxstat']	= $statustrx;
		$a['trxTotalRealStat']	= $trxTotalRealStat;
		$a['trxidclose']	= $trxidclose;
		$a['page']	= "home";
		
		$this->load->view('admin/template', $a);
	}
	function getNewTrxID(){
		$trxid= mysql_fetch_array(mysql_query('SELECT * from as_sales_transactions order by trxID desc limit 1;'));
		$trxdate = $trxid['trxDate'];
		$invoiceID = $trxid['invoiceID'];
		$d=date("my", strtotime($trxdate));
		$tglfktr=date('my');
		$invoiceIDfil=substr($invoiceID,6,8);
		if($invoiceIDfil=="")
		{
			$trxDate = date('my');
			$trx=1;
			$invoice=sprintf("%04d", $trx);
			$invno = $trxDate.$invoice;
		}
		else
		{
			$trxDate = date('my');
			$trxd=substr($invoiceIDfil,0,4);
			if($trxDate==$trxd)
			{
				$invno=$invoiceIDfil+1;
				$invno=sprintf("%08d", $invno);
			}
			else
			{
				$trxDate = date('my');
				$trx=1;
				$invoice=sprintf("%04d", $trx);
				$invno = $trxDate.$invoice;
			}
			
			
		}
		
		$invno = "POS".date('m')."-".$invno;
		
		return $invno;
	}
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('model_admin');
		$this->load->model('model_perusahaan');
		$this->load->model('model_user');
		$this->load->model('model_master');
	}


	
	function addtpj() {
		$this->cek_aktif();
		$trxid= mysql_fetch_array(mysql_query('SELECT * from as_sales_transactions order by trxID desc limit 1;'));
		$trxdate = $trxid['trxDate'];
		$invoiceID = $trxid['invoiceID'];
		$d=date("my", strtotime($trxdate));
		$tglfktr=date('my');
		$invoiceIDfil=substr($invoiceID,6,8);
		if($invoiceIDfil=="")
		{
			$trxDate = date('my');
			$trx=1;
			$invoice=sprintf("%04d", $trx);
			$invno = $trxDate.$invoice;
		}
		else
		{
			$trxDate = date('my');
			$trxd=substr($invoiceIDfil,0,4);
			if($trxDate==$trxd)
			{
				$invno=$invoiceIDfil+1;
				$invno=sprintf("%08d", $invno);
			}
			else
			{
				$trxDate = date('my');
				$trx=1;
				$invoice=sprintf("%04d", $trx);
				$invno = $trxDate.$invoice;
			}
			
			
		}
		
		$invno = "FKJ".date('m')."-".$invno;
		$a['trxid'] = $invno;
		$a['page'] = "master/penjualan/add";
		$a['title'] = "PENJUALAN";
		$this->load->view('admin/index',$a);
		
	}
	function addtpj_detail() {
		$this->cek_aktif();
		$invoiceID = $this->input->post('nofak');
		$tgltrx = $this->input->post('tgltrx');
		
		$pilihantrx = $this->input->post('pilihantrx');
		
		if($this->input->post('submit') == "member")
		{
			$idmember = $this->input->post('idmember');
			$trxid = $invoiceID;
			$idmember = $idmember;
			$a['member']= $this->model_master->tampil_member_id($idmember)->result();
			$tgltrx = $tgltrx;
			$a['page'] = "master/penjualan/add-member";
			$a['title'] = "PENJUALAN->MEMBER";
			redirect("admin/addtpj_memberdetail/?nofak=$trxid&idmember=$idmember&tgltrx=$tgltrx");
			// $this->load->view('admin/index',$a);
		}
		else if($this->input->post('submit') == "nonmember")
		{
			$a['trxid'] = $invoiceID;
			$a['tgltrx'] = $tgltrx;
			$a['page'] = "master/penjualan/add-2";
			$a['title'] = "PENJUALAN->Non MEMBER";
			$this->load->view('admin/index',$a);
		}
		else if($this->input->post('submit') == "proyek")
		{
			$idproyek = $this->input->post('idproyek');
			$trxid = $invoiceID;
			$idproyek = $idproyek;
			$a['proyek']= $this->model_master->tampil_proyek_id($idproyek)->result();
			$tgltrx = $tgltrx;
			$a['page'] = "master/penjualan/add-proyek";
			$a['title'] = "PENJUALAN->Proyek";
			redirect("admin/addtpj_memberdetailproyek/?nofak=$trxid&idproyek=$idproyek&tgltrx=$tgltrx");
			// $this->load->view('admin/index',$a);
		}
	}
	

	

	function addtpj_nonmemberdetail() 
	{
		$this->cek_aktif();
		$identity=$this->session->userdata('identityID');
		$user=$this->session->userdata('admin_user');
		$invoiceID = $this->encryption->decode($this->input->get('__fn'));
		$tgltrx = $this->encryption->decode($this->input->get('_t_l_x'));
		$a['trxid'] = $invoiceID;
		$a['tgltrx'] = $tgltrx;
		$a['pembeli'] = $this->input->post('namamember');
		$a['alamatkirim'] = $this->input->post('alamatkirim');
		$a['telpkirim'] = $this->input->post('telpkirim');
		$productBarcode1 = $this->input->post('kodeproduk');
		$hasil = implode(" ", array_slice(explode(" ", $productBarcode1), 0, 1));
		$productBarcode = trim($hasil," ");
		$qty = $this->input->post('qty');
		$data = $this->model_master->tampil_produk_id_trx($productBarcode);
        $a['bank'] = $this->model_master->tampil_bank();
		$a['prodamor']= $this->model_master->tampil_produk_amor($identity)->result();
		$a['cat']= $this->model_master->tampil_kategori_prod()->result();
		if($this->input->post('submit') ==false){
			$a['submit'] = $this->encryption->decode($this->input->get('submit'));
		}else{
			$a['submit'] = $this->input->post('submit');
		}
		
		if($a['submit'] == "newtrx")
		{
			$query = $this->db->query("SELECT * FROM as_sales_transactions WHERE invoiceID ='".$invoiceID."' ");
			if(count($query->row_array()) <= 0){
				$object = array(
				'invoiceID' => $invoiceID,
				'trxDate' =>$tgltrx,
				'userID' =>$user,
				'isfinish' =>0
				);
				$this->db->insert('as_sales_transactions', $object);
					
			}
			$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
			$a['total']= 0;
			$a['page'] = "master/penjualan/add-nonmember_detail";
			$a['title'] = "No Transaksi : $invoiceID ";
			$a['zona'] = $this->model_master->tampil_zona()->result_object();
			$this->load->view('admin/template',$a);
			
		}
		
		
		
		else if($a['submit'] == "tambah")
		{
			
			if($data){
			$price=0;
			$detailprice=0;
			$discPercent=0;
			$satuan =$this->input->post('satuan');
			$detailbonus =$this->input->post('bonus');
			$detailSubtotal="";
			$prostok ="";
			foreach($data->result() as $row)
			{

				$price = $row->productSalePrice;
				$prostok = $row->productStock;
				$productDiscounttype = $row->productDiscounttype;
				$discPercent = $row->productDiscount;
				$detailSubtotal =$price*$qty;
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
			}

			$object = array(
			'invoiceID' => $invoiceID,
			'productBarcode' => $productBarcode,
			'detailModal' => $price,
			'detailSubtotalModal' => $price,
			'detailPrice' => $price,
			'productSat' => $satuan,
			'detailQty' => $qty,
			'detailbonus' =>$detailbonus,
			'discPercent' => $discPercent,
			'discTotal' => $detailprice,
			'detailSubtotal' => $detailSubtotal,
			'createdDate' => $tgltrx,
			'isfinish' => 0
			);
			$this->db->insert('as_sales_detail_transactions', $object);
			
			$stokpro=($prostok)-($qty);
			$object = array(
			'productStock' => $stokpro
			);
			$this->db->where('productBarcode', $productBarcode);
			$this->db->where('identityID', $identity);
			$this->db->update('as_products', $object); 
			$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
			$a['page'] = "master/penjualan/add-nonmember_detail";
			//$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
			//$a['zona'] = $this->model_master->tampil_zona()->result_object();
			//$this->load->view('admin/template',$a);
			echo json_encode($a);
			
		}
		else if($a['submit'] == "edittrxitem")
		{

			$ideditpro = $this->input->post('ideditpro');
			$qtybef = $this->input->post('qtybef');
			$qtypro = $this->input->post('qtypro');
			$productBarcode = $this->input->post('kdproduk');
			$dataup = $this->model_master->tampil_produk_id_trx($productBarcode,$identity);
			foreach($dataup->result() as $row)
			{

				$price = $row->productSalePrice;
				$productDiscounttype = $row->productDiscounttype;
				$discPercent = $row->productDiscount;
				$detailSubtotal =$price*$qtypro;
				$prostok = $row->productStock;
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
			'detailQty'  => $qtypro,
			'detailSubtotal' => $detailSubtotal
			);
			$this->db->where('detailID', $ideditpro);
			$this->db->update('as_sales_detail_transactions', $data);
			
			$stokpro1=($prostok)+($qtybef);
			$stokpro2=($stokpro1)-($qtypro);
			$object = array(
			'productStock' => $stokpro2
			);
			$this->db->where('productBarcode', $productBarcode);
			$this->db->where('identityID', $identity);
			$this->db->update('as_products', $object); 
			$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
			$a['page'] = "master/penjualan/add-nonmember_detail";
			$a['title'] = "Transaksi";
			$a['zona'] = $this->model_master->tampil_zona()->result_object();
			//$this->load->view('admin/template',$a);
			echo json_encode($a);
		}
		else if($a['submit'] == 'selesaitrx')
		{
			$memberID= "01";
			$identityID=$this->session->userdata('identityID');
			$trxFullNamesave=$this->input->post('namamember');
			$trxAddress= $this->input->post('alamatkirim');
			$trxPhone =$this->input->post('telpkirim');
			$trxDate = date('Y-m-d');
			$trxDateprint = date('d-m-Y');
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
            $trxbankmember=$this->input->post('bankmember');
			$object = array(
			'identityID' => $identityID,
			'memberID' => $memberID,
			'trxFullName' => $trxFullNamesave,
			'trxAddress' => $trxAddress,
			'trxPhone' => $trxPhone,
			'trxDate' => $trxDate,
			'trxTotalModal' => $trxTotalModalnum,
			'trxSubtotal' => $trxSubtotalnum,
			'trxTotal' => $trxTotalnum,
			'trxPay' => $trxPaynum,
			'trxChange' => $trxChangenum,
			'trxStatus' => $trxStatus,
			'trxTerminDate' => $trxTerminDate,
			'trxbankmethod' => $trxbankmethod,
            'trxbankmember' => $trxbankmember,
			'isPosting_status' => 0,
			'trxpayno' => $trxpayno,
			'isfinish' =>1
			);
			$this->db->where('invoiceID', $invoiceID);
			$this->db->where('userID', $user);
			$this->db->update('as_sales_transactions', $object);
			if($trxStatus=="2")
			{
				$object = array(
				'invoiceID' => $invoiceID,
				'status' => "1",
				'createdDate' => $trxDate
				);
				$this->db->insert('as_receivables', $object); 
			}

			$a['perusahaan']= $this->model_perusahaan->tampil_data_identity($identity)->result();
			$a['nofak']= $invoiceID;
			$a['member']= $trxFullNamesave;
			$a['trxAddress']= $trxAddress;
			$a['trxPhone']= $trxPhone;
			$a['termin']= $trxTerminDate;
			$a['trxDateprint']= $trxDateprint;
			$a['bayar']= $trxPaynum;
			$a['kembali']= $trxChangenum;
			$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
			//$this->load->view('admin/master/penjualan/print-act',$a);
			echo json_encode($a);


		}
		else if($a['submit'] == 'deltrxitem')
		{
			$ideditpro = $this->input->post('ideditpro');
			$nofak = $this->input->post('nofak');
			$productBarcode = $this->input->post('kdproduk');
			$qtypro = $this->input->post('qtypro');
			$supid = $this->input->post('supid');
			$suppass = md5($this->input->post('suppass'));
			$q_data		= $this->db->query("SELECT a.*, b.* FROM m_admin a left join as_pegawai b on a.username=b.nip WHERE a.username = '".$supid."' AND a.password = '".$suppass."' and b.status='1' and b.identityID='".$identity."'");
			$a_data		= $q_data->row();
			if($a_data)
			{
				if($a_data->level_user=='1')
				{
					$this->model_master->hapus_trxpj($ideditpro);
					$object = array(
			'productStock' => $qtypro
			);
			$this->db->where('productBarcode', $productBarcode);
			$this->db->where('identityID', $identity);
			$this->db->update('as_products', $object); 
					redirect('admin/addtpj_nonmemberdetail/?__fn='.$this->encryption->encode($nofak).'');
				}
			}
			else{
			redirect('admin/addtpj_nonmemberdetail/?__fn='.$this->encryption->encode($nofak).'');
			}

		}
		else
		{
			
			$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
			$a['total']= 0;
			$a['page'] = "master/penjualan/add-nonmember_detail";
			$a['title'] = "No Transaksi : $invoiceID ";
			$a['zona'] = $this->model_master->tampil_zona()->result_object();
			$this->load->view('admin/template',$a);
			//echo json_encode($a);
		}
		

	}




	function addtpjtrx() {
		$this->cek_aktif();
		$invoiceID = $this->input->post('nofak');
		$productBarcode = $this->input->post('kodeproduk');
		$detailModal = $this->input->post('qty');
		$detailSubtotalModal = $this->input->post('harga');
		$detailPrice = $this->input->post('harga');
		$detailQty = $this->input->post('qty');
		$discPercent = $this->input->post('disc');
		$discTotal = $this->input->post('totaldiscprice');
		$detailSubtotal = $this->input->post('total');
		$createdDate = $this->input->post('phone');

		$object = array(
		'invoiceID' => $invoiceID,
		'productBarcode' => $productBarcode,
		'detailModal' => $detailModal,
		'detailSubtotalModal' => $detailSubtotalModal,
		'detailPrice' => $detailPrice,
		'detailQty' => $detailQty,
		'discPercent' => $discPercent,
		'discTotal' => $discTotal,
		'detailSubtotal' => $detailSubtotal,
		'createdDate' => $createdDate
		);
		$this->db->insert('as_sales_detail_transactions', $object); 

		if(isset($_POST['submit']))
		{
			$this->model_master->save_trx_detail($trx);
			redirect('master/penjualan/addtpj');
		}
		else
		{

			$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID)->result();
			$a['trxid'] = $trxDate.$trx;
			$a['page'] = "master/penjualan/add";
			$a['title'] = "PENJUALAN";
			$this->load->view('admin/index',$a);
		}
	}

	function addtpj_memberdetail_print() {
		$this->cek_aktif();
		$idname= $this->input->post('idname');
		$idaddress= $this->input->post('idaddress');
		$idphone=$this->input->post('idphone');
		$idmail=$this->input->post('idmail');
		$nofak= $this->input->post('nofak');
		$invoiceID= $this->input->post('nofak');
		$tgltrx =$this->input->post('tgltrx');
		$termin =$this->input->post('termin');
		$trxfullname= $this->input->post('trxfullname');
		$trxaddres= $this->input->post('trxaddres');
		$trxcartype= $this->input->post('trxcartype');
		$trxcarno= $this->input->post('trxcarno');
		$nopo= $this->input->post('nopo');
		$zona= $this->input->post('zona');
		$member = $this->input->post('member');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
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
		$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID)->result();
		if($this->input->post('submit') == "trxprint")
		{
			$this->load->view('admin/master/penjualan/print-act',$a);
			$html = $this->output->get_output();
			$this->load->library('dompdf_gen');
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream($invoiceID,array('Attachment'=>0));
			redirect('admin/addtpj');
		}

		else if($this->input->post('submit') == "trxdo")
		{
			$this->load->view('admin/master/penjualan/print-do',$a);
			$html = $this->output->get_output();
			$this->load->library('dompdf_gen');
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream($invoiceID,array('Attachment'=>0));
		}
	}
	
	function hapus_trxpjnonmember(){
		$this->cek_aktif();
		$trxid = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$id= $this->input->get('idtrxpj');
		$qtyremove= $this->input->get('qtyremove');
		$this->model_master->hapus_trxpj($id);
		$productBarcode= $this->input->get('productBarcode');
		$data = $this->model_master->tampil_produk_id($productBarcode);
		foreach($data->result() as $row)
		{
			
			$prostok = $row->productStock;
		}
		$qtyprev=$prostok+$qtyremove;
		$object = array(
		'productStock' => $qtyprev
		);
		$this->db->where('productBarcode', $productBarcode);
		$this->db->update('as_products', $object); 
		redirect('admin/addtpj_nonmemberdetail/?nofak='.$trxid.'&tgltrx='.$tgltrx.'');
	}
	
	function batal_trxpj(){
		$this->cek_aktif();
		$trxid = $this->input->get('nofak');
		$this->model_master->batal_trxpj($trxid);
		redirect('4d111');
	}
	
	
	
	
	
	function addtpj_list() 
	{
		$this->cek_aktif();
		$identity=$this->session->userdata('identityID');
		$invoiceID = $this->encryption->decode($this->input->get('__fn'));
		$tgltrx = $this->encryption->decode($this->input->get('_t_l_x'));
		$a['trxid'] = $invoiceID;
		$a['tgltrx'] = $tgltrx;
		$todaytgl=date('Y-m-d');
		$productBarcode = $this->encryption->decode($this->input->get('__k_po'));
		$data = $this->model_master->tampil_produk_id_trx($productBarcode,$identity);
		$a['prodamor']= $this->model_master->tampil_produk_amor($identity)->result();
		$a['cat']= $this->model_master->tampil_kategori_prod()->result();
		$qty=1;
		$price=0;
		$detailprice=0;
		$discPercent=0;
		$satuan =$this->input->post('satuan');
		$detailbonus =$this->input->post('bonus');
		foreach($data->result() as $row)
		{
			if($todaytgl>$row->discount_end)
			{
				$object2 = array(
				
				'discount_status' =>'0',
				'discount_start' =>'0000-00-00',
				'discount_end' =>'0000-00-00'
				);
				
				$this->db->where('productBarcode', $productBarcode);
				$this->db->update('as_products', $object2);
			}

			$price = $row->productSalePrice;
			$prostok = $row->productStock;
			$productDiscounttype = $row->productDiscounttype;
			$discPercent = $row->productDiscount;
			$detailSubtotal =$price*$qty;
			
			if($row->discount_status=='1')
			{
				if(($todaytgl>=$row->discount_start)&&($todaytgl<=$row->discount_end))
				{
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
			}
			
			
			
		}
		$object = array(
		'invoiceID' => $invoiceID,
		'productBarcode' => $productBarcode,
		'detailModal' => $price,
		'detailSubtotalModal' => $price,
		'detailPrice' => $price,
		'productSat' => $satuan,
		'detailQty' => $qty,
		'detailbonus' =>$detailbonus,
		'discPercent' => $discPercent,
		'discTotal' => $detailprice,
		'detailSubtotal' => $detailSubtotal,
		'createdDate' => $tgltrx
		);
		$this->db->insert('as_sales_detail_transactions', $object); 
		$stokpro=($prostok)-($qty);
		$object = array(
		'productStock' => $stokpro
		);
		$this->db->where('productBarcode', $productBarcode);
		$this->db->where('identityID', $identity);
		$this->db->update('as_products', $object); 
		$a['detail']= $this->model_master->tampilkan_detail_transaksi($invoiceID,$identity)->result();
		$a['page'] = "master/penjualan/add-nonmember_detail";
		$a['title'] = "PENJUALAN->non-MEMBER->Transaksi";
		$a['zona'] = $this->model_master->tampil_zona()->result_object();
		$this->load->view('admin/template',$a);

	}
	
	function cek_promo(){
		$this->cek_aktif();
		$identity=$this->session->userdata('identityID');
		$detailID = $this->input->get('detailID');
		$productBarcode = $this->input->get('productBarcode');
		$totalgratis = $this->input->get('totalgratis');
		$nofak = $this->input->get('nofak');
		$tgltrx = $this->input->get('tgltrx');
		$data = $this->model_master->tampil_produk_id_trx($productBarcode,$identity);
		foreach($data->result() as $row)
		{
			$prostok = $row->productStock;
		}
		$stokpro=($prostok)-($totalgratis);
		$object = array(
		'productStock' => $stokpro
		);
		$this->db->where('productBarcode', $productBarcode);
		$this->db->where('identityID', $identity);
		$this->db->update('as_products', $object); 
		
		$objectcheckpromo = array(
		'ispromocheck' => 1
		);
		$this->db->where('detailID', $detailID);
		$this->db->update('as_sales_detail_transactions', $objectcheckpromo); 
		redirect('admin/addtpj_nonmemberdetail/?nofak='.$nofak.'&tgltrx='.$tgltrx.'');

	}
	
	
	function close_trx(){
		$this->cek_aktif();
		$todaytgl=date('Y-m-d');
		$identity=$this->session->userdata('identityID');
		$user=$this->session->userdata('admin_user');
		$data = $this->model_master->tampil_produk_sum($identity,$user,$todaytgl);
		foreach($data->result() as $row)
		{
			$totaltrx = $row->totalsum;
			$totalpay = $row->paysum;
			$totalchange = $row->changesum;
		}
		$object = array(
		'identityID' => $identity,
		'userID' => $user,
		'trxDate' => $todaytgl,
		'trxTotal' => $totaltrx,
		'trxPay' => $totalpay,
		'trxChange' => $totalchange,
		'trxStatus' => 1
		);
		$this->db->insert('as_sales_transactions_close', $object); 
		redirect('4d111');
	}
	
	function addtpj_real(){
		$this->cek_aktif();
		$trxrealamout=$this->input->post('totalreal');
		$trxidclose=$this->input->post('trxidclose');
		$objectreal = array(
		'trxTotalReal' => $trxrealamout,
		'trxTotalRealStat' => 1
		);
		$this->db->where('trxID', $trxidclose);
		$this->db->update('as_sales_transactions_close', $objectreal); 
		redirect('4d111');
	}
	
	
	function detail_trx_user(){
		$this->cek_aktif();
		$user=$this->session->userdata('admin_user');
		$identity=$this->session->userdata('identityID');
		$today=date('Y-m-d');
		$a['total']= $this->model_admin->tampil_trx_sum_user($user)->result();
		$a['totalrx_user']= $this->model_master->tampil_trxpjtoday_user($user)->result();
		$a['page'] = "master/penjualan/show-trxpj-user";
		$this->load->view('admin/template',$a);
	}
	
	
	function detail_produk(){
		$this->cek_aktif();
		$identity=$this->session->userdata('identityID');
		$a['dataamor'] = $this->model_master->tampil_produk_amor($identity)->result_object();
		$a['data'] = $this->model_master->tampil_produk_mitra($identity)->result_object();
		$a['page'] = "master/penjualan/produk_list";
		$this->load->view('admin/template',$a);
	}
	
	function cetak_penerimaan (){
		$this->cek_aktif();
		$user=$this->session->userdata('admin_user');
		$today=date('Y-m-d');
		$todayprint=date('d-m-Y H:m:s');
		$a['todayprint'] = $todayprint; 
		$a['inc_close']	= $this->model_admin->tampil_trx_user_today_close($user,$today)->result();
		$this->load->view('admin/master/penjualan/print-act-close',$a);
	}
	
	public function ajax_list()
	
    {
		
		$query = $this->model_master->tampilkan_transaksi_Buy()->result(); 

		$produk       =  array();
		foreach ($query as $d) {
			$produk[]     = array(
			'trxname' => $d->trxFullName,
			'trxadd' => $d->trxAddress 
			);
		}
		echo json_encode($produk);      
		
    }
	
	public function create_productcode()
	
    {
	
	$trxid= mysql_fetch_array(mysql_query('SELECT * from as_sales_transactions order by trxID desc limit 1;'));
		$trxdate = $trxid['trxDate'];
		$invoiceID = $trxid['invoiceID'];
		$d=date("my", strtotime($trxdate));
		$tglfktr=date('my');
		$invoiceIDfil=substr($invoiceID,6,8);
		if($invoiceIDfil=="")
		{
			$trxDate = date('my');
			$trx=1;
			$invoice=sprintf("%04d", $trx);
			$invno = $trxDate.$invoice;
		}
		else
		{
			$trxDate = date('my');
			$trxd=substr($invoiceIDfil,0,4);
			if($trxDate==$trxd)
			{
				$invno=$invoiceIDfil+1;
				$invno=sprintf("%08d", $invno);
			}
			else
			{
				$trxDate = date('my');
				$trx=1;
				$invoice=sprintf("%04d", $trx);
				$invno = $trxDate.$invoice;
			}
			
			
		}
		
		$invno = "FKJ".date('m')."-".$invno;
		return $invno;	
	}

}

