<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_brg extends CI_Controller {

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
			'KD_BARANG',
			'NM_BARANG',
			'KD_KATEGORI',
			'DESKRIPSI_BRG',
			'CARA_PAKAI',
			'FILE',
			'KD_SUPPLIER',
			'KD_MERK'
	  );

	  $this->record = array(
			$this->input->post('edKode', TRUE)== null ? 'B'.getId('KD_BARANG','tabel_barang',2,4) : $this->input->post('edKode', TRUE) ,
			$this->input->post('edNama', TRUE),
			$this->input->post('kategori', TRUE),
			$this->input->post('edDeskripsi', TRUE),
			$this->input->post('edCarapakai', TRUE),
			$this->input->post('edFile', TRUE),
			$this->input->post('supplier', TRUE),
			$this->input->post('merk', TRUE)
	  );
		$this->load->model('M_Master');
	}


	public function index()
	{
		$this->data=array();
		$this->data['css']=_main_css();
		array_push($this->data['css'],'css/bootstrap-select.css','css/dataTables.bootstrap.css','css/select.dataTables.min.css');
		$this->data['js']=_main_js();
		array_push($this->data['js'], 'js/jquery.slimscroll.js','js/bootstrap-select.js','js/jquery.dataTables.js','js/dataTables.bootstrap.js','js/dataTables.select.min.js','js/utama.js','js/m_brg.js');
		$this->data['identity']=_identity();
		$this->data['satuan']=satuan();
		$this->data['kategori']=kategori();
		$this->data['merk']=merk();
		$this->data['supplier']=supplier();
		//$this->data['satuan'] = array(''=>' - Satuan - ');
		/*foreach (satuan()->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $this->data['satuan'][$row->KD_SATUAN] = $row->NM_SATUAN;
            };
        $this->data['kategori'] = array(''=>' - Kategori - ');
		foreach (kategori()->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $this->data['kategori'][$row->KD_KATEGORI] = $row->NM_KATEGORI;
            };
		$this->data['attributes_satuan'] = 'class="form-control show-tick harusdiisi" data-live-search="true" id="satuan"';
		$this->data['attributes_kategori'] = 'class="form-control show-tick harusdiisi" data-live-search="true" id="kategori"';	
			$this->data['input']= array(
	            _input_form('kode',form_input(
	            	                   array_merge(
	            	                   		_init_element_input('edKode','edKode','form-control postdata','','','','')
	            	                   	    ,array('readonly'=>'readonly')
	            	                   	)
									),'Kode Barang'),
									_input_form('satuan',form_dropdown('satuan',$this->data['satuan'],'',$this->data['attributes_satuan']),''),
	            _input_form('nama',form_input(_init_element_input('edNama','edNama','form-control postdata harusdiisi','','','','autofocus')),'Nama Barang'),
	            _input_form('jual',form_input(_init_element_input('edJual','edJual','form-control postdata harusdiisi hanyaangka','','','')),'Harga Jual'),
	            _input_form('beli',form_input(_init_element_input('edBeli','edBeli','form-control postdata harusdiisi hanyaangka','','','')),'Harga Beli'),
	           
	            _input_form('kategori',form_dropdown('kategori',$this->data['kategori'],'',$this->data['attributes_kategori']),'')
			);

		$this->data['button2'] = array(
	            form_button(_button('bt_save','<i class="material-icons">save</i> Save','btn btn-danger m-t-15 waves-effect','Save')),
	            form_button(_button('bt_cancel','<i class="material-icons">clear</i> Cancel ','btn btn-info m-t-15 waves-effect','Cancel'))
			);
		*/
		$this->data['option']=_option('Master Barang','Master','M_Brg','v_m_brg.php');
		
		
		$this->load->view('v_page',$this->data);
	}

	public function proses(){
		$kolom = $this->kolom;
		$record = $this->record;
		 $result = $this->input->post('edKode', TRUE)== null ? 
								$this->M_Master->_insert('tabel_barang',cari_nilai($kolom),cari_kolom($record)) :
								$this->M_Master->_update( 'tabel_barang',
											 cari_set_update($kolom,$record),
											 (
												 cari_where(array_merge(array($kolom[0])),
												 array_merge(array($record[0])))
												)
										   );

										   
										   

		 if($result){
			$countfiles = count($_FILES['uploadFile']['name']);
			$this->load->library('upload');
			$x='0';
			$itu=(int)$x;
			  for($i=0;$i<$countfiles;$i++){
	  
				if(!empty($_FILES['uploadFile']['name'][$i])){
					
				//$itu=$itu+0;	
				// Define new $_FILES array - $_FILES['file']
				$_FILES['file']['name'] 	= $_FILES['uploadFile']['name'][$i];
				$_FILES['file']['type'] 	= $_FILES['uploadFile']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['uploadFile']['tmp_name'][$i];
				$_FILES['file']['error'] 	= $_FILES['uploadFile']['error'][$i];
				$_FILES['file']['size'] 	= $_FILES['uploadFile']['size'][$i];
				$_FILES['file']['ext'] 		= pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		
				// Set preference
				$config = array();
				$config['upload_path'] 		= './assets/media/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
				$config['max_size'] 		= '10000'; // max_size in kb
				$config['file_name'] 		= $record[0].'.'.$_FILES['file']['ext'] ;
	
				if(file_exists($config['upload_path'].$config['file_name'])) unlink($config['upload_path'].$config['file_name']);
					$this->upload->initialize($config);

					if (! $this->upload->do_upload('file'))
					{
						$this->data['tes'] = $this->upload->display_errors();
					}
					else
					{
						$this->data['tes'] = "SUCCESS";
						
						$nodok =	$record[0] ;
						$sub   =	$i;
						$url   =	$config['file_name'] ;
						
						$res=$this->M_Master->_update_file($nodok,$url);
						if($res){
						 $this->data['status']=$url;
						 echo json_encode($this->data);
						}
					}
	
				}
	  
			  };
			 
		 }		
		   
 }

	function delete()
		{
			$kolom = $this->kolom;
		  	$record = $this->record;
			$result=$this->M_Master->_delete('tabel_barang',cari_where(
				array_merge(array($kolom[0])),
					array_merge(array($record[0]))
					)); 
				if($result){
					$result2=$this->M_Master->_delete('tabel_barang_harga',cari_where(
						array_merge(array($kolom[0])),
							array_merge(array($record[0]))
							)); 
					if($result2){		
	        			$this->data['status']=true;
						echo json_encode($this->data);
					}
	        	}	
		}

	public function _get_data($where=null, $type_output='data'){
			$this->sql="
				SELECT  A.*,
							 (SELECT NM_KATEGORI FROM tabel_kategori_barang x where x.kd_kategori=A.kd_kategori) NM_KATEGORI,
							 (SELECT NM_SUPPLIER FROM tabel_supplier x where x.kd_supplier=A.kd_supplier) NM_SUPPLIER,
							 (SELECT NM_MERK FROM tabel_merk x where x.kd_merk=A.kd_merk) NM_MERK, 
					 '' COBA , '' COBA2
				FROM tabel_barang A ".(($where!=null)?"WHERE ".$where:"");
			return((($type_output=='data')?$this->db->query($this->sql):$this->sql));
		}
	
	public function get_datatables(){
			$this->datatables->select("KD_BARANG,NM_BARANG,KD_KATEGORI,KD_SUPPLIER,KD_MERK,NM_KATEGORI,NM_SUPPLIER,NM_MERK,DESKRIPSI_BRG,CARA_PAKAI,COBA,COBA2")
				->from("(".$this->_get_data(null, 'sql').")Z");
			echo $this->datatables->generate();
		} 

	public function get_datatables_setting(){
			$this->datatables->select("KD_BARANG,NM_BARANG,KD_SATUAN,NM_SATUAN,HRG_JUAL,HRG_BELI,COBA")
				->from("(".$this->_get_data_setting(null, 'sql').")Z");
			echo $this->datatables->generate();
		} 

		public function _get_data_setting($where=null, $type_output='data'){
			$this->sql="
				SELECT  A.*, (SELECT NM_SATUAN FROM tabel_satuan_barang x where x.kd_satuan=A.kd_satuan) NM_SATUAN,
				CONCAT(CONCAT(A.KD_BARANG,' - '),(SELECT NM_BARANG FROM tabel_barang x where x.kd_barang=A.kd_barang)) NM_BARANG,
					 '' COBA 
				FROM tabel_barang_harga A ".(($where!=null)?"WHERE ".$where:"");
			return((($type_output=='data')?$this->db->query($this->sql):$this->sql));
		}



		public	function caridata()
		{
			$kolom = $this->kolom;
			$record = $this->record;
			$cek = $this->M_Master->_select('tabel_barang', cari_where(
				array_merge(array($kolom[0])),
					array_merge(array($record[0]))
					))->num_rows();
			$rows = $this->M_Master->_select('tabel_barang', cari_where(
				array_merge(array($kolom[0])),
					array_merge(array($record[0]))
					))->row_array();
			if($cek>=1){
				 $this->data['kode'] = $rows["kd_barang"];
				 $this->data['nama'] = $rows["nm_barang"];
				 $this->data['kategori'] = $rows["kd_kategori"];
				 $this->data['merk'] = $rows["kd_merk"];
				 $this->data['supplier'] = $rows["kd_supplier"];
				 $this->data['deskripsi'] = $rows["deskripsi_brg"];
				 $this->data['cara_pakai'] = $rows["cara_pakai"];
				 $this->data['file'] = $rows["file"];
			}else{
				$this->data['kode'] = '';
				 $this->data['nama'] = '';
				 $this->data['kategori'] = '';
				 $this->data['deskripsi'] = '';
				 $this->data['cara_pakai'] = '';
				 $this->data['merk']='';
				 $this->data['supplier']='';
				 $this->data['file'] = '';
			}
			
			echo json_encode($this->data);
		}

		public function proses_modal() {
		
			//$nofaktur = $this->T_penjualan->cari_no_faktur()->row_array();
			//$this->data['faktur']=  $nofaktur["NOMER"];
			$cek_n = $this->M_Master->cari_data_modal(substr($this->input->post('edKodeMbarang'),0,4),$this->input->post('satuanm'))->num_rows();
			if($cek_n<=0){
				$result=$this->M_Master->simpan_modal();
				if ($result) {
					$this->data['status'] = true;
					echo json_encode($this->data);
				}
			}else{
				$result=$this->M_Master->update_modal();
				if ($result) {
					$this->data['status'] = true;
					echo json_encode($this->data);
				}
			}
		
		}

		public function delete_setting() {
		
			//$nofaktur = $this->T_penjualan->cari_no_faktur()->row_array();
			$result=$this->M_Master->delete_modal();
				if ($result) {
					$this->data['status'] = true;
					echo json_encode($this->data);
				}
		
		}

}
