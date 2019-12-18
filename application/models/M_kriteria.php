<?php
	class M_kriteria extends CI_Model{
		function get_all_kriteria(){
			$sql = "SELECT * from kriteria";
			$result = $this->db->query($sql)->result_array();
			return $result;
		}

		function update_bobot ($id_bobot,$nama,$bobot){

		$this->db->where('id_bobot',$id_bobot);
		$count = $this->db->get('kriteria')->num_rows(
		);
		if($count==0){
			$sql = "INSERT INTO kriteria (id_bobot,nama,bobot) VALUES ('$id_bobot','$nama','$bobot')";
			$this->db->query($sql);
		}else{
			$sql = "UPDATE kriteria SET nama='$nama' where id_bobot='$id_bobot'";
			$this->db->query($sql);

			$sql = "UPDATE kriteria SET bobot='$bobot' where id_bobot='$id_bobot'";
			$this->db->query($sql);

		}

		}
	}
?>