<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_sup extends CI_Controller {

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
		$this->kolom = array(
			'KD_SUPPLIER',
			'NM_SUPPLIER',
			'ALMT_SUPPLIER',
			'TLP_SUPPLIER',
			'FAX_SUPPLIER',
			'ATAS_NAMA' 
	  	);

		$this->record = array(
			$this->input->post('edKode', TRUE)== null ? 'SUP'.getId('kd_supplier','tabel_supplier',4,6) : $this->input->post('edKode', TRUE) ,
			$this->input->post('edNama', TRUE),
			$this->input->post('edAlamat', TRUE),
			$this->input->post('edTelepon', TRUE),
			$this->input->post('edFax', TRUE),
			$this->input->post('edAtasnama', TRUE)
	  	);

		$this->load->model('M_Master');
	}


	public function index()
	{
		
		$this->data=array();
		$this->data['css']=_main_css();
		array_push($this->data['css'], 'css/dataTables.bootstrap.css','css/select.dataTables.min.css');
		$this->data['js']=_main_js();
		array_push($this->data['js'], 'js/jquery.slimscroll.js','js/jquery.dataTables.js','js/dataTables.bootstrap.js','js/dataTables.select.min.js','js/utama.js','js/m_sup.js');
		$this->data['identity']=_identity();
		
		$this->data['option']=_option('Master Supplier','Master','M_Sup','v_m_sup.php');
		
		$this->load->view('v_page',$this->data);
	}

	public function proses(){
		$kolom = $this->kolom;
		$record = $this->record;
        	$result = $this->input->post('edKode', TRUE)== null ? 
        	                       $this->M_Master->_insert('tabel_supplier',cari_nilai($kolom),cari_kolom($record)) :
        	                       $this->M_Master->_update( 'tabel_supplier',
        									    cari_set_update($kolom,$record),
        									    (
													cari_where(array_merge(array($kolom[0])),
													array_merge(array($record[0])))
												   )
        									  );

        	if($result){
        		$this->data['status']=true;
        		echo json_encode($this->data);
        	}		
          	
    }

    function delete()
		{
			$kolom = $this->kolom;
			$record = $this->record;
		  $result=$this->M_Master->_delete('tabel_supplier',cari_where(
			  array_merge(array($kolom[0])),
				  array_merge(array($record[0]))
				  )); 
			  if($result){
				  $this->data['status']=true;
				  echo json_encode($this->data);
			  }	
		}


	

	public function _get_data($where=null, $type_output='data'){
			$this->sql="
				SELECT  A.* FROM tabel_supplier A ".(($where!=null)?"WHERE ".$where:"");
			return((($type_output=='data')?$this->db->query($this->sql):$this->sql));
		}

	public function get_datatables(){
			$this->datatables->select("KD_SUPPLIER,NM_SUPPLIER,ALMT_SUPPLIER,TLP_SUPPLIER,FAX_SUPPLIER,ATAS_NAMA")
				->from("(".$this->_get_data(null, 'sql').")Z");
			echo $this->datatables->generate();
		} 

		public	function caridata()
		{
			$kolom = $this->kolom;
			$record = $this->record;
			$cek = $this->M_Master->_select('tabel_supplier', cari_where(
				array_merge(array($kolom[0])),
					array_merge(array($record[0]))
					))->num_rows();
			$rows = $this->M_Master->_select('tabel_supplier', cari_where(
				array_merge(array($kolom[0])),
					array_merge(array($record[0]))
					))->row_array();
			if($cek>=1){
				 $this->data['kode'] = $rows["kd_supplier"];
				 $this->data['nama'] = $rows["nm_supplier"];
				 $this->data['alamat'] = $rows["almt_supplier"];
				 $this->data['telepon'] = $rows["tlp_supplier"];
				 $this->data['fax'] = $rows["fax_supplier"];
			}else{
				$this->data['kode'] = '';
				$this->data['nama'] = '';
				$this->data['alamat'] = '';
				$this->data['telepon'] = '';
				$this->data['fax'] = '';
			}
			
			echo json_encode($this->data);
		}

}
