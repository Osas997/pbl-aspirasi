<?php
include "../function.php";

if (!isset($_SESSION["admin"])) {
   header("Location: login_petugas.php");
   exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/style.css">
   <script src="https://unpkg.com/feather-icons"></script>
   <link rel="shortcut icon" href="../img/LOGO HMJTI2.png" type="image/x-icon">
   <title>Halaman Admin</title>
</head>

<body>
   <!-- navbar -->
   <nav class="fixed-top">
      <div class="container">
         <div class="logo">
            <div class="logo-img">
               <img class="img-poli" src="../img/LOGO HMJTI2.png" alt="">
            </div>
            <a href="../index.php" class="fs-3 fw-bolder poli mt-2 text-light">POLIWANGI</a>
         </div>
         <div class="link">
            <ul>
               <li onclick="return location.href = 'tambah_petugas.php'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                     <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                     <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                  </svg><a href="tambah_petugas.php">Tambah Petugas</a></li>
               <li onclick="return location.href = '#pengaduan'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                     <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                  </svg><a href="#pengaduan">Pengaduan</a></li>
               <li onclick="return location.href = '../logout.php'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                     <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                  </svg><a href="../logout.php">Logout</a></li>
            </ul>
         </div>
         <li class="hamburg" id="hamburger-menu">
            <a><i data-feather="menu"></i></a>
         </li>
      </div>
   </nav>
   <!-- end navbar -->

   <!-- hero -->
   <section>
      <div class="wrapper">
         <div class="bgr-black">
            <div class="container">
               <div class="hero">
                  <div class="teks text-light">
                     <?php
                     $dataAdmin = getUserAdmin();
                     ?>
                     <h1 class="text-start">Selamat Datang <?= $dataAdmin["nama_petugas"] ?></h1>
                     <h1 class="text-start">Di Web Aspirasi Mahasiswa</h1>
                     <h3>Tanggapi Pengaduan dengan Mudah!</h3>
                     <h3>Klik Pengaduan Untuk Cek Pengaduan yang ada Di Navigasi</h3>
                     <button class="btn-tod fs-6">ADMIN</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end hero -->

   <!-- pengaduan -->
   <?php

   $dataPengaduan = getPengaduan();

   ?>
   <section id="pengaduan" class="">
      <div class="teks">
         <h5 class="p-lg-3 text-center text-light" style="background-color: #ffcb0b;">PENGADUAN</h5>
      </div>
      <div class="container">
         <?php if (!empty($dataPengaduan)) { ?>
            <table class="table table-striped">
               <thead class="bg-light">
                  <tr>
                     <th>No</th>
                     <th class="waktu-pengaduan">Waktu Pengaduan</th>
                     <th>Nama</th>
                     <th class="isi-laporan">Isi Laporan</th>
                     <th>Status</th>
                     <th style="width: 15%;"></th>
                     <th style="width: 15%;" class="text-center">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 1;
                  foreach ($dataPengaduan as $pengaduan) { ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pengaduan["waktu_pengaduan"] ?></td>
                        <td><?= $pengaduan["nama_mahasiswa"] ?></td>
                        <td><?= $pengaduan["isi_laporan"] ?></td>
                        <td><?= $pengaduan["status"] ?></td>
                        <td class="text-center"><a class="btn btn-warning" href="../detail_pengaduan.php?id=<?= $pengaduan["id_pengaduan"] ?>">Lihat Detail</a>
                        </td>
                        <td class="ms-4">
                           <a href="../lihat_tanggapan.php?id=<?= $pengaduan['id_pengaduan'] ?>" class="d-block btn btn-primary mb-2">Lihat Tanggapan</a>
                           <a href="tanggapi_admin.php?id=<?= $pengaduan['id_pengaduan'] ?>" class="d-block btn btn-primary mb-2">Tanggapi</a>
                           <a href="selesai.php?id=<?= $pengaduan["id_pengaduan"] ?>" onclick="return confirm('Selesai?')" class="d-block btn btn-primary">Selesai</a>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         <?php } else { ?>
            <h3 class="text-center fw-bold text-danger">Belum Ada Pengaduan</h3>
         <?php } ?>
      </div>

   </section>

   <?php include "../template/footer.php" ?>
   <script src="../js/script.js"></script>
</body>

</html>