<?php
	
	class M_siswa extends CI_Model
	{
	function insert_siswa ($nisn,$email,$hp,$kelas,$sekolah,$daerah,$jk,$tb,$bb,$delegasi,$aktif_sekolah,$izin_ortu,$surat_kesehatan,$biodata,$foto){

		$this->db->where('nisn',$nisn);
		$count = $this->db->get('siswa')->num_rows(
		);
		if($count==0){
			$sql = "INSERT INTO siswa (NISN,email,HP,Kelas,Sekolah,Daerah,JK,TB,BB,Delegasi,Aktif_Sekolah,Izin_Ortu,Surat_Kesehatan,Biodata,Foto) VALUES ('$nisn','$email',$hp','$kelas','$sekolah','$daerah','$jk','$tb','$bb','$delegasi','$aktif_sekolah','$izin_ortu','$surat_kesehatan','$biodata','$foto')";
			$this->db->query($sql);
		}else{
			$sql = "UPDATE siswa SET email='$email' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET HP='$hp' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET Kelas='$kelas' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET Sekolah='$sekolah' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET Daerah='$daerah' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET JK='$jk' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET TB='$tb' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET BB='$bb' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET Delegasi='$delegasi' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET Aktif_Sekolah='$aktif_sekolah' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET Izin_Ortu='$izin_ortu' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET Surat_Kesehatan='$surat_kesehatan' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET Biodata='$biodata' where NISN='$nisn'";
			$this->db->query($sql);

			$sql = "UPDATE siswa SET Foto='$foto' where NISN='$nisn'";
			$this->db->query($sql);
		}

		
		}

		function get_siswa($nisn){
			$sql = "SELECT * FROM siswa WHERE nisn ='$nisn'";
			$result = $this->db->query($sql)->result_array();
			return $result;
		}

		function get_all_siswa(){
			$sql = "SELECT user.Nama,siswa.NISN,siswa.email,siswa.Sekolah,siswa.Daerah,siswa.JK  FROM siswa,user where siswa.NISN=user.NISN";
			$result = $this->db->query($sql)->result_array();
			return $result;
		}
	}

?>