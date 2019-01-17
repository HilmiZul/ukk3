<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Detil Peminjaman</title>
</head>
<body>
  <h3>PILIH BARANG</h3>
  <?php
  include('koneksi.php');
  // SAVE.DETIL.PEMINJAMAN
  if (isset($_POST['simpan'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_inventaris = $_POST['id_inventaris'];
    $jumlah = $_POST['jumlah'];

    $save = mysqli_query($conn, "insert into detil_pinjam values (
                        NULL,
                        $id_inventaris,
                        $jumlah,
                        $id_peminjaman
                        )");
    if ($save) {
      print "Data tersimpan";
    } else {
      print "error :(";
    }
  }


  // GET ID_PEMINJAMAN
  if (isset($_POST['lanjut'])) {
    $id_pegawai = $_POST['id_pegawai'];
    mysqli_query($conn, "insert into peminjaman values (
                        NULL,
                        NOW(),
                        NULL,
                        'sedang pinjam',
                        $id_pegawai
                        )");
    
    $q = mysqli_query($conn, "select id_peminjaman from peminjaman order by id_peminjaman desc limit 0,1");
    $row = mysqli_fetch_array($q);
  }
  ?>
  <form action="" method="post">
    <input type="hidden" name="id_peminjaman" value="<?php print $row['id_peminjaman']?>">
    <div>
      <select name="id_inventaris" >
        <option value="">PILIH BARANG</option>
        <?php 
        $q_i = mysqli_query($conn, "select * from inventaris");
        while ($r = mysqli_fetch_array($q_i)) {?>
          <option value="<?php print $r['id_inventaris']?>"><?php print $r['nama']?></option>
        <?php }?>
      </select>
    </div>

    <div>
      <input type="number" name="jumlah" >
    </div>

    <button type="submit" name='simpan'>Simpan</button>
  </form>
</body>
</html>