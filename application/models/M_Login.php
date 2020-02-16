<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Login extends CI_Model {

	public function ceknum($id,$ps)
	{
		$sql="select * from tabel_user
  				where id_user = '".$id."'
				and password = '".$ps."' 
			  ";
    	$rs=$this->db->query($sql);
    	return $rs;
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */