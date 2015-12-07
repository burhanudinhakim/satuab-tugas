<?php
	require_once 'adodb/adodb.inc.php';
	class Penduduk{
		function __construct()
		{
			$this->db = NewADOConnection('mysqli');
			$this->db->Connect('localhost','satuab','satuab','satuab');
		}

		function get_penduduk()
		{
			$penduduk  = $this->db->Execute("SELECT * FROM penduduk");
			return json_encode($penduduk->GetAssoc());
		}

		function get_penduduk_by_gender_male()
		{
			$penduduk  = $this->db->Execute("SELECT * FROM penduduk where jenis_kelamin='Laki-laki'");
			return json_encode($penduduk->GetAssoc());
		}

		function get_penduduk_by_nik($nik){
			$penduduk  = $this->db->Execute("SELECT * FROM penduduk WHERE nik='$nik'");
			return json_encode($penduduk->GetAssoc());
		}

		function hapus_penduduk($nik)
		{
			$this->db->Execute("delete from penduduk where NIK='$nik'");
		}

		function tambah_penduduk($NIK, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $pendidikan, $no_kk){
			$sql = "insert into penduduk(NIK,nama,jenis_kelamin, tempat_lahir, tanggal_lahir, agama, pendidikan, no_kk) values('$NIK','$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$agama','$pendidikan','$no_kk')";
			
			$insert = $this->db->Execute($sql);
			if($insert==true){
				$sukses = true;
				return $sukses;
			}else{
				$sukses = false;
				return $sukses;
			}
		}
		function ubah_penduduk($NIKAWAL, $NIK, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $pendidikan, $no_kk){
			$sql = "update penduduk set NIK='$NIK', nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',agama='$agama',pendidikan='$pendidikan',no_kk='$no_kk' where NIK='$NIKAWAL'";
			$insert = $this->db->Execute($sql);
			if($insert==true){
				$sukses = true;
				return $sukses;
			}else{
				$sukses = false;
				return $sukses;
			}
		}
	}
?>