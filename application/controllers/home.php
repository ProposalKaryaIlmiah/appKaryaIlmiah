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
			$where_mahasiswa['mahasiswa_npm']	= $this->session->userdata('mahasiswa_npm');
			$data['mahasiswa']					= $this->WEB->get_mahasiswa('',$where_mahasiswa);
			$data['content']					= '/mahasiswa/content/home';
			$this->load->vars($data);
			$this->load->view('mahasiswa/home');
		} else {
			redirect("login");
		}
		
	}
	public function dosen($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_mahasiswa['mahasiswa_npm']	= $this->session->userdata('mahasiswa_npm');
			$data['mahasiswa']					= $this->WEB->get_mahasiswa('',$where_mahasiswa);
			$data['content']					= '/mahasiswa/content/dosen';
			$this->load->vars($data);
			$this->load->view('mahasiswa/home');
		
		} else {
			redirect("login");
		}
		
	}

	public function pengajuan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_mahasiswa['mahasiswa_npm']	= $this->session->userdata('mahasiswa_npm');
			$data['mahasiswa']					= $this->WEB->get_mahasiswa('',$where_mahasiswa);
			$data['content']					= '/mahasiswa/content/pengajuan';
			$data['action']					= (empty($filter1))?'view':$filter1;
				$data['katpengajuan_id']		= ($this->input->post('katpengajuan_id'))?$this->input->post('katpengajuan_id'):'';	
				$data['dosen_nip']				= ($this->input->post('dosen_nip'))?$this->input->post('dosen_nip'):'';			
			if($data['action'] == 'tambah' ) {
				$data['pengajuan_judul']		= ($this->input->post('pengajuan_judul'))?$this->input->post('pengajuan_judul'):'';
				$data['mahasiswa_npm']				= $this->session->userdata('mahasiswa_npm');		
				$data['pengajuan_deskripsi']	= ($this->input->post('pengajuan_deskripsi'))?$this->input->post('pengajuan_deskripsi'):'';		
				$data['katpengajuan_id']		= ($this->input->post('katpengajuan_id'))?$this->input->post('katpengajuan_id'):'';	
				$data['dosen_nip']				= ($this->input->post('dosen_nip'))?$this->input->post('dosen_nip'):'';			
				$data['pengajuan_alasan']		= ($this->input->post('pengajuan_alasan'))?$this->input->post('pengajuan_alasan'):'';		
				$data['pengajuan_file']	= ($this->input->post('pengajuan_file'))?$this->input->post('kpengajuan_file'):'';
				$data['pengajuan_post']				= date("Y-m-d H:i:s");

				$simpan								= $this->input->post('simpan');
				$where['pengajuan_judul']			= $data['pengajuan_judul'];
				$jml_pengajuan						= $this->WEB->count_all_pengajuan2($where);
				if ($simpan && $jml_pengajuan < 1) {
					$file = upload_file("pengajuan_file", "./assets/files/pengajuan/");
					$data['pengajuan_file']			 = $file;
					$insert['pengajuan_judul']	 	 = validasi_sql($data['pengajuan_judul']);
					$insert['mahasiswa_npm']	 	 = validasi_sql($data['mahasiswa_npm']);
					$insert['pengajuan_deskripsi']	 = validasi_sql($data['pengajuan_deskripsi']);
					$insert['katpengajuan_id']	 	 = validasi_sql($data['katpengajuan_id']);
					$insert['dosen_nip']	 	 	= validasi_sql($data['dosen_nip']);
					$insert['pengajuan_alasan']	 	 = validasi_sql($data['pengajuan_alasan']);
					$insert['pengajuan_file']	 	 = validasi_sql($data['pengajuan_file']);
					if ($data['pengajuan_file']) {$insert['pengajuan_file']	= $data['pengajuan_file'];}
					$insert['pengajuan_post	']	 	 = validasi_sql($data['pengajuan_post']);
					$this->WEB->insert_pengajuan($insert);
					$this->session->set_flashdata('success',' Pengajuan telah berhasil dikirim!,');
					redirect("home/pengajuan");
					} elseif ($simpan && $jml_pengajuan > 0 ){
					$this->session->set_flashdata('warning',' Judul anda sudah terdaftar di Pengajuan, Harap GANTI JUDUL!,');
					redirect("home/pengajuan");
				} else {
					$this->session->set_flashdata('error',' Pengajuan tidak berhasil!,');
					redirect("home/pengajuan");	
				}
			} elseif ($data['action']	== 'edit') {
				$where['pengajuan_id'] 		=  validasi_sql($filter2);
				$data['onload']				= 'pengajuan_judul';
				$where_pengajuan['pengajuan_id']	= validasi_sql($filter2);
				$pengajuan 					= $this->WEB->get_pengajuan('*', $where_pengajuan);
				$data['pengajuan_id']		= ($this->input->post('pengajuan_id'))?$this->input->post('pengajuan_id'):$pengajuan->pengajuan_id;	
				$data['pengajuan_judul']	= ($this->input->post('pengajuan_judul'))?$this->input->post('pengajuan_judul'):$pengajuan->pengajuan_judul;
				$data['pengajuan_deskripsi']= ($this->input->post('pengajuan_deskripsi'))?$this->input->post('pengajuan_deskripsi'):$pengajuan->pengajuan_deskripsi;		
				$data['katpengajuan_nama']	= ($this->input->post('katpengajuan_nama'))?$this->input->post('katpengajuan_nama'):$pengajuan->katpengajuan_nama;			
				$data['dosen_nama']			= ($this->input->post('dosen_nama'))?$this->input->post('dosen_nama'):$pengajuan->dosen_nama;		
				$data['pengajuan_file']		= ($this->input->post('pengajuan_file'))?$this->input->post('pengajuan_file'):$pengajuan->pengajuan_file;
				$data['pengajuan_revisi']	= 'SUDAH DIREVISI';
				$data['pengajuan_post']		= date("Y-m-d H:i:s");
				$simpan								= $this->input->post('simpan');
				if ($simpan) {
					$file = upload_file("pengajuan_file", "./assets/files/pengajuan/");
					$data['pengajuan_file']			 = $file;
					$where_edit['pengajuan_id']		= validasi_sql($data['pengajuan_id']);
					$edit['pengajuan_judul']		= validasi_sql($data['pengajuan_judul']);
					$edit['pengajuan_deskripsi']	= validasi_sql($data['pengajuan_deskripsi']);
					$edit['pengajuan_revisi']		= validasi_sql($data['pengajuan_revisi']);
					$edit['pengajuan_post']			= validasi_sql($data['pengajuan_post']);
					if ($data['pengajuan_file']) {
						$row = $this->WEB->get_pengajuan('*', $where_edit);
						@unlink('./assets/files/pengajuan/'.$row->pengajuan_file);
						$edit['pengajuan_file']	= $data['pengajuan_file']; 
					}
					$this->WEB->update_pengajuan($where_edit, $edit);
					$this->session->set_flashdata('success',' Pengajuan ulang telah berhasil dilakukan!,');
					redirect('home/pengajuan');		
				}		
			}
			$this->load->vars($data);
			$this->load->view('mahasiswa/home');
		} else {
			redirect("login");
		}
		
	}

}