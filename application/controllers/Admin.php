<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_kriteria');
		$this->load->model('M_siswa');
		$this->load->model('M_keputusan_siswa');
		$this->load->model('M_user');
		$this->load->model('M_Penilaian');
		$status=$this->session->userdata('status');
		if ($status==1){
			redirect('Login/index');
		}
		elseif (!isset($status)) {
			redirect('Login/index');
		}
	}

	public function home()
	{
		$this->data['title']		= 'Paskibraka Provinsi Sumatera Selatan';
		$this->data['content']	= 'index';
		$this->template($this->data);
	}

	public function homepimpinan(){
		$this->data['title']		= 'Paskibraka Provinsi Sumatera Selatan';
		$this->data['content']	= 'homepimpinan';
		$this->template($this->data);
	}

	public function input_bobot (){

		$x['id_bobot']=$_POST['id_bobot'];
		$this->load->view('update_bobot',$x);
	}


		public function insert_bobot(){
		//memasukkan data ke database
		//$nisn,$wawancara,$tertulis,$kesehatan,$postur,$jasmani
		$id_bobot=$_POST['id_bobot'];
		$nama=$_POST['nama'];
		$bobot=$_POST['bobot'];

		$this->M_kriteria->update_bobot ($id_bobot,$nama,$bobot);
		redirect('Admin/kriteria_penilaian','refresh');
	}

	public function insert_nilai_admin (){
		//memasukkan data ke database
		//$nisn,$wawancara,$tertulis,$kesehatan,$postur,$jasmani
		$this->load->model('M_Penilaian');
		$nisn=$_POST['nisn'];
		$attitude=$_POST['attitude'];
		$karakter=$_POST['karakter'];
		$antusiasme=$_POST['antusiasme'];
		$pengalaman=$_POST['pengalaman'];
		$komunikasi=$_POST['komunikasi'];
		$wawancara=($attitude+$karakter+$antusiasme+$pengalaman+$komunikasi)/5;

		$tertulis=$_POST['tertulis'];



		$this->M_Penilaian->insert_nilai_admin ($nisn,$wawancara,$tertulis);
		redirect('Admin/datapendaftar','refresh');
	}

	public function kriteria_penilaian(){
		$this->data['content']		= 'kriteriabobot';
		$this->data['title']			= 'Kriteria Penilaian';
		$this->data['data_siswa']	= $this->M_kriteria->get_all_kriteria();
		$this->template($this->data);
	}

	public function daftarnilai()
	{
		$this->data['content']			= 'daftarnilai';
		$this->data['title']				= 'Daftar nilai';
		$this->data['data_nilai']		= $this->M_Penilaian->get_all_penilaian();
		$this->template($this->data);
	}


	public function kriteria_pimpinan(){
		$x['data_siswa']=$this->M_kriteria->get_all_kriteria();
		$this->load->view('kriteria_pimpinan',$x);
	}

	public function algoritma_topsis (){
		//deklarasi bobot
		$data_bobot=$this->M_kriteria->get_all_kriteria();

		$bobot_kriteria = array();
		foreach ($data_bobot as $key => $row){
			$x=$row['bobot'];
			array_push($bobot_kriteria, $x);
		}

		$this->load->model('M_Penilaian');
		$data_penilaian_perempuan=$this->M_Penilaian->get_all_penilaian_perempuan();
		$data_penilaian_laki_laki=$this->M_Penilaian->get_all_penilaian_laki_laki();
		//mencari nilai bawah dari matriks ternormalisasi
		$ternormalisasi_tertulis=0;
		foreach ($data_penilaian_perempuan as $key => $row) {
			$ternormalisasi_tertulis=$ternormalisasi_tertulis+($row['Tertulis'] * $row['Tertulis']);	
		}

		$ternormalisasi_wawancara=0;
		foreach ($data_penilaian_perempuan as $key => $row) {
			$ternormalisasi_wawancara=$ternormalisasi_wawancara+($row['Wawancara'] * $row['Wawancara']);	
		}

		$ternormalisasi_kesehatan=0;
		foreach ($data_penilaian_perempuan as $key => $row) {
			$ternormalisasi_kesehatan=$ternormalisasi_kesehatan+($row['Kesehatan'] * $row['Kesehatan']);	
		}

		$ternormalisasi_jasmani=0;
		foreach ($data_penilaian_perempuan as $key => $row) {
			$ternormalisasi_jasmani=$ternormalisasi_jasmani+($row['Jasmani'] * $row['Jasmani']);	
		}

		$ternormalisasi_postur=0;
		foreach ($data_penilaian_perempuan as $key => $row) {
			$ternormalisasi_postur=$ternormalisasi_postur+($row['Postur'] * $row['Postur']);	
		}

		$ternormalisasi_perempuan = array(
			sqrt($ternormalisasi_wawancara),
			sqrt($ternormalisasi_tertulis),
			sqrt($ternormalisasi_kesehatan),
			sqrt($ternormalisasi_postur),
			sqrt($ternormalisasi_jasmani)
		);

		$ternormalisasi_tertulis=0;
		foreach ($data_penilaian_laki_laki as $key => $row) {
			$ternormalisasi_tertulis=$ternormalisasi_tertulis+($row['Tertulis'] * $row['Tertulis']);	
		}

		$ternormalisasi_wawancara=0;
		foreach ($data_penilaian_laki_laki as $key => $row) {
			$ternormalisasi_wawancara=$ternormalisasi_wawancara+($row['Wawancara'] * $row['Wawancara']);	
		}

		$ternormalisasi_kesehatan=0;
		foreach ($data_penilaian_laki_laki as $key => $row) {
			$ternormalisasi_kesehatan=$ternormalisasi_kesehatan+($row['Kesehatan'] * $row['Kesehatan']);	
		}

		$ternormalisasi_jasmani=0;
		foreach ($data_penilaian_laki_laki as $key => $row) {
			$ternormalisasi_jasmani=$ternormalisasi_jasmani+($row['Jasmani'] * $row['Jasmani']);	
		}

		$ternormalisasi_postur=0;
		foreach ($data_penilaian_laki_laki as $key => $row) {
			$ternormalisasi_postur=$ternormalisasi_postur+($row['Postur'] * $row['Postur']);	
		}

		$ternormalisasi_laki_laki = array(
				sqrt($ternormalisasi_wawancara),
			sqrt($ternormalisasi_tertulis),
			sqrt($ternormalisasi_kesehatan),
			sqrt($ternormalisasi_postur),
			sqrt($ternormalisasi_jasmani)
			
		);

		// echo "<br> TERNORMALISASI LAKI-LAKI";
		// print_r($ternormalisasi_laki_laki);

		// echo "<br> TERNORMALISASI PEREMPUAN";
		// print_r($ternormalisasi_perempuan);
		// echo "<br><br>";

		//Matriks ternormalisasi
		$alternatif_ternormalisasi_perempuan=array();

		foreach ($data_penilaian_perempuan as $key => $row) {
			$temp_normalisasi=array();

			$x=$row['Wawancara']/$ternormalisasi_perempuan[0];
			array_push($temp_normalisasi, $x);

			$x=$row['Tertulis']/$ternormalisasi_perempuan[1];
			array_push($temp_normalisasi, $x);

			$x=$row['Kesehatan']/$ternormalisasi_perempuan[2];
			array_push($temp_normalisasi, $x);

			$x=$row['Postur']/$ternormalisasi_perempuan[3];
			array_push($temp_normalisasi, $x);

			$x=$row['Jasmani']/$ternormalisasi_perempuan[4];
			array_push($temp_normalisasi, $x);

			array_push($alternatif_ternormalisasi_perempuan, $temp_normalisasi);
		}
		$alternatif_ternormalisasi_laki_laki=array();
		foreach ($data_penilaian_laki_laki as $key => $row) {
			$temp_normalisasi=array();

			$x=$row['Wawancara']/$ternormalisasi_laki_laki[0];
			array_push($temp_normalisasi, $x);

			$x=$row['Tertulis']/$ternormalisasi_laki_laki[1];
			array_push($temp_normalisasi, $x);

			$x=$row['Kesehatan']/$ternormalisasi_laki_laki[2];
			array_push($temp_normalisasi, $x);

			$x=$row['Postur']/$ternormalisasi_laki_laki[3];
			array_push($temp_normalisasi, $x);

			$x=$row['Jasmani']/$ternormalisasi_laki_laki[4];
			array_push($temp_normalisasi, $x);

			array_push($alternatif_ternormalisasi_laki_laki, $temp_normalisasi);
		}
		// echo "ALTERNATIF TERNORMALISASI PEREMPUAN<br>";
		// print_r($alternatif_ternormalisasi_perempuan);
		// echo "ALTERNATIF TERNORMALISASI LAKI-LAKI"; 
		// print_r($alternatif_ternormalisasi_laki_laki);
		// echo "<br><br>";

		//ternormalisasi terbobot
		$ternormalisasi_terbobot_perempuan=array();
		for($x=0; $x<sizeof($alternatif_ternormalisasi_perempuan); $x++){
			$temp_terbobot = array();
			$y=$alternatif_ternormalisasi_perempuan[$x][0]*$bobot_kriteria[1];
			array_push($temp_terbobot, $y);
			$y=$alternatif_ternormalisasi_perempuan[$x][1]*$bobot_kriteria[0];
			array_push($temp_terbobot, $y);
			$y=$alternatif_ternormalisasi_perempuan[$x][2]*$bobot_kriteria[2];
			array_push($temp_terbobot, $y);
			$y=$alternatif_ternormalisasi_perempuan[$x][3]*$bobot_kriteria[4];
			array_push($temp_terbobot, $y);
			$y=$alternatif_ternormalisasi_perempuan[$x][4]*$bobot_kriteria[3];
			array_push($temp_terbobot, $y);

			array_push($ternormalisasi_terbobot_perempuan, $temp_terbobot);
		}
		$ternormalisasi_terbobot_laki_laki=array();
		for($x=0; $x<sizeof($alternatif_ternormalisasi_laki_laki); $x++){
			$temp_terbobot = array();
			$y=$alternatif_ternormalisasi_laki_laki[$x][0]*$bobot_kriteria[1];
			array_push($temp_terbobot, $y);
			$y=$alternatif_ternormalisasi_laki_laki[$x][1]*$bobot_kriteria[0];
			array_push($temp_terbobot, $y);
			$y=$alternatif_ternormalisasi_laki_laki[$x][2]*$bobot_kriteria[2];
			array_push($temp_terbobot, $y);
			$y=$alternatif_ternormalisasi_laki_laki[$x][3]*$bobot_kriteria[4];
			array_push($temp_terbobot, $y);
			$y=$alternatif_ternormalisasi_laki_laki[$x][4]*$bobot_kriteria[3];
			array_push($temp_terbobot, $y);

			array_push($ternormalisasi_terbobot_laki_laki, $temp_terbobot);
		}
		// echo "TERNORMALISASI TERBOBOT PEREMPUAN";
		// print_r($ternormalisasi_terbobot_perempuan);
		// echo "<br>";
		// echo "TERNORMALISASI TERBOBOT LAKI-LAKI";
		// print_r($ternormalisasi_terbobot_laki_laki);
		// echo "<br><br>";

		//mencari nilai maksimum (ideal positif)
		$ideal_positif_perempuan=array();

		$ideal_positif_perempuan_1=0;
		$ideal_positif_perempuan_2=0;
		$ideal_positif_perempuan_3=0;
		$ideal_positif_perempuan_4=0;
		$ideal_positif_perempuan_5=0;

		for($x=0; $x<sizeof($ternormalisasi_terbobot_perempuan); $x++){
			if($ideal_positif_perempuan_1<$ternormalisasi_terbobot_perempuan[$x][0]){
				$ideal_positif_perempuan_1=$ternormalisasi_terbobot_perempuan[$x][0];
			}
			if($ideal_positif_perempuan_2<$ternormalisasi_terbobot_perempuan[$x][1]){
				$ideal_positif_perempuan_2=$ternormalisasi_terbobot_perempuan[$x][1];
			}
			if($ideal_positif_perempuan_3<$ternormalisasi_terbobot_perempuan[$x][2]){
				$ideal_positif_perempuan_3=$ternormalisasi_terbobot_perempuan[$x][2];
			}
			if($ideal_positif_perempuan_4<$ternormalisasi_terbobot_perempuan[$x][3]){
				$ideal_positif_perempuan_4=$ternormalisasi_terbobot_perempuan[$x][3];
			}
			if($ideal_positif_perempuan_5<$ternormalisasi_terbobot_perempuan[$x][4]){
				$ideal_positif_perempuan_5=$ternormalisasi_terbobot_perempuan[$x][4];
			}
		}

		array_push($ideal_positif_perempuan, $ideal_positif_perempuan_1);
		array_push($ideal_positif_perempuan, $ideal_positif_perempuan_2);
		array_push($ideal_positif_perempuan, $ideal_positif_perempuan_3);
		array_push($ideal_positif_perempuan, $ideal_positif_perempuan_4);
		array_push($ideal_positif_perempuan, $ideal_positif_perempuan_5);

		//ideal positif laki-laki
		$ideal_positif_laki_laki=array();

		$ideal_positif_laki_laki_1=0;
		$ideal_positif_laki_laki_2=0;
		$ideal_positif_laki_laki_3=0;
		$ideal_positif_laki_laki_4=0;
		$ideal_positif_laki_laki_5=0;

		for($x=0; $x<sizeof($ternormalisasi_terbobot_laki_laki); $x++){
			if($ideal_positif_laki_laki_1<$ternormalisasi_terbobot_laki_laki[$x][0]){
				$ideal_positif_laki_laki_1=$ternormalisasi_terbobot_laki_laki[$x][0];
			}
			if($ideal_positif_laki_laki_2<$ternormalisasi_terbobot_laki_laki[$x][1]){
				$ideal_positif_laki_laki_2=$ternormalisasi_terbobot_laki_laki[$x][1];
			}
			if($ideal_positif_laki_laki_3<$ternormalisasi_terbobot_laki_laki[$x][2]){
				$ideal_positif_laki_laki_3=$ternormalisasi_terbobot_laki_laki[$x][2];
			}
			if($ideal_positif_laki_laki_4<$ternormalisasi_terbobot_laki_laki[$x][3]){
				$ideal_positif_laki_laki_4=$ternormalisasi_terbobot_laki_laki[$x][3];
			}
			if($ideal_positif_laki_laki_5<$ternormalisasi_terbobot_laki_laki[$x][4]){
				$ideal_positif_laki_laki_5=$ternormalisasi_terbobot_laki_laki[$x][4];
			}
		}
		array_push($ideal_positif_laki_laki, $ideal_positif_laki_laki_1);
		array_push($ideal_positif_laki_laki, $ideal_positif_laki_laki_2);
		array_push($ideal_positif_laki_laki, $ideal_positif_laki_laki_3);
		array_push($ideal_positif_laki_laki, $ideal_positif_laki_laki_4);
		array_push($ideal_positif_laki_laki, $ideal_positif_laki_laki_5);

		//ideal negatif perempuan
		$ideal_negatif_perempuan=array();

		$ideal_negatif_perempuan_1=99999;
		$ideal_negatif_perempuan_2=99999;
		$ideal_negatif_perempuan_3=99999;
		$ideal_negatif_perempuan_4=99999;
		$ideal_negatif_perempuan_5=99999;

		for($x=0; $x<sizeof($ternormalisasi_terbobot_perempuan); $x++){
			if($ideal_negatif_perempuan_1>$ternormalisasi_terbobot_perempuan[$x][0]){
				$ideal_negatif_perempuan_1=$ternormalisasi_terbobot_perempuan[$x][0];
			}
			if($ideal_negatif_perempuan_2>$ternormalisasi_terbobot_perempuan[$x][1]){
				$ideal_negatif_perempuan_2=$ternormalisasi_terbobot_perempuan[$x][1];
			}
			if($ideal_negatif_perempuan_3>$ternormalisasi_terbobot_perempuan[$x][2]){
				$ideal_negatif_perempuan_3=$ternormalisasi_terbobot_perempuan[$x][2];
			}
			if($ideal_negatif_perempuan_4>$ternormalisasi_terbobot_perempuan[$x][3]){
				$ideal_negatif_perempuan_4=$ternormalisasi_terbobot_perempuan[$x][3];
			}
			if($ideal_negatif_perempuan_5>$ternormalisasi_terbobot_perempuan[$x][4]){
				$ideal_negatif_perempuan_5=$ternormalisasi_terbobot_perempuan[$x][4];
			}
		}

		array_push($ideal_negatif_perempuan, $ideal_negatif_perempuan_1);
		array_push($ideal_negatif_perempuan, $ideal_negatif_perempuan_2);
		array_push($ideal_negatif_perempuan, $ideal_negatif_perempuan_3);
		array_push($ideal_negatif_perempuan, $ideal_negatif_perempuan_4);
		array_push($ideal_negatif_perempuan, $ideal_negatif_perempuan_5);

		//ideal negatif laki-laki
		$ideal_negatif_laki_laki=array();

		$ideal_negatif_laki_laki_1=99999;
		$ideal_negatif_laki_laki_2=99999;
		$ideal_negatif_laki_laki_3=99999;
		$ideal_negatif_laki_laki_4=99999;
		$ideal_negatif_laki_laki_5=99999;

		for($x=0; $x<sizeof($ternormalisasi_terbobot_laki_laki); $x++){
			if($ideal_negatif_laki_laki_1>$ternormalisasi_terbobot_laki_laki[$x][0]){
				$ideal_negatif_laki_laki_1=$ternormalisasi_terbobot_laki_laki[$x][0];
			}
			if($ideal_negatif_laki_laki_2>$ternormalisasi_terbobot_laki_laki[$x][1]){
				$ideal_negatif_laki_laki_2=$ternormalisasi_terbobot_laki_laki[$x][1];
			}
			if($ideal_negatif_laki_laki_3>$ternormalisasi_terbobot_laki_laki[$x][2]){
				$ideal_negatif_laki_laki_3=$ternormalisasi_terbobot_laki_laki[$x][2];
			}
			if($ideal_negatif_laki_laki_4>$ternormalisasi_terbobot_laki_laki[$x][3]){
				$ideal_negatif_laki_laki_4=$ternormalisasi_terbobot_laki_laki[$x][3];
			}
			if($ideal_negatif_laki_laki_5>$ternormalisasi_terbobot_laki_laki[$x][4]){
				$ideal_negatif_laki_laki_5=$ternormalisasi_terbobot_laki_laki[$x][4];
			}
		}
		array_push($ideal_negatif_laki_laki, $ideal_negatif_laki_laki_1);
		array_push($ideal_negatif_laki_laki, $ideal_negatif_laki_laki_2);
		array_push($ideal_negatif_laki_laki, $ideal_negatif_laki_laki_3);
		array_push($ideal_negatif_laki_laki, $ideal_negatif_laki_laki_4);
		array_push($ideal_negatif_laki_laki, $ideal_negatif_laki_laki_5);

		// echo "IDEAL POSITIF LAKI-LAKI";
		// print_r($ideal_positif_laki_laki);
		// echo "<br>";
		// echo "IDEAL NEGATIF LAKI-LAKI";
		// print_r($ideal_negatif_laki_laki);
		// echo "<br><br>";
		// 	echo "IDEAL POSITIF PEREMPUAN";
		// print_r($ideal_positif_perempuan);
		// echo "<br>";
		// echo "IDEAL NEGATIF PEREMPUAN";
		// print_r($ideal_negatif_perempuan);
		// echo "<br><br>";
		
		//Jarak Pengurangan Nilai Perempuan
		$pengurangan_jarak_positif_perempuan=array();
		for($x=0; $x<sizeof($ternormalisasi_terbobot_perempuan); $x++){
			$temp_jarak = array();
			$z=$ideal_positif_perempuan[0]-$ternormalisasi_terbobot_perempuan[$x][0];
			array_push($temp_jarak, $z);
			$z=$ideal_positif_perempuan[1]-$ternormalisasi_terbobot_perempuan[$x][1];
			array_push($temp_jarak, $z);
			$z=$ideal_positif_perempuan[2]-$ternormalisasi_terbobot_perempuan[$x][2];
			array_push($temp_jarak, $z);
			$z=$ideal_positif_perempuan[3]-$ternormalisasi_terbobot_perempuan[$x][3];
			array_push($temp_jarak, $z);
			$z=$ideal_positif_perempuan[4]-$ternormalisasi_terbobot_perempuan[$x][4];
			array_push($temp_jarak, $z);

			array_push($pengurangan_jarak_positif_perempuan, $temp_jarak);
		}

		$pengurangan_jarak_negatif_perempuan=array();
		for($x=0; $x<sizeof($ternormalisasi_terbobot_perempuan); $x++){
			$temp_jarak = array();
			$z=$ternormalisasi_terbobot_perempuan[$x][0]-$ideal_negatif_perempuan[0];
			array_push($temp_jarak, $z);
			$z=$ternormalisasi_terbobot_perempuan[$x][1]-$ideal_negatif_perempuan[1];
			array_push($temp_jarak, $z);
			$z=$ternormalisasi_terbobot_perempuan[$x][2]-$ideal_negatif_perempuan[2];
			array_push($temp_jarak, $z);
			$z=$ternormalisasi_terbobot_perempuan[$x][3]-$ideal_negatif_perempuan[3];
			array_push($temp_jarak, $z);
			$z=$ternormalisasi_terbobot_perempuan[$x][4]-$ideal_negatif_perempuan[4];
			array_push($temp_jarak, $z);

			array_push($pengurangan_jarak_negatif_perempuan, $temp_jarak);
		}



		//Jarak Pengurangan Nilai laki-laki
		$pengurangan_jarak_positif_laki_laki=array();
		for($x=0; $x<sizeof($ternormalisasi_terbobot_laki_laki); $x++){
			$temp_jarak = array();
			$z=$ideal_positif_laki_laki[0]-$ternormalisasi_terbobot_laki_laki[$x][0];
			array_push($temp_jarak, $z);
			$z=$ideal_positif_laki_laki[1]-$ternormalisasi_terbobot_laki_laki[$x][1];
			array_push($temp_jarak, $z);
			$z=$ideal_positif_laki_laki[2]-$ternormalisasi_terbobot_laki_laki[$x][2];
			array_push($temp_jarak, $z);
			$z=$ideal_positif_laki_laki[3]-$ternormalisasi_terbobot_laki_laki[$x][3];
			array_push($temp_jarak, $z);
			$z=$ideal_positif_laki_laki[4]-$ternormalisasi_terbobot_laki_laki[$x][4];
			array_push($temp_jarak, $z);

			array_push($pengurangan_jarak_positif_laki_laki, $temp_jarak);
		}

		$pengurangan_jarak_negatif_laki_laki=array();
		for($x=0; $x<sizeof($ternormalisasi_terbobot_laki_laki); $x++){
			$temp_jarak = array();
			$z=$ternormalisasi_terbobot_laki_laki[$x][0]-$ideal_negatif_laki_laki[0];
			array_push($temp_jarak, $z);
			$z=$ternormalisasi_terbobot_laki_laki[$x][1]-$ideal_negatif_laki_laki[1];
			array_push($temp_jarak, $z);
			$z=$ternormalisasi_terbobot_laki_laki[$x][2]-$ideal_negatif_laki_laki[2];
			array_push($temp_jarak, $z);
			$z=$ternormalisasi_terbobot_laki_laki[$x][3]-$ideal_negatif_laki_laki[3];
			array_push($temp_jarak, $z);
			$z=$ternormalisasi_terbobot_laki_laki[$x][4]-$ideal_negatif_laki_laki[4];
			array_push($temp_jarak, $z);

			array_push($pengurangan_jarak_negatif_laki_laki, $temp_jarak);
		}

		// echo "PENGURANGAN JARAK NEGATIF LAKI-LAKI";
		// print_r($pengurangan_jarak_negatif_laki_laki);
		// echo "<br>";
		// echo "PENGURANGAN JARAK POSITIF LAKI-LAKI";
		// print_r($pengurangan_jarak_positif_laki_laki);
		// echo "<br>";
		// echo "PENGURANGAN JARAK NEGATIF PEREMPUAN";
		// print_r($pengurangan_jarak_negatif_perempuan);
		// echo "<br>";
		// echo "PENGURANGAN JARAK POSITIF PEREMPUAN";
		// print_r($pengurangan_jarak_positif_laki_laki);
		// echo "<br><br>";

		$jarak_solusi_ideal_positif_perempuan=array();
		for($x=0; $x<sizeof($pengurangan_jarak_positif_perempuan); $x++){
			$temp=0;
			$temp=($pengurangan_jarak_positif_perempuan[$x][0]*$pengurangan_jarak_positif_perempuan[$x][0])+$temp;
			$temp=($pengurangan_jarak_positif_perempuan[$x][1]*$pengurangan_jarak_positif_perempuan[$x][1])+$temp;
			$temp=($pengurangan_jarak_positif_perempuan[$x][2]*$pengurangan_jarak_positif_perempuan[$x][2])+$temp;
			$temp=($pengurangan_jarak_positif_perempuan[$x][3]*$pengurangan_jarak_positif_perempuan[$x][3])+$temp;
			$temp=($pengurangan_jarak_positif_perempuan[$x][4]*$pengurangan_jarak_positif_perempuan[$x][4])+$temp;
			array_push($jarak_solusi_ideal_positif_perempuan, sqrt($temp));
		}

		$jarak_solusi_ideal_negatif_perempuan=array();
		for($x=0; $x<sizeof($pengurangan_jarak_negatif_perempuan); $x++){
			$temp=0;
			$temp=($pengurangan_jarak_negatif_perempuan[$x][0]*$pengurangan_jarak_negatif_perempuan[$x][0])+$temp;
			$temp=($pengurangan_jarak_negatif_perempuan[$x][1]*$pengurangan_jarak_negatif_perempuan[$x][1])+$temp;
			$temp=($pengurangan_jarak_negatif_perempuan[$x][2]*$pengurangan_jarak_negatif_perempuan[$x][2])+$temp;
			$temp=($pengurangan_jarak_negatif_perempuan[$x][3]*$pengurangan_jarak_negatif_perempuan[$x][3])+$temp;
			$temp=($pengurangan_jarak_negatif_perempuan[$x][4]*$pengurangan_jarak_negatif_perempuan[$x][4])+$temp;
			array_push($jarak_solusi_ideal_negatif_perempuan, sqrt($temp));
		}

		$jarak_solusi_ideal_positif_laki_laki=array();
		for($x=0; $x<sizeof($pengurangan_jarak_positif_laki_laki); $x++){
			$temp=0;
			$temp=($pengurangan_jarak_positif_laki_laki[$x][0]*$pengurangan_jarak_positif_laki_laki[$x][0])+$temp;
			$temp=($pengurangan_jarak_positif_laki_laki[$x][1]*$pengurangan_jarak_positif_laki_laki[$x][1])+$temp;
			$temp=($pengurangan_jarak_positif_laki_laki[$x][2]*$pengurangan_jarak_positif_laki_laki[$x][2])+$temp;
			$temp=($pengurangan_jarak_positif_laki_laki[$x][3]*$pengurangan_jarak_positif_laki_laki[$x][3])+$temp;
			$temp=($pengurangan_jarak_positif_laki_laki[$x][4]*$pengurangan_jarak_positif_laki_laki[$x][4])+$temp;
			array_push($jarak_solusi_ideal_positif_laki_laki, sqrt($temp));
		}

		$jarak_solusi_ideal_negatif_laki_laki=array();
		for($x=0; $x<sizeof($pengurangan_jarak_negatif_laki_laki); $x++){
			$temp=0;
			$temp=($pengurangan_jarak_negatif_laki_laki[$x][0]*$pengurangan_jarak_negatif_laki_laki[$x][0])+$temp;
			$temp=($pengurangan_jarak_negatif_laki_laki[$x][1]*$pengurangan_jarak_negatif_laki_laki[$x][1])+$temp;
			$temp=($pengurangan_jarak_negatif_laki_laki[$x][2]*$pengurangan_jarak_negatif_laki_laki[$x][2])+$temp;
			$temp=($pengurangan_jarak_negatif_laki_laki[$x][3]*$pengurangan_jarak_negatif_laki_laki[$x][3])+$temp;
			$temp=($pengurangan_jarak_negatif_laki_laki[$x][4]*$pengurangan_jarak_negatif_laki_laki[$x][4])+$temp;
			array_push($jarak_solusi_ideal_negatif_laki_laki, sqrt($temp));
		}

		// echo "JARAK SOLUSI NEGATIF LAKI-LAKI";
		// print_r($jarak_solusi_ideal_negatif_laki_laki);
		// echo "<br>";
		// echo "JARAK SOLUSI NEGATIF PEREMPUAN";
		// print_r($jarak_solusi_ideal_negatif_perempuan);
		// echo "<br>";
		// echo "JARAK SOLUSI POSITIF LAKI-LAKI";
		// print_r($jarak_solusi_ideal_positif_laki_laki);
		// echo "<br>";
		// echo "JARAK SOLUSI POSITIF PEREMPUAN";
		// print_r($jarak_solusi_ideal_positif_perempuan);
		
		// echo "<br><br>";
		//ambil data dari tabel excell nilai

		$preferensi_perempuan=array();
		for($x=0; $x<sizeof($jarak_solusi_ideal_positif_perempuan); $x++){
			$temp=$jarak_solusi_ideal_negatif_perempuan[$x]/($jarak_solusi_ideal_negatif_perempuan[$x]+$jarak_solusi_ideal_positif_perempuan[$x]);
			array_push($preferensi_perempuan, $temp);
		}

		$preferensi_laki_laki=array();
		for($x=0; $x<sizeof($jarak_solusi_ideal_positif_laki_laki); $x++){
			$temp=$jarak_solusi_ideal_negatif_laki_laki[$x]/($jarak_solusi_ideal_negatif_laki_laki[$x]+$jarak_solusi_ideal_positif_laki_laki[$x]);
			array_push($preferensi_laki_laki, $temp);
		}

		$data_all_perempuan=array();
		$x=0;
		foreach ($data_penilaian_perempuan as $key => $row) {
			$data_temp=array();
			array_push($data_temp, $row['nisn']);
			array_push($data_temp, $preferensi_perempuan[$x]);
			$x++;
			array_push($data_all_perempuan, $data_temp);
		}

		$data_all_laki_laki=array();
		$x=0;
		foreach ($data_penilaian_laki_laki as $key => $row) {
			$data_temp=array();
			array_push($data_temp, $row['nisn']);
			array_push($data_temp, $preferensi_laki_laki[$x]);
			$x++;
			array_push($data_all_laki_laki, $data_temp);
		}
		//b,a = terbesar ke kecil, a,b= terkecil ke besar
		usort($data_all_perempuan, function($b, $a){
			if($a[1] == $b[1]){
				return 0;
			}
			return ($a[1] < $b[1]) ? -1:1;});
		usort($data_all_laki_laki, function($b, $a){
			if($a[1] == $b[1]){
				return 0;
			}
			return ($a[1] < $b[1]) ? -1:1;});
			// echo "urutan";
			// echo "<br>";
			// print_r($data_all_perempuan);
			// echo "<br>";
			// echo "<br>";
			// print_r($data_all_laki_laki);


			for($x=0; $x<sizeof($data_all_perempuan); $x++){
				if($x<26){
					$this->M_keputusan_siswa->insert_keputusan ($data_all_perempuan[$x][0],$data_all_perempuan[$x][1],"Lulus by Sistem");
				}
				else{
					$this->M_keputusan_siswa->insert_keputusan ($data_all_perempuan[$x][0],$data_all_perempuan[$x][1],"Tidak Lulus by Sistem");
				}
			}

			for($x=0; $x<sizeof($data_all_laki_laki); $x++){
				if($x<26){
					$this->M_keputusan_siswa->insert_keputusan ($data_all_laki_laki[$x][0],$data_all_laki_laki[$x][1],"Lulus by Sistem");
				}
				else{
					$this->M_keputusan_siswa->insert_keputusan ($data_all_laki_laki[$x][0],$data_all_laki_laki[$x][1],"Tidak Lulus by Sistem");
				}
			}
			redirect('Admin/perankingan','refresh');

	}

	public function datapendaftar()
	{
		$this->data['data_siswa']	= $this->M_siswa->get_all_siswa();
		$this->data['content']		= 'datapendaftar';
		$this->data['title']			= 'Data Pendaftar';
		$this->template($this->data);
	}

	public function datapendaftarpimpinan()
	{
		$x['data_siswa']=$this->M_siswa->get_all_siswa();
		$this->load->view('datapendaftarpimpinan',$x);
	}


	public function penilaian()
	{
		$x['nisn']=$_POST['nisn'];
		$this->load->view('penilaian',$x);
	}

	public function detail(){
		$nisn=$_POST['nisn'];

		$this->data['data_siswa']	= $this->M_siswa->get_siswa($nisn);
		$this->data['content']		= 'detailpeserta';
		$this->data['title']			= 'Detail Peserta';
		$this->template($this->data);
	}

		public function detailpimpinan(){
		$nisn=$_POST['nisn'];
		$x['data_siswa']=$this->M_siswa->get_siswa($nisn);

		$this->load->view('detailpimpinan',$x);
	}

	public function hapusdata(){
		$nisn=$_POST['nisn'];
		$this->M_user->hapusdata($nisn);
		redirect('Admin/datapendaftar','refresh');
	}

	public function perankingan()
	{
		$this->data['title']					= 'Data Perankingan';
		$this->data['content']				= 'ranking';
		$this->data['lihat_ranking']	= $this->M_keputusan_siswa->lihat_ranking();
		$this->template($this->data);
	}

		public function rankingpimpinan()
	{
		$this->data['lihat_ranking']	=$this->M_keputusan_siswa->lihat_ranking();
		$this->data['content']				= 'rankingpimpinan';
		$this->data['title']					= 'Paskibraka Provinsi Sumatera Selatan';
		$this->template($this->data);
	}


	
	public function homepenilai()
	{
		$this->data['content']			= 'homepenilai';
		$this->data['title']				= 'Paskibraka Provinsi Sumatera Selatan';
		$this->template($this->data);
	}

	
		public function kriteria_penilai(){
		$x['data_siswa']=$this->M_kriteria->get_all_kriteria();
		$this->load->view('kriteria_penilai',$x);
	}

	public function datapendaftar_penilai()
	{
		$x['data_siswa']=$this->M_siswa->get_all_siswa();
		$this->load->view('datapendaftar_penilai',$x);
	}

	public function detail_penilai(){
		$nisn=$_POST['nisn'];
		$x['data_siswa']=$this->M_siswa->get_siswa($nisn);

		$this->load->view('detail_penilai',$x);
	}

		public function penilaian_penilai()
	{
		$x['nisn']=$_POST['nisn'];
		$this->load->view('penilaian_penilai',$x);
	}

	public function insert_nilai_tim_penilai (){
		//memasukkan data ke database
		//$nisn,$wawancara,$tertulis,$kesehatan,$postur,$jasmani
	$this->load->model('M_Penilaian');
	$nisn=$_POST['nisn'];
	$kesehatan=$_POST['kesehatan'];
	$postur=$_POST['postur'];
	$jasmani=$_POST['jasmani'];

	$this->M_Penilaian->insert_nilai_tim_penilai ($nisn,$kesehatan,$postur,$jasmani);
	redirect('Admin/datapendaftar_penilai','refresh');
	 }

	public function status_lulus(){
		$nisn=$_POST['nisn'];
		$this->M_keputusan_siswa->status_lulus($nisn);
		redirect('Admin/rankingpimpinan','refresh');
	}

	public function status_tidak_lulus(){
		$nisn=$_POST['nisn'];
		$this->M_keputusan_siswa->status_tidak_lulus($nisn);
		redirect('Admin/rankingpimpinan','refresh');
	}

	public function lihatuser(){
		$this->data['lihatuser']=$this->M_user->lihatuser();
		$this->data['title']		= 'Paskibraka Provinsi Sumatera Selatan';
		$this->data['content']	= 'datauser';
		$this->template($this->data);
	}

	public function inputuser(){
		$this->load->view('inputuser');
	}

	public function insert_user_baru(){
		$nisn=$_POST['nisn'];
		$namalengkap=$_POST['namalengkap'];
		$nama=$_POST['nama'];
		$password=$_POST['password'];
		$status=$_POST['status'];
		$this->M_user->input_user($nisn,$namalengkap,$nama,$password,$status);
		redirect('Admin/lihatuser','refresh');
	}

	public function home_admin_sistem(){
		$this->data['content']			= 'home_admin_sistem';
		$this->data['title']				= 'Paskibraka Provinsi Sumatera Selatan';
		$this->template($this->data);
	}

	public function hapusdatauser(){
		$nisn=$_POST['nisn'];
		$this->M_user->hapusdatauser($nisn);
		redirect('Admin/lihatuser','refresh');
	}

	public function update_user(){

		$x['nisn']=$_POST['nisn'];
		$x['data_user'] = $this->M_user->lihatuserspes($_POST['nisn']);

		$this->load->view('update_user',$x);
	}

	public function insert_user(){
		//memasukkan data ke database
		//$nisn,$wawancara,$tertulis,$kesehatan,$postur,$jasmani
		$nisn=$_POST['nisn'];
		$namalengkap=$_POST['namalengkap'];
		$nama=$_POST['nama'];
		$password=$_POST['password'];
		$status=$_POST['status'];

		$this->M_user->update_user ($nisn,$namalengkap,$nama,$password,$status);
		redirect('Admin/lihatuser','refresh');
	}

}
