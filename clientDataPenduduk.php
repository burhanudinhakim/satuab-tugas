<?php
	error_reporting(E_ALL);
	ini_set('display_error',1);

	require_once('nusoap/lib/nusoap.php');
	$url = 'http://satuab.burhanudin.me/server.php?wsdl';
	$client = new nusoap_client($url, 'WSDL');
	$nikHapus =  isset($_GET["nikHapus"]) ? $_GET["nikHapus"] : '' ;
	$aksi =  isset($_GET["aksi"]) ? $_GET["aksi"] : '' ;
	$nikUbah = isset($_GET["nikUbah"]) ? $_GET["nikUbah"] : '' ;
	if(isset($_GET["aksi"]) && $_GET["aksi"] == "tambahDataPenduduk"){
		$NIK = $_POST['nik'];
		$nama = $_POST['nama'];
		$jenis_kelamin = $_POST['jk'];
		$tempat_lahir = $_POST['tmpt_lahir'];
 		$tanggal_lahir = $_POST['tgl_lahir'];
		$agama = $_POST['agama'];
		$pendidikan = $_POST['pendidikan'];
		$no_kk = "";
		$hasil = $client->call('tambah_penduduk', array('NIK'=>$NIK,'nama'=>$nama,'jenis_kelamin'=>$jenis_kelamin,'tempat_lahir'=>$tempat_lahir,
														'tanggal_lahir'=>$tanggal_lahir,'agama'=>$agama,'pendidikan'=>$pendidikan,'no_kk'=>$no_kk
														));
		return $hasil;
	}
	if(isset($_GET["aksi"]) && $_GET["aksi"] == "ubahDataPenduduk"){
		$NIKAWAL = $_POST['nikAwal'];
		$NIK = $_POST['nik'];
		$nama = $_POST['nama'];
		$jenis_kelamin = $_POST['jk'];
		$tempat_lahir = $_POST['tmpt_lahir'];
		$tanggal_lahir = $_POST['tgl_lahir'];
		$agama = $_POST['agama'];
		$pendidikan = $_POST['pendidikan'];
		$no_kk = "";
		$hasil = $client->call('ubah_penduduk', array('NIKAWAL'=>$NIKAWAL,'NIK'=>$NIK,'nama'=>$nama,'jenis_kelamin'=>$jenis_kelamin,'tempat_lahir'=>$tempat_lahir,
														'tanggal_lahir'=>$tanggal_lahir,'agama'=>$agama,'pendidikan'=>$pendidikan,'no_kk'=>$no_kk
														));
		return $hasil;
	}


	$ambilDataByNIK = $client->call('get_penduduk_by_nik',array('nik'=>$nikUbah));
	$dataByNIK = json_decode($ambilDataByNIK);

	$hapus = $client->call('hapus_penduduk',array('nik'=>$nikHapus));
	
	$result = $client->call('get_penduduk');	
	$data = json_decode($result);
	
	
	//echo 'Request';
	//echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
	//echo 'Response';
	//echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
	//echo 'Debug';
	//echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>