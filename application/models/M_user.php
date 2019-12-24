<?php
					class M_user extends CI_Model
					{


								 function registeruser($nisn,$namalengkap,$nama,$password){

								 	$sql = "INSERT INTO user (NISN,Nama_Lengkap,Nama,Password) VALUES ('$nisn','$namalengkap','$nama','$password') ";
									
								 	$result = $this->db->query($sql);
								 	return $result;
								 }


								 function check_user($nama,$password){
								 	$sql = "SELECT NISN,Nama_Lengkap,Nama,status FROM user WHERE Nama='$nama' and Password='$password' ";
								 	$result = $this->db->query($sql)->result_array();
								 	return $result;
								}
							
								

					function hapusdata($nisn){
						$sql = "delete from siswa where NISN='$nisn'";
						$this->db->query($sql);
					}

					function lihatuser(){
						$sql = "SELECT  * FROM user";
						$result = $this->db->query($sql)->result_array();
						return $result;
					}

					function lihatuserspes($nisn){
						$sql = "SELECT  * FROM user where NISN='$nisn'";
						$result = $this->db->query($sql)->result_array();
						return $result;
					}


					function input_user ($nisn,$namalengkap,$nama,$password,$status){
						$sql = "INSERT INTO user (NISN,Nama_Lengkap,Nama,Password,status) VALUES ('$nisn','$namalengkap','$nama','$password','$status')";
						$result = $this->db->query($sql);
						return $result;
					}

					function hapusdatauser($nisn){
						$sql = "delete from user where NISN='$nisn'";
						$this->db->query($sql);
					}

					function update_user ($nisn,$namalengkap,$nama,$password,$status){

						$this->db->where('NISN',$nisn);
						$count = $this->db->get('user')->num_rows();
						if($count==0){
							$sql = "INSERT INTO user (NISN,Nama_Lengkap,Nama,Password,status) VALUES ('$nisn','$namalengkap','$nama','$password','$status')";
							$this->db->query($sql);
						}else{
			
						$sql = "UPDATE user SET Nama_Lengkap='$namalengkap' where NISN='$nisn'";
						$this->db->query($sql);

						$sql = "UPDATE user SET Nama='$nama' where NISN='$nisn'";
						$this->db->query($sql);

						$sql = "UPDATE user SET Password='$password' where NISN='$nisn'";
						$this->db->query($sql);

						$sql = "UPDATE user SET status='$status' where NISN='$nisn'";
						$this->db->query($sql);

						}
					}
	}
?>