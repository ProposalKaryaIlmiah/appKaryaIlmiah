<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		//$this->load->model('M_website', 'WEB', TRUE);
		$this->load->model('M_loginmhs', 'MHS', TRUE);
    }

		
	public function index()
	{
        if ($this->session->userdata('logged_in') == TRUE){       
            redirect('home/','refresh');
        } else {     
		//$this->load->vars($data);
		$this->load->view('mahasiswa/login');
		 }
	}
	
	public function ceklogin()
	{
		$npm		= validasi_sql($this->input->post('npm'));
		$password		= validasi_sql($this->input->post('password'));
		$do				= validasi_sql($this->input->post('masuk'));
		
		$where_login['mahasiswa_npm']	= $npm;
		$where_login['mahasiswa_password']	= do_hash($password, 'md5');
		
		
		if ($do && $this->MHS->cek_login($where_login) === TRUE){
			redirect("home/");
		} else {
			$this->session->set_flashdata('warning','Username atau Password tidak cocok!');
            redirect("home");
		}
		
	}
	
	public function keluar()
	{
		$this->MHS->remov_session();
        session_destroy();
		redirect("login");
	}
	
}