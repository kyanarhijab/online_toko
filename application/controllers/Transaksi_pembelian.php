<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_pembelian extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		no_access();
		//$this->load->model('M_Master');
	}


	public function index()
	{
		$this->data=array();
		$this->data['css']=_main_css();
		array_push($this->data['css'], 'css/dataTables.bootstrap.css','css/select.dataTables.min.css');
		$this->data['js']=_main_js();
		array_push($this->data['js'], 'js/jquery.dataTables.js','js/dataTables.bootstrap.js','js/dataTables.select.min.js','js/utama.js');
		$this->data['identity']=_identity();	
		/*$this->data['input']= array(
	            _input_form('kode',form_input(
	            	                   array_merge(
	            	                   		_init_element_input('edKode','edKode','form-control postdata','','','','')
	            	                   	    ,array('readonly'=>'readonly')
	            	                   	)
	            	                ),'Kode Toko'),
	            _input_form('nama',form_input(_init_element_input('edNama','edNama','form-control postdata harusdiisi','','','','autofocus')),'Nama Toko'),
	            _input_form('alamat',form_input(_init_element_input('edAlamat','edAlamat','form-control postdata harusdiisi','','','')),'Alamat Toko'),
	            _input_form('telp',form_input(_init_element_input('edTelp','edTelp','form-control postdata harusdiisi hanyaangka','','','')),'Telp Toko'),
	            _input_form('fax',form_input(_init_element_input('edFax','edFax','form-control postdata harusdiisi hanyaangka','','','')),'Fax Toko')
			);
		$this->data['button2'] = array(
	            form_button(_button('bt_save','<i class="material-icons">save</i> Save','btn btn-danger m-t-15 waves-effect','Save')),
	            form_button(_button('bt_cancel','<i class="material-icons">clear</i> Cancel ','btn btn-info m-t-15 waves-effect','Cancel'))
	        );
		$this->data['option']=_option('Master Toko','Master','M_Toko','v_m_toko.php');
		$this->data['button'] = array(
	            form_button(_button('bt_add','<i class="material-icons">add</i>','btn btn-danger m-t-15 waves-effect','Add')),
	            form_button(_button('bt_edit','<i class="material-icons">mode_edit</i>','btn btn-info m-t-15 waves-effect','Edit')),
	            form_button(_button('bt_del','<i class="material-icons">delete_forever</i>','btn btn-success m-t-15 waves-effect','Delete'))
	        );
		*/
	    $this->data['option']=_option('Transaksi Pembelian','Transaksi','Transaksi_pembelian','v_t_pembelian.php');    
		$this->load->view('v_page',$this->data);
	}


	public function proses(){
		    $kolom = array(
        				'KD_TOKO',
        				'NM_TOKO',
        				'ALMT_TOKO',
        				'TLP_TOKO',
        				'FAX_TOKO' 
        		  );

        	$record = array(
        		        $this->input->post('edKode', TRUE)== null ? 'MM'.getId('kd_toko','TABEL_TOKO',3,5) : $this->input->post('edKode', TRUE) ,
        				$this->input->post('edNama', TRUE),
        				$this->input->post('edAlamat', TRUE),
        				$this->input->post('edTelp', TRUE),
        				$this->input->post('edFax', TRUE)
        		  );

        	$result = $this->input->post('edKode', TRUE)== null ? 
        	                       $this->M_Master->_insert('TABEL_TOKO',cari_nilai($kolom),cari_kolom($record)) :
        	                       $this->M_Master->_update( 'TABEL_TOKO',
        									    cari_set_update($kolom,$record),
        									    (
        									     cari_where($kolom[0],$record[0])
        									    )
        									  );

        	if($result){
        		$this->data['status']=true;
        		echo json_encode($this->data);
        	}		
          	
    }


	function delete()
		{
			
			$result=$this->M_Master->_delete('TABEL_TOKO',cari_where('KD_TOKO',$this->input->post('kode', TRUE))); 
				if($result){
	        		$this->data['status']=true;
	        		echo json_encode($this->data);
	        	}	
		}

	public function _get_data($where=null, $type_output='data'){
			$this->sql="
				SELECT  A.* FROM TABEL_TOKO A ".(($where!=null)?"WHERE ".$where:"");
			return((($type_output=='data')?$this->db->query($this->sql):$this->sql));
		}

	public function get_datatables(){
			$this->datatables->select("KD_TOKO,NM_TOKO,ALMT_TOKO,TLP_TOKO,FAX_TOKO")
				->from("(".$this->_get_data(null, 'sql').")Z");
			echo $this->datatables->generate();
		} 

	

}
