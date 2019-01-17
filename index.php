<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>App.Inventaris Sarpras</title>

  <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/css/dataTables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="vendor/bs-select/dist/css/bootstrap-select.min.css">
</head>
<body>
  
  <div class="container">
    <div class="row">

      <!-- MENU -->
      <!-- <div class="col-3">
        <div class="card">
          <div class="card-header">
            MENU
          </div>
          <div class="card-body">
            <li>
              <a href="?menu=peminjaman">Peminjaman</a>
            </li>
          </div>
        </div>
      </div> -->
      <!-- TUTUP MENU -->

      <!-- KONTEN -->
      <div class="col">
        <div class="card">
          <div class="card-header text-center">
            PEMINJAMAN
          </div>
          <div class="card-body">
            <a href="?menu=tambah-peminjaman" class="btn btn-primary">Tambah</a>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>NO.</th>
                  <th>NAMA</th>
                  <th>TGL.PINJAM</th>
                  <th>BARANG</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include('koneksi.php');
                $q = mysqli_query($conn, "select a.*, b.*, c.*, d.* from detil_pinjam a
                                          inner join peminjaman b on a.id_peminjaman=b.id_peminjaman
                                          inner join inventaris c on a.id_inventaris=c.id_inventaris
                                          inner join pegawai d on b.id_pegawai=d.id_pegawai");
                $no=0;
                while ($r = mysqli_fetch_array($q)) {
                  $no++;?>
                  <tr>
                    <td><?php print $no;?></td>
                    <td><?php print $r['nama_pegawai'];?></td>
                    <td><?php print $r['tanggal_pinjam'];?></td>
                    <td><?php print $r['nama'];?></td>
                    <td><?php print $r['status_peminjaman'];?></td>
                    <td><a href="#" class="btn btn-danger">hapus</a></td>
                  </tr>
                <?php } ?>
                <!-- <tr>
                  <td>1.</td>
                  <td>Zul Hilmi</td>
                  <td>17.1.2019</td>
                  <td>Obeng</td>
                  <td><span class="badge badge-danger">Pinjam</span></td>
                  <td><a href="#" class="btn btn-danger">hapus</a></td>
                </tr> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- TUTUP KONTEN -->
    </div>
  </div>
  <script src="vendor/js/jquery-1.10.2.js"></script>
  <script src="vendor/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/js/plugins/dataTables/dataTables.bootstrap.js"></script>
  <script src="vendor/js/plugins/dataTables/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="vendor/bs-select/dist/js/bootstrap-select.min.js">
</body>
</html>