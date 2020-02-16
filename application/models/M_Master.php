<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Master extends CI_Model {

	function _insert($table,$field,$value){

		$sql="
				INSERT INTO ".$table."(".$field.") 
				  VALUES (".$value.");
			";
		$res['status']=(($this->db->query($sql))?TRUE:FALSE);	
		return $res;
	}

	function _update($table,$field,$value){

		$sql="
			    UPDATE ".$table." SET ".$field." where ".$value.";
			";
		$res['status']=(($this->db->query($sql))?TRUE:FALSE);	
		return $res;
	}

	function _delete($table,$value){

		$sql="
				DELETE FROM ".$table." where ".$value.";

			";
		$res['status']=(($this->db->query($sql))?TRUE:FALSE);	
		return $res;
	}
	
	function _select($table,$value){
		$sql=" select * FROM $table where $value  ";
		$rs=$this->db->query($sql);
    	return $rs;
		}
	
		function _update_file($nodok,$url){

			$sql="
				 UPDATE tabel_barang set file = '".$url."' where kd_barang = '".$nodok."';
	
				";
			$res['status']=(($this->db->query($sql))?TRUE:FALSE);	
			return $res;
		}

		function simpan_modal(){
			$a = substr($this->input->post('edKodeMbarang'),0,4);
		  $b = $this->input->post('satuanm');
		  $c = $this->input->post('edJualm');
		  $d = $this->input->post('edBelim');
			$sql="
				INSERT INTO tabel_barang_harga(kd_barang,kd_satuan,hrg_jual,hrg_beli)values('".$a."','".$b."','".$c."','".$d."');
				";
			$res['status']=(($this->db->query($sql))?TRUE:FALSE);	
			return $res;
		}

		function update_modal(){
			$a = substr($this->input->post('edKodeMbarang'),0,4);
		  $b = $this->input->post('satuanm');
		  $c = $this->input->post('edJualm');
		  $d = $this->input->post('edBelim');
			$sql="
			   UPDATE tabel_barang_harga set hrg_jual = '".$c."' , hrg_beli = '".$d."' where kd_barang = '".$a."' and  kd_satuan = '".$b."' ;
				";
			$res['status']=(($this->db->query($sql))?TRUE:FALSE);	
			return $res;
		}

		function delete_modal(){
			$a = $this->input->post('edKode');
		  $b = $this->input->post('edSatuan');
		 
			$sql="
			   DELETE from tabel_barang_harga  where kd_barang = '".$a."' and  kd_satuan = '".$b."' ;
				";
			$res['status']=(($this->db->query($sql))?TRUE:FALSE);	
			return $res;
		}


		function cari_data_modal($a,$b){
			$sql=" select * FROM tabel_barang_harga where kd_barang = '".$a."' and kd_satuan = '".$b."'  ";
			$rs=$this->db->query($sql);
				return $rs;
			}

}

/* End of file M_master.php */
/* Location: ./application/models/M_master.php */