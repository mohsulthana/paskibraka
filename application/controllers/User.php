<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	public function __construct(){
		parent::__construct();
		$status=$this->session->userdata('status');
		if ($status!=1 ){
			redirect('Login/index');
		
		}
	}
	
	public function home()
	{
		$this->load->view('homeuser');
	}
	
	
	public function insert_data_siswa(){
		//memasukkan data ke database
		$this->load->model('M_siswa');
		$nisn=$this->session->userdata('nisn');
		$email=$_POST['email'];
		$hp=$_POST['nomorhp'];
		$kelas=$_POST['kelas'];
		$sekolah=$_POST['sekolah'];
		$daerah=$_POST['daerah'];
		$jk=$_POST['jeniskelamin'];
		$tb=$_POST['tinggibadan'];
		$bb=$_POST['beratbadan'];
		$delegasi="-";
		$aktif_sekolah="-";
		$izin_ortu="-";
		$surat_kesehatan="-";
		$biodata="-";
		$foto="-";

		$config['upload_path'] ='./berkas/'.$nisn.'/';
		$config['allowed_types'] = 'pdf|jpg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1920';
		$config['max_height'] = '1920';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if( !is_dir($config['upload_path'])){
			mkdir($config['upload_path'],0777,TRUE);
		}

		if ( ! $this->upload->do_upload('surat_delegasi'))
		 {
			$error = array('error' => $this->upload->display_errors());
			echo $config['upload_path'];
			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$delegasi=$data['upload_data']['full_path'];
		}

		if ( ! $this->upload->do_upload('aktif_sekolah'))
		 {
			$error = array('error' => $this->upload->display_errors());
			echo $config['upload_path'];
			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$aktif_sekolah=$data['upload_data']['full_path'];
		}

		if ( ! $this->upload->do_upload('izin_ortu'))
		 {
			$error = array('error' => $this->upload->display_errors());
			echo $config['upload_path'];
			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$izin_ortu=$data['upload_data']['full_path'];
		}

		if ( ! $this->upload->do_upload('surat_sehat'))
		 {
			$error = array('error' => $this->upload->display_errors());
			echo $config['upload_path'];
			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$surat_kesehatan=$data['upload_data']['full_path'];
		}

		if ( ! $this->upload->do_upload('biodata'))
		 {
			$error = array('error' => $this->upload->display_errors());
			echo $config['upload_path'];
			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$biodata=$data['upload_data']['full_path'];
		
		}

		if ( ! $this->upload->do_upload('foto'))
		 {
			$error = array('error' => $this->upload->display_errors());
			echo $config['upload_path'];
			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$foto=$data['upload_data']['full_path'];
		}


		$this->M_siswa->insert_siswa ($nisn,$email,$hp,$kelas,$sekolah,$daerah,$jk,$tb,$bb,$delegasi,$aktif_sekolah,$izin_ortu,$surat_kesehatan,$biodata,$foto);
		redirect('User/pendaftaran','refresh');
	}

	function logout(){
		session_unset();
		$this->session->sess_destroy();
		redirect(base_url().'Login/index','refresh');
	}

	
	
	public function pendaftaran()
	{
		$status=$this->session->userdata('status');
		if($status==1){
			$this->load->view('pendaftaran');
		}
		else{
			redirect('User','refresh');
		}
		
	}
		public function datadiri()
	{
		$status=$this->session->userdata('status');
		if($status==1){
			$this->load->model('M_siswa');
			$nisn=$this->session->userdata('nisn');
			$x['data_siswa']=$this->M_siswa->get_siswa($nisn);

			$this->load->view('datadiri',$x);
		}
		else{
			redirect('User','refresh');
		}
		
	}
	public function hasil()
	{
		$status=$this->session->userdata('status');
		if($status==1){
				$this->load->model('M_keputusan_siswa');
					$nisn=$this->session->userdata('nisn');
			$x['data_siswa']=$this->M_keputusan_siswa->lihat_ranking_siswa($nisn);
			$this->load->view('hasil',$x);
		}
		else{
			redirect('User','refresh');
		}
		
	}

	public function tampilan_hasil(){
		$this->load->model('M_keputusan_siswa');
		$x['data_siswa']=$this->M_keputusan_siswa->lihat_ranking_siswa();
		$this->load->view('User/hasil',$x);
	}

}
