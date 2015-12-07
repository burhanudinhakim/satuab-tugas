<?php
  error_reporting(E_ALL); 
  ini_set('display_error',1);

  require_once 'nusoap/lib/nusoap.php';
  require_once 'adodb/adodb.inc.php';
  require_once 'penduduk.php';
  require_once 'kartuKeluarga.php';
  $server = new nusoap_server();
  $server->configureWSDL('Service Kependudukan','urn:kependudukan');
  $server->wsdl->schemaTargetNamespace = 'urn:kependudukan';

  $server->register('get_penduduk',
    array(
      'nik' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#get_penduduk',
      'rpc',
      'encoded',
      'mengambil semua data penduduk'
  );

  $server->register('get_penduduk_by_gender_male',
    array(
      'nik' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#get_penduduk_by_gender_male',
      'rpc',
      'encoded',
      'mengambil semua data penduduk berdasarkan gender laki-laki'
  );

  $server->register('get_penduduk_by_nik',
    array(
      'nik' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#get_penduduk_by_nik',
      'rpc',
      'encoded',
      'mengambil data penduduk berdasarkan nik'
  );

  $server->register('hapus_penduduk',
    array(
      'nik' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#hapus_penduduk',
      'rpc',
      'encoded',
      'menghapus data penduduk'
  );

  $server->register('tambah_penduduk',
    array('NIK' => 'xsd:string',
          'nama' => 'xsd:string',
          'jenis_kelamin' => 'xsd:string',
          'nama' => 'xsd:string',
          'tempat_lahir' => 'xsd:string',
          'tanggal_lahir' => 'xsd:string',
          'agama' => 'xsd:string',
          'pendidikan' => 'xsd:string',
          'no_kk' => 'xsd:string'
      ),
    array('return' => 'xsd:string'),
    'urn:kependudukan',
    'urn:kependudukan#tambah_penduduk',
    'rpc',
    'encoded',
    'menambah data penduduk'
  );

  $server->register('ubah_penduduk',
    array(
          'NIKAWAL' => 'xsd:string',
          'NIK' => 'xsd:string',
          'nama' => 'xsd:string',
          'jenis_kelamin' => 'xsd:string',
          'nama' => 'xsd:string',
          'tempat_lahir' => 'xsd:string',
          'tanggal_lahir' => 'xsd:string',
          'agama' => 'xsd:string',
          'pendidikan' => 'xsd:string',
          'no_kk' => 'xsd:string'
      ),
    array('return' => 'xsd:string'),
    'urn:kependudukan',
    'urn:kependudukan#ubah_penduduk',
    'rpc',
    'encoded',
    'merubah data penduduk'
  );

  $server->register('get_kartuKeluarga',
    array(
      'nik' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#get_kartuKeluarga',
      'rpc',
      'encoded',
      'mengambil semua data kartu keluarga'
  );

  $server->register('hapus_kartuKeluarga',
    array(
      'no_kk' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#hapus_kartuKeluarga',
      'rpc',
      'encoded',
      'menghapus data kartu keluarga'
  );

  $server->register('tambah_kartuKeluarga',
    array('no_kk' => 'xsd:string',
          'kepala_keluarga' => 'xsd:string',
          'alamat' => 'xsd:string',
          'rt' => 'xsd:string',
          'rw' => 'xsd:string',
          'desa' => 'xsd:string',
          'kecamatan' => 'xsd:string',
          'kabupaten' => 'xsd:string',
          'provinsi' => 'xsd:string',
          'kode_pos' => 'xsd:string'
      ),
    array('return' => 'xsd:string'),
    'urn:kependudukan',
    'urn:kependudukan#tambah_kartuKeluarga',
    'rpc',
    'encoded',
    'menambah data kartu keluarga'
  );

  $server->register('ambilDataKKByNoKK',
    array(
      'no_kk' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#ambilDataKKByNoKK',
      'rpc',
      'encoded',
      'mengambil data kartu keluarga berdasarkan no kk'
  );

  $server->register('ambilAnggotaKeluarga',
    array(
      'no_kk' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#ambilAnggotaKeluarga',
      'rpc',
      'encoded',
      'mengambil data anggota keluarga berdasarkan no kk'
  );

  $server->register('ambilNonAnggotaKeluarga',
    array(
      'no_kk' => 'xsd:string'),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#ambilNonAnggotaKeluarga',
      'rpc',
      'encoded',
      'mengambil data yang bukan anggota keluarga'
  );

  $server->register('tambahAnggotaKartuKeluarga',
    array(
      'no_kk' => 'xsd:string',
      'NIK' => 'xsd:string'
      ),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#tambahAnggotaKartuKeluarga',
      'rpc',
      'encoded',
      'menambah data anggota keluarga'
  );

  $server->register('ubah_kartuKeluarga',
    array('no_kkAwal' => 'xsd:string',
          'no_kk' => 'xsd:string',
          'kepala_keluarga' => 'xsd:string',
          'alamat' => 'xsd:string',
          'rt' => 'xsd:string',
          'rw' => 'xsd:string',
          'desa' => 'xsd:string',
          'kecamatan' => 'xsd:string',
          'kabupaten' => 'xsd:string',
          'provinsi' => 'xsd:string',
          'kode_pos' => 'xsd:string'
      ),
    array('return' => 'xsd:string'),
    'urn:kependudukan',
    'urn:kependudukan#ubah_kartuKeluarga',
    'rpc',
    'encoded',
    'mengubah data kartu keluarga'
  );

  $server->register('hapusAnggotaKeluarga',
    array(
      'no_kk' => 'xsd:string',
      'nama' => 'xsd:string'
      ),
      array(
        'return' => 'xsd:string'
      ),
      'urn:kependudukan',
      'urn:kependudukan#hapusAnggotaKeluarga',
      'rpc',
      'encoded',
      'menghapus anggota keluarga'
  );

  function hapusAnggotaKeluarga($no_kk,$nama){
    $kartukeluarga = new kartukeluarga();
    return $kartukeluarga->hapusAnggotaKeluarga($no_kk,$nama);
  }

  function ubah_kartuKeluarga($no_kkAwal,$no_kk,$kepala_keluarga,$alamat,$rt,$rw,$desa,$kecamatan,$kabupaten,$provinsi,$kode_pos){
    $kartukeluarga = new KartuKeluarga();
    return $kartukeluarga->ubah_kartuKeluarga($no_kkAwal,$no_kk,$kepala_keluarga,$alamat,$rt,$rw,$desa,$kecamatan,$kabupaten,$provinsi,$kode_pos);
  }
  function tambahAnggotaKartuKeluarga($no_kk,$NIK){
    $kartukeluarga = new kartukeluarga();
    return $kartukeluarga->tambahAnggotaKartuKeluarga($no_kk,$NIK);
  }
  function ambilNonAnggotaKeluarga(){
    $kartukeluarga = new kartukeluarga();
    return $kartukeluarga->ambilNonAnggotaKeluarga();
  }
  function ambilAnggotaKeluarga($no_kk){
    $kartukeluarga = new kartukeluarga();
    return $kartukeluarga->ambilAnggotaKeluarga($no_kk);
  }

  function ambilDataKKByNoKK($no_kk){
    $kartukeluarga = new KartuKeluarga();
    return $kartukeluarga->ambilDataKKByNoKK($no_kk);
  }

  function get_kartuKeluarga() {
    $kartukeluarga = new KartuKeluarga();
    return $kartukeluarga->get_kartuKeluarga();
  }
  function hapus_kartuKeluarga($no_kk){
    $kartukeluarga = new KartuKeluarga();
    return $kartukeluarga->hapus_kartuKeluarga($no_kk);
  }
  function tambah_kartuKeluarga($no_kk,$kepala_keluarga,$alamat,$rt,$rw,$desa,$kecamatan,$kabupaten,$provinsi,$kode_pos){
    $kartukeluarga = new KartuKeluarga();
    return $kartukeluarga->tambah_kartuKeluarga($no_kk,$kepala_keluarga,$alamat,$rt,$rw,$desa,$kecamatan,$kabupaten,$provinsi,$kode_pos);
  }
  function tambah_penduduk($NIK, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $pendidikan, $no_kk){
    $penduduk = new Penduduk();
    return $penduduk->tambah_penduduk($NIK, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $pendidikan, $no_kk);
  }

  function get_penduduk_by_gender_male(){
    $penduduk = new Penduduk();
    return $penduduk->get_penduduk_by_gender_male();
  }

  function ubah_penduduk($NIKAWAL, $NIK, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $pendidikan, $no_kk){
    $penduduk = new Penduduk();
    return $penduduk->ubah_penduduk($NIKAWAL, $NIK, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $pendidikan, $no_kk);
  }

  function get_penduduk_by_nik($nik) {
    $penduduk = new Penduduk();
    return $penduduk->get_penduduk_by_nik($nik);
  }

  function get_penduduk() {
    $penduduk = new Penduduk();
    return $penduduk->get_penduduk();
  }

  function hapus_penduduk($nik) {
    $penduduk = new Penduduk();
    return $penduduk->hapus_penduduk($nik);
  }

  $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : ''; $server->service($HTTP_RAW_POST_DATA);
?>