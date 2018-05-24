<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Kota extends CI_Controller
{
 
    public function __construct() {
        parent::__construct();
        $this->load->model('mkota'); //load model mkota yang berada di folder model
        $this->load->helper(array('url')); //load helper url
 
    }
 
    public function index()
    {
        $data['titel']='Multiple Output Autocomplete Jquery UI + CodeIgniter'; //varibel title
        $this->load->view('admin/kota',$data); //tampilan awal ketika controller kota di akses
    }
 
    public function get_allkota() {
		
        $kode = strtolower($_GET['term']);   //variabel kunci yang di bawa dari input text id kode
        $query = $this->mkota->get_allkota($kode); //query model
 
        $kota       =  array();
        foreach ($query as $d) {
            $kota[]     = array(
                'label' => $d->productBarcode." | ". $d->productName, //variabel array yg dibawa ke label ketikan kunci
                'nama' => $d->productName , //variabel yg dibawa ke id nama
                'ibukota' => $d->productName, //variabel yang dibawa ke id ibukota
                'keterangan' => $d->productName //variabel yang dibawa ke id keterangan
            );
        }
        echo json_encode($kota);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }
}
 