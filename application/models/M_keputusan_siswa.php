<?php
	class M_Keputusan_siswa extends CI_Model{
		function insert_keputusan ($nisn,$nilai_akhir,$status_kelulusan){
		

		$this->db->where('NISN',$nisn);
		$count = $this->db->get('keputusan')->num_rows(
		);
		if($count==0){
			$sql = "INSERT INTO keputusan (NISN,Nilai_Akhir,status_kelulusan) VALUES ('$nisn','$nilai_akhir','$status_kelulusan')";
			$this->db->query($sql);
		}else{
			$sql = "UPDATE keputusan SET Nilai_Akhir='$nilai_akhir' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE keputusan SET status_kelulusan='$status_kelulusan' where NISN='$nisn'";
			$this->db->query($sql);
			
		}
	}

	function insert_nilai_terbobot ($NISN,$ID_Kriteria,$nilai_terbobot){
		

		$this->db->where('NISN',$NISN);
		$this->db->where('ID_Kriteria',$ID_Kriteria);
		$count = $this->db->get('nilai_terbobot')->num_rows(
		);
		if($count==0){
			$sql = "INSERT INTO nilai_terbobot (NISN,ID_Kriteria,nilai_terbobot) VALUES ('$NISN','$ID_Kriteria','$nilai_terbobot')";
			$this->db->query($sql);
		}else{
			
			$sql = "UPDATE nilai_terbobot SET nilai_terbobot='$nilai_terbobot' where NISN='$NISN' and ID_Kriteria='$ID_Kriteria'";
			$this->db->query($sql);
			
		}

	}

	function lihat_ranking_siswa($nisn){
		$sql = "SELECT user.Nama,siswa.NISN,siswa.Sekolah,siswa.Daerah,siswa.JK,keputusan.status_kelulusan  FROM siswa,user,keputusan where siswa.NISN=keputusan.NISN and user.NISN=keputusan.NISN and user.nisn='$nisn' ORDER BY keputusan.Nilai_Akhir DESC";
			$result = $this->db->query($sql)->result_array();
			return $result;
	}


		function status_lulus ($nisn){
		
			$sql = "UPDATE keputusan SET status_kelulusan='Lulus' where NISN='$nisn'";
			$this->db->query($sql);
	}

	function status_tidak_lulus ($nisn){
		
			$sql = "UPDATE keputusan SET status_kelulusan='Tidak Lulus' where NISN='$nisn'";
			$this->db->query($sql);
	}

		function lihat_ranking(){
			$sql = "SELECT * FROM keputusan INNER JOIN nilai ON keputusan.NISN = nilai.NISN INNER JOIN user ON user.NISN = keputusan.NISN INNER JOIN siswa ON siswa.NISN = keputusan.NISN";
			// $sql = "SELECT user.Nama,siswa.NISN,siswa.Sekolah,siswa.Daerah,siswa.JK,keputusan.Nilai_Akhir,keputusan.status_kelulusan
			// -- FROM siswa,user,keputusan
			// FROM siswa
			// INNER JOIN keputusan ON siswa.NISN = keputusan.NISN
			// -- INNER JOIN user ON user.NISN = keputusan.NISN
			// INNER JOIN nilai ON nilai.NISN = keputusan.NISN
			// where siswa.NISN=keputusan.NISN  and nilai.NISN = keputusan.NISN
			// ORDER BY keputusan.Nilai_Akhir DESC";
			$result = $this->db->query($sql)->result_array();
			return $result;
		}
	}


?>