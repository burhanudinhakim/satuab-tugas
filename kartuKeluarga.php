<?php
	require_once 'adodb/adodb.inc.php';
	class KartuKeluarga{
		function __construct()
		{
			$this->db = NewADOConnection('mysqli');
			$this->db->Connect('localhost','satuab','satuab','satuab');
		}

		function get_kartuKeluarga()
		{
			$KartuKeluarga  = $this->db->Execute("SELECT * FROM kartukeluarga");
			return json_encode($KartuKeluarga->GetAssoc());
		}

		function tambahAnggotaKartuKeluarga($no_kk,$NIK){
			$kartukeluarga = $this->db->Execute("update penduduk set no_kk='$no_kk' where NIK='$NIK'");
			if($kartukeluarga==true){
				$sukses = true;
				return $sukses;
			}else{
				$sukses = false;
				return $sukses;
			}
		}

		function ambilDataKKByNoKK($no_kk)
		{
			$KartuKeluarga  = $this->db->Execute("SELECT * FROM kartukeluarga WHERE no_kk='$no_kk'");
			return json_encode($KartuKeluarga->GetAssoc());
		}

		function ambilAnggotaKeluarga($no_kk){
			$KartuKeluarga  = $this->db->Execute("SELECT * FROM penduduk WHERE no_kk='$no_kk'");
			return json_encode($KartuKeluarga->GetAssoc());
		}

		function hapusAnggotaKeluarga($no_kk,$nama){
			$this->db->Execute("update penduduk set no_kk='0' where no_kk='$no_kk' and nama='$nama'");
		}

		function ambilNonAnggotaKeluarga(){
			$KartuKeluarga  = $this->db->Execute("SELECT * FROM penduduk WHERE no_kk='0'");
			return json_encode($KartuKeluarga->GetAssoc());
		}

		function hapus_kartuKeluarga($no_kk){
			$this->db->Execute("delete from kartukeluarga where no_kk='$no_kk'");
		}

		function ubah_kartuKeluarga($no_kkAwal,$no_kk,$kepala_keluarga,$alamat,$rt,$rw,$desa,$kecamatan,$kabupaten,$provinsi,$kode_pos){
			$sql = "update kartukeluarga set no_kk='$no_kk', kepala_keluarga='$kepala_keluarga', alamat='$alamat', RT='$rt', RW='$rw', desa='$desa',kecamatan='$kecamatan',kabupaten='$kabupaten',provinsi='$provinsi',kode_pos='$kode_pos' where no_kk='$no_kkAwal'";
			$insert = $this->db->Execute($sql);
			if($insert==true){
				$sukses = true;
				return $sukses;
			}else{
				$sukses = false;
				return $sukses;
			}
		}

		function tambah_kartuKeluarga($no_kk,$kepala_keluarga,$alamat,$rt,$rw,$desa,$kecamatan,$kabupaten,$provinsi,$kode_pos){
			$sql = "insert into kartukeluarga values('$no_kk','$kepala_keluarga','$alamat','$rt','$rw','$desa','$kecamatan','$kabupaten','$provinsi','$kode_pos')";
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