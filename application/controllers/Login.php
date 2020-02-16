<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		in_access();
		$this->load->model('M_Login');
	}

	public function index()
	{
		$this->data=array();
		$this->data['css']=_main_css();
		$this->data['js']=_main_js();
		array_push($this->data['js'],'js/utama.js','js/login.js');
		$this->data['identity']=_identity();
		$this->data['input']=array(
				_input_login('person',
												form_input(
													_init_element_input(
														'edIdCode','edIdCode','form-control harusdiisi postdata','','Id User','',''
													)
												)
											,'user','focused'),
				_input_login('lock',
												form_password(
													_init_element_input(
														'edPass','edPass','form-control harusdiisi postdata','','Password','',''
													)
												)
											 ,'pass')

			);
		$this->data['button']=form_button(_button('btLogin','Sign In','btn btn-block bg-pink waves-effect'));
		$this->load->view('v_login',$this->data);
	}

	public function validasi(){
		$id=$this->input->post('edIdCode', TRUE);
		$ps=$this->input->post('edPass', TRUE);
		$ceknumber=$this->M_Login->ceknum($id,$ps)->num_rows();
		$rows=$this->M_Login->ceknum($id,$ps)->row_array();
		if($ceknumber>0){
			 $this->session->set_userdata('nama',$rows["nm_user"]);
			 $this->session->set_userdata('akses',$rows["akses"]);
			 $this->session->set_userdata('toko',$rows["kd_toko"]);
			 $res['ceknumber']=true;
			 $res['redirect']=base_url('Welcome');
			 
		}else{
   			$res['ceknumber']=false;
		}
		echo json_encode($res);
		 
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */