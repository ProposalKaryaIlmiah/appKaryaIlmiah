<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_website', 'WEB', TRUE);
		$this->load->model('M_loginmhs', 'MHS', TRUE);
    }

	public function index ()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_mahasiswa['mahasiswa_nama']		= $this->session->userdata('mahasiswa_nama');
			$data['mahasiswa']					= $this->WEB->get_mahasiswa('',$where_mahasiswa);
			$data['content']				= 'mahasiswa/content/home';
			$this->load->vars($data);
			$this->load->view('mahasiswa/home');
		} else {
			redirect("login");
		}
		
	}


	public function pengajuan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_mahasiswa['mahasiswa_nama']		= $this->session->userdata('mahasiswa_nama');
			$data['mahasiswa']					= $this->WEB->get_mahasiswa('',$where_mahasiswa);
			$data['content']				= 'mahasiswa/content/pengajuan';
			$this->load->vars($data);
			$this->load->view('mahasiswa/home');
		} else {
			redirect("login");
		}
		
	}
}