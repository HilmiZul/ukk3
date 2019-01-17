
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Peminjaman</title>
</head>
<body>
  <h3>Tambah Data Peminjaman</h3>
  <form action="detil_pinjam.php" method="post">
    <div>
      <select name="id_pegawai">
        <option value="">PILIH PEGAWAI</option>
        <?php
        include("koneksi.php");
        $q = mysqli_query($conn, "select * from pegawai");
        while ($row = mysqli_fetch_array($q)) { ?>
          <option value="<?php print $row['id_pegawai']?>"><?php print $row['nama_pegawai']?></option>
        <?php } ?>
      </select>
    </div>

    <button type="submit" name="lanjut">Lanjut</button>
  </form>
</body>
</html>