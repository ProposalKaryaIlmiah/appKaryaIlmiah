<?php
class M_loginmhs extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("mahasiswa");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0) {
			$data = $Q->row();
			$this->set_session($data);
			return true;
		}
		return false;
	}
	
	function set_session(&$data){
		$session = array(
					'mahasiswa_npm' 		=> $data->mahasiswa_npm,
					'mahasiswa_password' 	=> $data->mahasiswa_password,
					'mahasiswa_nama' 		=> $data->mahasiswa_nama,
					'mahasiswa_email' 		=> $data->mahasiswa_email,
					'mahasiswa_kelas' 		=> $data->mahasiswa_kelas,
					'logged_in'				=> TRUE
					);
		$this->session->set_userdata($session);
	}
	
	function update_log($where){
		$where['mahasiswa_npm'] = $data->mahasiswa_npm;
		$where['mahasiswa_nama'] = $data->mahasiswa_nama;
		//$data['admin_ip']	 = $_SERVER['REMOTE_ADDR'];
		//$data['admin_online']= time();
		$this->db->update('mahasiswa',$data,$where);
	}
	
	function remov_session() {
		$session = array(
					'mahasiswa_npm'  =>'',
					'mahasiswa_nama' =>'',
					'logged_in'	  => FALSE
					);
		$this->session->unset_userdata($session);
	}
		
	
}