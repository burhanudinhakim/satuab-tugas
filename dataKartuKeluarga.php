<?php require_once 'clientDataKartuKeluarga.php' ?>
<!DOCTYPE html>

<html>
	<head>
   <meta charset="utf-8">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-hal-login.css" rel="stylesheet"> 
  </head>
	<body>
		<?php if($aksi=="" || $aksi=="dataKartuKeluarga"){?>
			<div class="container">
      <div class="panel panel-default">
      <div style="text-align:center" class="panel-heading"><b>Data Kartu Keluarga</b></div>
      <div class="panel-body">
      <div class="table-responsive">
          <table  class="table table-striped table-bordered table-condensed" id="example" class="tablesorter">
            <thead> 
              <tr class="info">
    					<th>No Kartu Keluarga</th>
    					<th>Kepala Keluarga</th>
    					<th>Alamat</th> 
    					<th>Aksi</th>
           			</tr>
           			<?php foreach ($data as $key => $value) { ?>
    				<tr>
    					<td><?php echo $value->no_kk;?></td>
    					<td><?php echo $value->kepala_keluarga;?></td>
    					<td><?php echo $value->alamat;?></td>
              <td style="width:170px">
                <a href="?aksi=detailKK&noKKDetail=<?= $value->no_kk ?>" class="btn btn-success">Detail</a>
                <a href="?aksi=ubahData&noKKUbah=<?= $value->no_kk ?>" class="btn btn-success">Ubah</a>
                <a href="?noKKHapus=<?= $value->no_kk ?>" class="btn btn-danger">Hapus</a>
              </td>
    				</tr>
           			<?php } ?>
           </table>
           <center><a href="?aksi=tambahData" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Kartu Keluarga</a><center>
    		<?php } else if($aksi=="tambahData"){?>
    			<center><h2>Tambah Kartu Keluarga</h2></center>
                <form action="?aksi=tambahDataKartuKeluarga" method="POST">
                	<table>
                    	<tr>
                    		<td>No Kartu Keluarga</td>
                    		<td><input name="no_kk" type="number" placeholder="No Kartu Keluarga" autofocus required></td>
                    	</tr>
    	                <tr>
    	                	<td>Nama Kepala Keluarga</td>
    		                <td>
    							<select name="namaKepalaKeluarga">
    								<?php
    									foreach ($dataPenduduk as $key => $list) {
    								?>
    										<option value="<?php echo $list->nama;?>">
    											<?php echo $list->nama;?>
    										</option>
    								<?php
    									}
    								?>
    							</select>
    		                </td>
    	                </tr>
                    <tr>
                      <td>Alamat</td>
                      <td><textarea name="alamat" id="" cols="22" rows="5"></textarea></td>
                    </tr>
                    <tr>
                      <td>RT</td>
                      <td><input name="rt" type="text" placeholder="RT" required></td>
                    </tr>
                    <tr>
                      <td>RW</td>
                      <td><input name="rw" type="text" placeholder="RW" required></td>
                    </tr>
                    <tr>
                      <td>Desa</td>
                      <td><input name="desa" type="text" placeholder="Desa" required></td>
                    </tr>
                    <tr>
                      <td>Kecamatan</td>
                      <td><input name="kecamatan" type="text" placeholder="Kecamatan" required></td>
                    </tr>
    			         	<tr>
                      <td>Kabupaten</td>
                      <td><input name="kabupaten" type="text" placeholder="Kabupaten" required></td>
                    </tr>
                    <tr>
                      <td>Provinsi</td>
                      <td><input name="provinsi" type="text" placeholder="provinsi" required></td>
                    </tr>
                    <tr>
                      <td>Kode POS</td>
                      <td><input name="kodepos" type="text" placeholder="Kode POS" required></td>
                    </tr>
                    <tr>
                      <td><input type="submit" value="Tambah"></td>
                      <td><input type="reset" value="Ulangi"></td>
                    </tr>
                  </table>
                </form>
                <a href="dataKartuKeluarga.php">Kembali</a>
    		<?php } else if($aksi=="tambahDataKartuKeluarga"){
    			if($hasil==1){
                    echo "<script>alert('Tambah data berhasil !')</script>";
                    header("Refresh: 0; URL='dataKartuKeluarga.php'");
                }else{ 
                    echo "<script>alert('Tambah data gagal ! No KK sudah ada !')</script>";
                    echo "<script>history.go(-1);</script>"; 
                }
    		  } else if($aksi=="detailKK"){ ?>
              <center><h2>Detail Kartu Keluarga</h2></center>
              <table border="1" align="center" cellpadding="4" cellspacing="0">
            <?php foreach ($detail as $key => $value) {?>
                <tr>
                  <td>No Kartu Keluarga</td>
                  <td><?php echo $value->no_kk; ?></td>
                </tr>
                <tr>
                  <td>Nama Kepala Keluarga</td>
                  <td><?php echo $value->kepala_keluarga; ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><?php echo $value->alamat;?></td>
                </tr>
                <tr>
                  <td>RT</td>
                  <td><?php echo $value->RT;?></td>
                </tr>
                <tr>
                  <td>RW</td>
                  <td><?php echo $value->RW;?></td>
                </tr>
                <tr>
                  <td>Desa</td>
                  <td><?php echo $value->desa;?></td>
                </tr>
                <tr>
                  <td>Kecamatan</td>
                  <td><?php echo $value->kecamatan;?></td>
                </tr>
                <tr>
                  <td>Kabupaten</td>
                  <td><?php echo $value->kabupaten;?></td>
                </tr>
                <tr>
                  <td>Provinsi</td>
                  <td><?php echo $value->provinsi;?></td>
                </tr>
                <tr>
                  <td>Kode POS</td>
                  <td><?php echo $value->kode_pos;?></td>
                </tr>
                <tr>
                  <td>Anggota keluarga</td>
                  <td>
                    <?php foreach ($anggotaKeluarga as $key => $values) {
                      echo $values->nama."<br>";
                    }?>
                    <a href="?aksi=tambahAnggotaKeluarga&kepalaKeluarga=<?php echo $value->kepala_keluarga;?>&no_kk=<?php echo $value->no_kk;?>">Tambah Anggota Keluarga</a>  |  <a href="?aksi=ubahAnggotaKeluarga&noKKUbahAnggota=<?php echo $_GET['noKKDetail'];?>">Ubah</a>
                  </td> 
                </tr>
            <?php } ?>
              </table>
              <center><a href="dataKartuKeluarga.php">Kembali</a></center>
          <?php  }else if($aksi=="ubahAnggotaKeluarga"){ ?>
              <center><h2>Ubah Anggota Keluarga</h2></center>
              <table border="1" align="center" cellpadding="4" cellspacing="0">
                <tr>
                  <th>No</th>
                  <th>Nama Anggota Keluarga</th>
                  <th>Aksi</th>
                    </tr>
                    <?php $i=0; foreach ($detailAnggotaKeluarga as $key => $value) { $i++;?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $value->nama;?></td>
                  <td><a href="?aksi=detailKK&noKKDetail=<?php echo $value->no_kk ?>&noKKHapusAnggota=<?php echo $value->no_kk ?>&namaHapusAnggota=<?php echo $value->nama;?>">Hapus</a></td>
                </tr>
                    <?php } ?>
              </table>
              <?php
                if(isset($_GET["noKKUbahAnggota"])){
                  $noKKDetail = $_GET["noKKUbahAnggota"];
                }else{
                  $noKKDetail = $_GET["noKKHapusAnggota"];
                }
              ?>
              <center><a href="?aksi=detailKK&noKKDetail=<?php echo $noKKDetail;?>">Kembali</a></center>
            <?php }else if($aksi=="tambahAnggotaKeluarga"){?>
              <center><h2>Tambah Anggota Keluarga</h2></center>
              <form action="?aksi=tambahAnggotaKartuKeluarga" method="POST">
                <input type="hidden" value="<?php echo $_GET['no_kk'];?>" name="no_kk">
                <table border="1" align="center" cellpadding="4" cellspacing="0">
                  <tr>
                    <td>Nama kepala Keluarga</td>
                    <td>
                      <?php echo $_GET['kepalaKeluarga']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Anggota Keluarga Baru</td>
                    <td>
                      <?php if(count($nonAnggotaKeluarga)==null){
                        echo "Penduduk sudah memiliki kartu keluarga semua";
                      }else{ ?>
                      <select name="NIK" required>
                        <?php
                          foreach ($nonAnggotaKeluarga as $key => $list) {
                        ?>
                            <option value="<?php echo $list->NIK;?>">
                              <?php echo $list->nama;?>
                            </option>
                        <?php
                          }
                        ?>
                      </select>
                      <?php
                        }
                      ?>
                    </td>
                  </tr>
                </table>
                <center><input type="submit" value="Tambah"></center>
              </form>
              <center><a href="?aksi=detailKK&noKKDetail=<?php echo $_GET['no_kk']?>">Kembali</a></center>
          <?php
            }else if($aksi=="tambahAnggotaKartuKeluarga"){
              if($hasil==1){
                    echo "<script>alert('Tambah anggota keluarga berhasil !')</script>";
                    header("Refresh: 0; URL='dataKartuKeluarga.php'");
                }else{ 
                    echo "<script>alert('Tambah data gagal !')</script>";
                    echo "<script>history.go(-1);</script>"; 
                }
            }else if($aksi=="ubahData"){
              foreach ($detailUbah as $key => $value) { ?>
              <center><h2>Ubah data Penduduk</h2></center>
              <form action="?aksi=ubahDataPenduduk" method="POST">
                <input name="noKKAwal" type="hidden" placeholder="No KK" value="<?php echo $value->no_kk ;?>" required>
                <table>
                  <tr>
                    <td>No Kartu Keluarga</td>
                    <td><input name="no_kk" type="number" placeholder="No KK" value="<?php echo $value->no_kk ;?>" autofocus required></td>
                  </tr>
                  <tr>
                    <td>Kepala Keluarga</td>
                    <td><input name="kepala_keluarga" type="text" placeholder="Kepala Keluarga" value="<?php echo $value->kepala_keluarga ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>
                      <textarea name="alamat" id="" cols="22" rows="5"><?php echo $value->alamat ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>RT</td>
                    <td><input name="RT" type="text" placeholder="RT" value="<?php echo $value->RT ;?>" required></td>
                  </tr>
                  <tr>
                    <td>RW</td>
                    <td><input name="RW" type="text" placeholder="RW" value="<?php echo $value->RW ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Desa</td>
                    <td><input name="desa" type="text" placeholder="Desa" value="<?php echo $value->desa ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td><input name="kecamatan" type="text" placeholder="Kecamatan" value="<?php echo $value->kecamatan ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Kabupaten</td>
                    <td><input name="kabupaten" type="text" placeholder="Kabupaten" value="<?php echo $value->kabupaten ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Provinsi</td>
                    <td><input name="provinsi" type="text" placeholder="Provinsi" value="<?php echo $value->provinsi ;?>" required></td>
                  </tr>
                  <tr>
                    <td>Kode Pos</td>
                    <td><input name="kode_pos" type="text" placeholder="Kode POS" value="<?php echo $value->kode_pos ;?>" required></td>
                  </tr>
                  <tr>
                    <td><input type="submit" value="Ubah"></td>
                    <td><input type="reset" value="Ulangi"></td>
                  </tr>
                </table>
              </form>
              <center><a href="dataKartuKeluarga.php">Kembali</a></center>
          <?php
              }
            }else if($aksi=="ubahDataPenduduk"){
              if($hasil==1){
                    echo "<script>alert('Ubah data berhasil !')</script>";
                    header("Refresh: 0; URL='dataKartuKeluarga.php'");
                }else{ 
                    echo "<script>alert('Ubah data gagal !')</script>";
                    echo "<script>history.go(-1);</script>"; 
                }
            }
          ?>
      
	</body>
</html>