<?php require_once 'clientDataPenduduk.php' ?>
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
    <?php if($aksi=="" || $aksi=="dataPenduduk"){ ?>
      <div class="container">
      <div class="panel panel-default">
      <div style="text-align:center" class="panel-heading"><b>Data Penduduk</b></div>
      <div class="panel-body">
      <div class="table-responsive">
          <table  class="table table-striped table-bordered table-condensed" id="example" class="tablesorter">
            <thead> 
              <tr class="info">
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th> 
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($data as $key => $value) { ?>
            <tr>
              <td><?php echo $value->NIK;?></td>
              <td><?php echo $value->nama;?></td>
              <td><?php echo $value->jenis_kelamin;?></td>
              <td><?php echo $value->tempat_lahir;?></td>
              <td><?php echo $value->tanggal_lahir;?></td>
              <td><?php echo $value->agama;?></td>
              <td><?php echo $value->pendidikan;?></td>
              <td style="width:170px">
                <a href="?aksi=ubahData&nikUbah=<?= $value->NIK ?>" class="btn btn-success">Ubah</a>
                <a href="?nikHapus=<?= $value->NIK ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      </div>
      </div>
      </div>
      <br>
      <center><a href="?aksi=tambahData" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data Penduduk</a></center>
    <?php }else if($aksi=="tambahData"){ ?>
            <div class="container">
            <div class="panel panel-default">
            <div style="text-align:center" class="panel-heading"><b>Tambah Penduduk</b></div>
            <div class="panel-body">
            <form class="form-horizontal" action="?aksi=tambahDataPenduduk" method="POST">
                <div class="form-group">
                  <label class="control-label col-sm-2">NIK :</label>
                  <div class="col-sm-5">
                    <input name="nik" type="number" placeholder="NIK" autofocus required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Nama :</label>
                  <div class="col-sm-5">
                    <input name="nama" type="text" placeholder="Nama" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Jenis Kelamin :</label>
                  <div class="col-sm-5">
                    <input type="radio" name="jk" value="Laki-laki">Laki-laki<br>
                    <input type="radio" name="jk" value="Perempuan">Perempuan
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Tempat Lahir :</label>
                  <div class="col-sm-5">
                    <input name="tmpt_lahir" type="text" placeholder="Tempat lahir" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Tanggal Lahir :</label>
                  <div class="col-sm-5">
                    <input name="tgl_lahir" type="date" placeholder="Tanggal lahir" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Agama :</label>
                  <div class="col-sm-5">
                    <input name="agama" type="text" placeholder="Agama" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Pendidikan :</label>
                  <div class="col-sm-5">
                    <input name="pendidikan" type="text" placeholder="Pendidikan" required>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-success btn-md">
                    <input type="reset" value="Ulangi" class="btn btn-primary">
                  </div>
                </div>
                <a href="dataPenduduk.php">Kembali</a>
            </form>
            </div>
    <?php }else if($aksi=="tambahDataPenduduk"){
              if($hasil==1){
                echo "<script>alert('Tambah data berhasil !')</script>";
                header("Refresh: 0; URL='dataPenduduk.php'");
              }else{ 
                echo "<script>alert('Tambah data gagal ! NIK sudah ada !')</script>";
                echo "<script>history.go(-1);</script>"; 
              }
          }else if($aksi=="ubahData"){ 
            foreach ($dataByNIK as $key => $value) { ?>
            <div class="container">
            <div class="panel panel-default">
            <div style="text-align:center" class="panel-heading"><b>Ubah Data Penduduk</b></div>
            <div class="panel-body">
            <form class="form-horizontal" action="?aksi=ubahDataPenduduk" method="POST">
                <input name="nikAwal" type="hidden" placeholder="NIK" value="<?php echo $value->NIK ;?>" required>  
                <div class="form-group">
                  <label class="control-label col-sm-2">Nama :</label>
                  <div class="col-sm-5">
                    <input name="nik" type="number" placeholder="NIK" value="<?php echo $value->NIK ;?>" autofocus required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Nama :</label>
                  <div class="col-sm-5">
                    <input name="nama" type="text" placeholder="Nama" value="<?php echo $value->nama ;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Jenis Kelamin :</label>
                  <div class="col-sm-5">
                    <input type="radio" name="jk" value="Laki-laki">Laki-laki<br>
                    <input type="radio" name="jk" value="Perempuan">Perempuan
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Tempat Lahir :</label>
                  <div class="col-sm-5">
                    <input name="tmpt_lahir" type="text" placeholder="Tempat lahir" value="<?php echo $value->tempat_lahir ;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Tanggal Lahir :</label>
                  <div class="col-sm-5">
                    <input name="tgl_lahir" type="date" placeholder="Tempat lahir" value="<?php echo $value->tanggal_lahir ;?>"required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Agama :</label>
                  <div class="col-sm-5">
                    <input name="agama" type="text" placeholder="Agama" value="<?php echo $value->agama ;?>"required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Pendidikan :</label>
                  <div class="col-sm-5">
                    <input name="pendidikan" type="text" placeholder="Pendidikan" value="<?php echo $value->pendidikan ;?>"required>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-md"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                  </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <a href="dataPenduduk.php" class="btn btn-primary">Kembali</a>
                  </div>
                </div>
              </form>
          <?php
            }
          }else if($aksi=="ubahDataPenduduk"){
              if($hasil==1){
                echo "<script>alert('Ubah data berhasil !')</script>";
                header("Refresh: 0; URL='dataPenduduk.php'");
              }else{ 
                echo "<script>alert('Ubah data gagal !')</script>";
                echo "<script>history.go(-1);</script>"; 
              }
          }
        ?>
  </body>
</html>
