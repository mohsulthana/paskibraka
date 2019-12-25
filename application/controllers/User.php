<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->data['title']			= 'Paskibraka Provinsi Sumatera Selatan';
		$this->load->model('M_siswa');
		$this->load->model('M_keputusan_siswa');
		// $status=$this->session->userdata('status');
		// if ($status !=1 ){
		// 	redirect('Login/index');
		// }
	}
	
	public function home()
	{
		$this->data['content']		= 'homeuser';
		$this->template($this->data);
	}
	
	
	public function insert_data_siswa(){
		//memasukkan data ke database

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
		redirect('Home');
	}

	
	
	public function pendaftaran()
	{
		$status=$this->session->userdata('status');
		if($status==1){
			$this->data['content'] = 'pendaftaran';
			$this->template($this->data);
		}
		else{
			redirect('User','refresh');
		}
		
	}
		public function datadiri()
	{
		$status=$this->session->userdata('status');
		if($status==1){
	
			$nisn											= $this->session->userdata('nisn');
			$this->data['data_siswa']	= $this->M_siswa->get_siswa($nisn);
			$this->data['content']		= 'datadiri';
			$this->template($this->data);
		}
		else{
			redirect('User','refresh');
		}
		
	}
	public function hasil()
	{
		$status=$this->session->userdata('status');
		if($status==1){
				
			$nisn=$this->session->userdata('nisn');
			$this->data['data_siswa']				=	$this->M_keputusan_siswa->lihat_ranking_siswa($nisn);
			$this->data['content']					= 'hasil';
			$this->template($this->data);
		}
		else{
			redirect('User','refresh');
		}
		
	}

	public function tampilan_hasil(){
		

	$this->data['data_siswa']=$this->M_keputusan_siswa->lihat_ranking_siswa();
		$this->data['title']		= 'Paskibraka Provinsi Sumatera Selatan';
		$this->data['content']	= 'hasil';
		
		$this->template($this->data);
	}

}