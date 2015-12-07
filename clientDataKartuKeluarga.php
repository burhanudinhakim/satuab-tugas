<?php
	error_reporting(E_ALL);
	ini_set('display_error',1);

	require_once('nusoap/lib/nusoap.php');
	$url = 'http://satuab.burhanudin.me/server.php?wsdl';
	$client = new nusoap_client($url, 'WSDL');
	$aksi =  isset($_GET["aksi"]) ? $_GET["aksi"] : '' ;
	$noKKDetail = isset($_GET["noKKDetail"]) ? $_GET["noKKDetail"] : '' ;

	if(isset($_GET["aksi"]) && $_GET["aksi"] == "tambahAnggotaKartuKeluarga"){
		$no_kk = $_POST["no_kk"];
		$NIK = $_POST["NIK"];
		$hasil = $client->call('tambahAnggotaKartuKeluarga',array('no_kk'=>$no_kk,'NIK'=>$NIK));
		return $hasil;
	}
	if(isset($_GET["aksi"]) && $_GET["aksi"] == "tambahDataKartuKeluarga"){
		$no_kk = $_POST['no_kk'];
		$kepala_keluarga = $_POST['namaKepalaKeluarga'];
		$alamat = $_POST['alamat'];
		$rt = $_POST['rt'];
		$rw = $_POST['rw'];
		$desa = $_POST['desa'];
		$kecamatan = $_POST['kecamatan'];
		$kabupaten = $_POST['kabupaten'];
		$provinsi = $_POST['provinsi'];
		$kode_pos = $_POST['kodepos'];
		$hasil = $client->call('tambah_kartuKeluarga', array('no_kk'=>$no_kk,'kepala_keluarga'=>$kepala_keluarga,'alamat'=>$alamat,'rt'=>$rt,'rw'=>$rw,
															'desa'=>$desa,'kecamatan'=>$kecamatan,'kabupaten'=>$kabupaten,'provinsi'=>$provinsi,'kode_pos'=>$kode_pos
														));
		return $hasil;
	}

	if(isset($_GET["aksi"]) && $_GET["aksi"] == "ubahDataPenduduk"){
		$no_kkAwal = $_POST['noKKAwal'];
		$no_kk = $_POST['no_kk'];
		$kepala_keluarga = $_POST['kepala_keluarga'];
		$alamat = $_POST['alamat'];
		$rt = $_POST['RT'];
		$rw = $_POST['RW'];
		$desa = $_POST['desa'];
		$kecamatan = $_POST['kecamatan'];
		$kabupaten = $_POST['kabupaten'];
		$provinsi = $_POST['provinsi'];
		$kode_pos = $_POST['kode_pos'];
		$hasil = $client->call('ubah_kartuKeluarga', array('no_kkAwal'=>$no_kkAwal,'no_kk'=>$no_kk,'kepala_keluarga'=>$kepala_keluarga,'alamat'=>$alamat,'rt'=>$rt,'rw'=>$rw,
															'desa'=>$desa,'kecamatan'=>$kecamatan,'kabupaten'=>$kabupaten,'provinsi'=>$provinsi,'kode_pos'=>$kode_pos
														));
		return $hasil;
	}

	$noKKDetail = isset($_GET["noKKDetail"]) ? $_GET["noKKDetail"] : '';
	$result = $client->call('ambilDataKKByNoKK',array('no_kk'=>$noKKDetail));
	$detail = json_decode($result);

	$noKKUbahAnggota = isset($_GET["noKKUbahAnggota"]) ? $_GET["noKKUbahAnggota"] : '';
	$result = $client->call('ambilAnggotaKeluarga',array('no_kk'=>$noKKUbahAnggota));
	$detailAnggotaKeluarga = json_decode($result);

	$noKKHapusAnggota = isset($_GET["noKKHapusAnggota"]) ? $_GET["noKKHapusAnggota"] : '';
	$namaHapusAnggota = isset($_GET["namaHapusAnggota"]) ? $_GET["namaHapusAnggota"] : '';
	$hapus = $client->call('hapusAnggotaKeluarga',array('no_kk'=>$noKKHapusAnggota,'nama'=>$namaHapusAnggota));

	$noKKUbah = isset($_GET["noKKUbah"]) ? $_GET["noKKUbah"] : '';
	$result = $client->call('ambilDataKKByNoKK',array('no_kk'=>$noKKUbah));
	$detailUbah = json_decode($result);

	$result = $client->call('ambilNonAnggotaKeluarga');
	$nonAnggotaKeluarga = json_decode($result);

	$result = $client->call('ambilAnggotaKeluarga',array('no_kk'=>$noKKDetail));
	$anggotaKeluarga = json_decode($result);

	$noKKHapus = isset($_GET["noKKHapus"]) ? $_GET["noKKHapus"] : '' ;
	$hapus = $client->call('hapus_kartuKeluarga',array('no_kk'=>$noKKHapus));

	$result = $client->call('get_penduduk_by_gender_male');	
	$dataPenduduk = json_decode($result);

	$result = $client->call('get_kartuKeluarga');	
	$data = json_decode($result);
?>