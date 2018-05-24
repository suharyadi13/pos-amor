<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('model_admin');
		$this->load->model('model_perusahaan');
		$this->load->model('model_user');
		$this->load->model('model_master');
	}


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function suplliers()
	{
		$id = $this->input->post('id');
		$sup = $this->model_master->tampil_suplier_one($id);

		print_r(json_encode($sup));


		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */