<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){

		parent::__construct();
		//$this->load->library('Datatables', NULL, 'tbl');
		//$this->load->model('M_Trans');
		no_access();
	}

	public function index()
	{
		$this->data=array();
		$this->data['css']=_main_css();
		$this->data['js']=_main_js();
		array_push($this->data['js'], 'js/jquery.slimscroll.js');
		$this->data['identity']=_identity();
		$this->data['option']=_option('Selamat Datang Backend Toko','Home','','v_home.php');
		$this->load->view('v_page',$this->data);
	}

	public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('akses');
		$this->session->unset_userdata('toko');
		redirect('login');
	}

}
