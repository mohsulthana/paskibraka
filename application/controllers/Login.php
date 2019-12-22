<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// CEK ROLE
		if(isset($this->session->userdata()['status'])) {
			if ($this->session->userdata()['role'] == "User") {
				redirect('User/home','refresh');
			} else if ($this->session->userdata()['role'] == "Admin") {
				redirect('Admin/home','refresh');
			} else if ($this->session->userdata()['role'] == "Pimpinan") {
				redirect('Admin/homepimpinan','refresh');
			} else if ($this->session->userdata()['role'] == "Sistem") {
				redirect('Admin/home_admin_sistem','refresh');
			} else if ($this->session->userdata()['role'] == "Penilai") {
				redirect('Admin/homepenilai', 'refresh');
			}
		}
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function insert_login()
	{
		//masukkan ke database
		//balik ke halaman beranda/login
		$this->load->model('M_user');
		$nama=$_POST['nama'];
		$password=$_POST['password'];
		$result=$this->M_user->check_user($nama,$password);
		
		if(sizeof($result)>0){
			foreach ($result as $key => $row) {
				if ($row['status']==1) {

					$data_session = array(
					'nisn'		=> $row['NISN'],
					'status'	=> "1",
					'role'		=> "User"
				);

					$this->session->set_userdata($data_session);
					redirect('User/home','refresh');
				}

				else if ($row['status']==2) {
					$data_session = array(
					'nisn'		=> $row['NISN'],
					'status'	=> "2",
					'role'		=> "Admin"
				);

					$this->session->set_userdata($data_session);
					redirect('Admin/home','refresh');
				}

				else if ($row['status']==3) {
					$data_session = array(
					'nisn'		=> $row['NISN'],
					'status'	=> "3",
					'role'		=> "Pimpinan"
				);

					$this->session->set_userdata($data_session);
					redirect('Admin/homepimpinan','refresh');
				}

				else if ($row['status']==4) {
					$data_session = array(
					'nisn'		=> $row['NISN'],
					'status'	=> "4",
					'role'		=> "Sistem"
				);

					$this->session->set_userdata($data_session);
					redirect('Admin/home_admin_sistem','refresh');
				}


				else if ($row['status']==5) {
					$data_session = array(
					'nisn'		=> $row['NISN'],
					'status'	=> "5",
					'role'		=> "Penilai"
				);

					$this->session->set_userdata($data_session);
					redirect('Admin/homepenilai','refresh');
				}
				else{
					redirect('Login','refresh');
				}
			
			}
		}
		else{
				redirect('Login','refresh');
			}
		
	}

	public function insert_register()
	{
		//masukkan ke database
		//balik ke halaman beranda/login
		$this->load->model('M_user');
		$nisn=$_POST['nisn'];
		$namalengkap=$_POST['namalengkap'];
		$nama=$_POST['nama'];
		$password=$_POST['password'];
		$this->M_user->registeruser($nisn,$namalengkap,$nama,$password);

		redirect('Login','refresh');
	}

	public function register()
	{
		$this->load->view('register');
	}

}