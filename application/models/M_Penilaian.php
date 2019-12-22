<?php
	
	class M_penilaian extends CI_Model
	{
	function insert_nilai_admin ($nisn,$wawancara,$tertulis){

		$this->db->where('nisn',$nisn);
		$count = $this->db->get('nilai')->num_rows(
		);
		if($count==0){
			$sql = "INSERT INTO nilai (NISN,Tertulis,Wawancara,Kesehatan,Jasmani,Postur) VALUES ('$nisn','$tertulis','$wawancara','0','0','0')";
			$this->db->query($sql);
		}else{
			$sql = "UPDATE nilai SET Wawancara='$wawancara' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE nilai SET Tertulis='$tertulis' where NISN='$nisn'";
			$this->db->query($sql);

		}

		}

	function insert_nilai_tim_penilai ($nisn,$kesehatan,$postur,$jasmani){

		$this->db->where('nisn',$nisn);
		$count = $this->db->get('nilai')->num_rows(
		);
		if($count==0){
			$sql = "INSERT INTO nilai (NISN,Tertulis,Wawancara,Kesehatan,Jasmani,Postur) VALUES ('$nisn','0','0','$kesehatan','$postur','$jasmani')";
			$this->db->query($sql);
		}else{
			$sql = "UPDATE nilai SET Kesehatan='$kesehatan' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE nilai SET Postur='$postur' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE nilai SET Jasmani='$jasmani' where NISN='$nisn'";
			$this->db->query($sql);

		}

		}

	function get_all_penilaian(){
		$sql = "SELECT * from nilai";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}
	
	function get_all_penilaian_perempuan(){
		$sql = "SELECT nilai.nisn,Tertulis,Wawancara,Kesehatan,Jasmani,Postur FROM nilai,siswa where nilai.nisn=siswa.nisn and siswa.JK='Perempuan' ";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	function get_all_penilaian_laki_laki(){
		$sql = "SELECT nilai.nisn,Tertulis,Wawancara,Kesehatan,Jasmani,Postur FROM nilai,siswa where nilai.nisn=siswa.nisn and siswa.JK='Laki-laki' ";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	}



?>