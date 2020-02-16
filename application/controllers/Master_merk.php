<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_merk extends CI_Controller {

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
			'KD_MERK',
			'NM_MERK'
	  	);
		$this->record = array(
			$this->input->post('edKode', TRUE)== null ? 'X'.getId('KD_MERK','tabel_merk',2,4) : $this->input->post('edKode', TRUE) ,
			$this->input->post('edNama', TRUE)
	 	 );
		$this->load->model('M_Master');
	}


	public function index()
	{
		$this->data=array();
		$this->data['css']=_main_css();
		array_push($this->data['css'], 'css/dataTables.bootstrap.css','css/select.dataTables.min.css');
		$this->data['js']=_main_js();
		array_push($this->data['js'], 'js/jquery.slimscroll.js','js/jquery.dataTables.js'
									,'js/dataTables.bootstrap.js'
									,'js/dataTables.select.min.js'
									,'js/utama.js'
									,'js/m_merk.js'
									);
		$this->data['identity']=_identity();	
		$this->data['option']=_option('Master Merk','Master','M_Merk','v_m_merk.php');
		$this->load->view('v_page',$this->data);
	}

	function proses(){
			$kolom = $this->kolom;
			$record = $this->record;
        	$result = $this->input->post('edKode', TRUE)== null ? 
        	                       $this->M_Master->_insert('tabel_merk',cari_nilai($kolom),cari_kolom($record)) :
        	                       $this->M_Master->_update( 'tabel_merk',
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
			$result=$this->M_Master->_delete('tabel_merk',cari_where(
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
				SELECT  A.*,  NULL COBA FROM tabel_merk A ".(($where!=null)?"WHERE ".$where:"");
			return((($type_output=='data')?$this->db->query($this->sql):$this->sql));
		}

	public function get_datatables(){
			$this->datatables->select("KD_MERK,NM_MERK,COBA")
				->from("(".$this->_get_data(null, 'sql').")Z");
			echo $this->datatables->generate();
		} 
	
		public	function caridata()
		{
			$kolom = $this->kolom;
			$record = $this->record;
			$cek = $this->M_Master->_select('tabel_merk', cari_where(
				array_merge(array($kolom[0])),
					array_merge(array($record[0]))
					))->num_rows();
			$rows = $this->M_Master->_select('tabel_merk', cari_where(
				array_merge(array($kolom[0])),
					array_merge(array($record[0]))
					))->row_array();
			if($cek>=1){
				 $this->data['kode'] = $rows["kd_merk"];
				 $this->data['nama'] = $rows["nm_merk"];
			}else{
				$this->data['kode'] = '';
				$this->data['nama'] = '';
			}
			
			echo json_encode($this->data);
		}
	

}
